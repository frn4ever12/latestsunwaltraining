<?php

namespace App\Services;

use App\Models\Gallery;
use App\Exceptions\NotFoundException;
use App\Models\GalleryPhotos;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;

class GalleryService
{
    use FileUploadTrait; 

    public function prepareGalleryForCreation()
    {
        return new Gallery();
    }

    public function create(array $data, ?array $imageFiles = null)
    {
        DB::beginTransaction();
        try {
            $gallery = Gallery::create($data);
            if ($imageFiles) {
                foreach ($imageFiles as $imageFile) {
                    $imagePath = $this->uploadImage($imageFile, 'gallery/' );
                    GalleryPhotos::create([
                        'gallery_id' => $gallery->id,
                        'photo' => $imagePath,
                    ]);
                }
            }

            DB::commit();
            return $gallery;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error creating gallery: " . $e->getMessage());
        }
    }

    public function getAll()
    {
        return Gallery::with('photos')->get(); 
    }

    public function getById($id)
    {
        $gallery = Gallery::with('photos')->findOrFail($id);  
        if (!$gallery) {
            throw new NotFoundException("Gallery not found");
        }
        return $gallery;
    }
    public function update($gallery, array $data)
    {
        if (!$gallery) {
            throw new NotFoundException("Gallery not found");
        }

        $gallery->update($data);
        return $gallery;
    }

    public function delete($gallery)
    {
        if (!$gallery) {
            throw new NotFoundException("Gallery not found");
        }

        foreach ($gallery->photos as $photo) {
            $this->deleteOldImage($photo->photo);  
            $photo->delete();  
        }

        $gallery->delete();  
        return $gallery;
    }

    public function addPhotos($gallery, ?array $imageFiles = null)
    {
        if (!$gallery) {
            throw new NotFoundException("Gallery not found");
        }

        if ($imageFiles) {
            foreach ($imageFiles as $imageFile) {
                $imagePath = $this->uploadImage($imageFile, 'gallery/' );
                GalleryPhotos::create([
                    'gallery_id' => $gallery->id,
                    'photo' => $imagePath,
                ]);
            }
        }

        return $gallery;
    }

    public function deletePhoto($galleryId, $photoId)
    {
        $gallery=$this->getById($galleryId);
        if (!$gallery) {
            throw new NotFoundException("Gallery not found");
        }

        $photo = GalleryPhotos::where('gallery_id', $gallery->id)->find($photoId);
        if (!$photo) {
            throw new NotFoundException("Photo not found in this gallery");
        }
        $this->deleteOldImage($photo->photo);
        $photo->delete();

        return $gallery;
    }
}
