<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries=Gallery::with('photos')->latest()->select('id','title')->paginate(10);
        return view('frontend.Gallery.index',compact('galleries'));
    }
    public function show($id)
    {
        $gallery = Gallery::with('photos')->findOrFail($id); 
        return view('frontend.Gallery.show', compact('gallery'));
    }
}
