<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $datas=Department::latest()->get();
        return view('admin.Department.index',compact('datas'));
    }
    public function create(){
        return view('admin.Department.form');
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'name_np'=>'required|string',
            'name_eng'=>'nullable|string',
            'status'=>'sometimes|in:0,1'
        ]);
        try{
            $department=Department::create($validatedData);
            return redirect()->route('admin.department.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            return back()->with('error','समस्या आयो, डेटा मिलेन।');
        }
    }
    public function edit(Department $department){
        return view('admin.Department.form',compact('department'));
    }
    public function update(Request $request,Department $department){
        $validatedData=$request->validate([
            'name_np'=>'required|string',
            'name_eng'=>'nullable|string',
            'status'=>'sometimes|in:0,1'
        ]);
        try{
            $department->update($validatedData);
            return redirect()->route('admin.department.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            return back()->with('error','समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Department $department)
    {
        try {
            if ($department) {
                $department->delete();
                return response()->json(['status' => 200, 'message' => 'Department deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Department not found'], 404);
        }
    }
}
