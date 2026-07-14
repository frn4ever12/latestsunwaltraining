<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::all();
        return view('admin.AboutUs.index', compact('about'));
    }

    public function create()
    {
        $about = new AboutUs();
        return view('admin.AboutUs.form', compact('about'));
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.AboutUs.form', compact('about'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            AboutUs::create($validatedData);
            return to_route('admin.about-us.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $about = AboutUs::findOrFail($id); 
            $about->update($validatedData);
            return to_route('admin.about-us.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $about = AboutUs::findOrFail($id); 
            $about->delete(); 
    
            DB::commit();
    
            return response()->json([
                'status' => 200,
                'message' => 'About deleted successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete about data',
            ], 500);
        }
    }   
    
}