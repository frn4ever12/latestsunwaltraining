<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SthaniyaTaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SthaniyaTahaController extends Controller
{
    public function index(Request $request)
    {
        $datas = SthaniyaTaha::latest()->get();
        return view('admin.SthaniyaTaha.index', compact('datas'));
    }


    public function create()
    {
        $districts = District::get();
        return view('admin.SthaniyaTaha.form', compact('districts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'status' => 'required|boolean'

        ]);
        DB::beginTransaction();
        try {
            SthaniyaTaha::create($data);
            DB::commit();
            return redirect()->route('admin.sthaniya-taha.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(SthaniyaTaha $sthaniya_taha)
    {
        $districts = District::all();
        return view('admin.SthaniyaTaha.form', compact('districts', 'sthaniya_taha'));
    }

    public function update(Request $request, SthaniyaTaha $sthaniya_taha)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'status' => 'required|boolean'

        ]);
        DB::beginTransaction();
        try{
            $sthaniya_taha->update($data);
            DB::commit();
            return redirect()->route('admin.sthaniya-taha.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(SthaniyaTaha $sthaniya_taha)
    {
        DB::beginTransaction();
        try {
            if ($sthaniya_taha) {
                $sthaniya_taha->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
