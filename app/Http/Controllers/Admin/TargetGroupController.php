<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TargetGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetGroupController extends Controller
{
    public function index(Request $request)
    {
        $datas = TargetGroup::latest()->get();
        return view('admin.TargetGroups.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.TargetGroups.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_np' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);
        DB::beginTransaction();
        try{
            TargetGroup::create($data);
            DB::commit();
            return redirect()->route('admin.target-group.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(TargetGroup $group)
    {
        return view('admin.TargetGroups.form', compact('group'));
    }

    public function update(Request $request, TargetGroup $group)
    {
        $data = $request->validate([
            'name_np' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        DB::beginTransaction();

        try{
            $group->update($data);
            DB::commit();
            return redirect()->route('admin.target-group.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(TargetGroup $group)
    {
        DB::beginTransaction();
        try {
            if ($group) {
                $group->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
