<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $datas = Category::latest()->get();
        return view('admin.Category.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Category.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $category = Category::create($validatedData);
            return redirect()->route('admin.category.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.Category.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $category->update($validatedData);
            return redirect()->route('admin.category.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(Category $category)
    {
        try {
            if ($category) {
                $category->delete();
                return response()->json(['status' => 200, 'message' => 'Category deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Category not found'], 404);
        }
    }
}
