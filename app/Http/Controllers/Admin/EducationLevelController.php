<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    public function index()
    {
        $datas = EducationLevel::latest()->get();
        return view('admin.EducationLevel.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.EducationLevel.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $EducationLevel = EducationLevel::create($validatedData);
            return redirect()->route('admin.education-level.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(EducationLevel $EducationLevel)
    {
        return view('admin.EducationLevel.form', compact('EducationLevel'));
    }

    public function update(Request $request, EducationLevel $EducationLevel)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $EducationLevel->update($validatedData);
            return redirect()->route('admin.education-level.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(EducationLevel $EducationLevel)
    {
        try {
            if ($EducationLevel) {
                $EducationLevel->delete();
                return response()->json(['status' => 200, 'message' => 'EducationLevel deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'EducationLevel not found'], 404);
        }
    }
}
