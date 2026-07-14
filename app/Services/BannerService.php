<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Banner;
use App\Traits\FileUploadTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class BannerService
{
    use FileUploadTrait;
    public function prepareBannerForCreation()
    {
        return new Banner();
    }
    public function create(array $data, ?UploadedFile $imageFile = null)
    {
        DB::beginTransaction();
        try {
            $banner = Banner::create($data);
            if ($imageFile) {
                $imagePath = $this->uploadImage($imageFile, 'banner/' );
                $banner->update(['image' => $imagePath]);
            }

            DB::commit();
            return  $banner;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error creating banner: " . $e->getMessage());

        }
    }

    public function getAll()
    {
        return Banner::latest()->get();
    }

    public function getById($id)
    {
        $banner = Banner::findOrFail($id);
        if (!$banner) {
            throw new NotFoundException("Banner not found");
        }
        return $banner;
    }

    public function update($banner, array $data, ?UploadedFile $newImageFile = null)
    {
        DB::beginTransaction();
        try {
            $oldImagePath = $banner->image;

            $banner->update($data);

            if ($newImageFile) {
                $this->deleteOldImage($oldImagePath);

                $newImagePath = $this->uploadImage($newImageFile, 'banner/' );
                $banner->update(['image' => $newImagePath]);
            }

            DB::commit();
            return $banner;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error updating banner: " . $e->getMessage());
        }
    }

    public function delete($banner)
    {
        DB::beginTransaction();
        try {
            if ($banner->image) {
                $this->deleteOldImage($banner->image);
                $banner->update(['image' => null]);
            }
            $banner->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
