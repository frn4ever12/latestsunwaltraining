<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\GalleryService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function index()
    {
        $datas = $this->galleryService->getAll();
        return view('admin.Gallery.index', compact('datas'));
    }

    public function create()
    {
        $gallery = $this->galleryService->prepareGalleryForCreation();  
        return view('admin.Gallery.form', compact('gallery'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'images' => 'nullable|array', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ]);

        try {
            $gallery = $this->galleryService->create($validated, $request->file('images'));
            return to_route('admin.gallery.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
          
        } catch (\Exception $e) {
            Log::error('Failed to store gallery: '.$e->getMessage());
           
            return back()->withInput();
        }
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.Gallery.form', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
            'images' => 'nullable|array', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ]);
    
        try {
            $gallery = $this->galleryService->getById($id);
            $this->galleryService->update($gallery, $validated);
            
            if ($request->hasFile('images')) {
                $this->galleryService->addPhotos($gallery, $request->file('images'));
            }
    
            return redirect()->route('admin.gallery.index')->with('success', 'Data successfully updated!');
        } catch (\Exception $e) {
            Log::error('Failed to update gallery: '.$e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update gallery!');
        }
    }
    
    public function destroy($id)
    {
        try {
            $gallery = $this->galleryService->getById($id);
            $this->galleryService->delete($gallery);
    
            if (request()->ajax()) {
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            } else {
                return redirect()->route('admin.gallery.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
            }
    
        } catch (\Exception $e) {
            Log::error('Failed to delete gallery: '.$e->getMessage());
    
            if (request()->ajax()) {
                return response()->json(['status' => 404, 'message' => 'Data not found']);
            } else {
                return redirect()->back()->with('error', 'ग्यालेरी हटाउन असफल भयो!');
            }
        }
    }
    
    public function addPhotos(Request $request, $id)
    {
        $validated = $request->validate([
            'images' => 'required|array', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ]);
    
        try {
            $gallery = $this->galleryService->getById($id);
            $this->galleryService->addPhotos($gallery, $request->file('images'));
    
            return redirect()->back()->with('success', 'फोटोहरू सफलतापूर्वक थपियो!');
        } catch (\Exception $e) {
            Log::error('Failed to add photos: '.$e->getMessage());
    
            return redirect()->back()->with('error', 'फोटोहरू थप्न सकिएन!');
        }
    }
    
    public function deletePhoto($galleryId, $photoId)
    {
        try {
            $this->galleryService->deletePhoto($galleryId, $photoId);
            return redirect()->back()->with('success', 'फोटो सफलतापूर्वक हटाइयो!');
        } catch (\Exception $e) {
            Log::error('Failed to delete photo: '.$e->getMessage());
            return redirect()->back()->with('error', 'फोटो हटाउन सकिएन!');
        }
    }
    
}
