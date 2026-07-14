<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::orderBy('id', 'ASC')->select('title','id')->get(); 
        return view('frontend.About.index', compact('abouts'));
    }

    public function show($id)
    {
        $about = AboutUs::findOrFail($id); 
        return view('frontend.About.about', compact('about'));
    }

}
