<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $datas = Province::latest()->get();
        return view('admin.Provinces.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.Provinces.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean'
        ]);
        DB::beginTransaction();
        try{
            Province::create($data);
            DB::commit();
            return redirect()->route('admin.province.index')->with('success', 'प्रदेश सफलतापूर्वक थपियो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Province $province)
    {
        return view('admin.Provinces.form', compact('province'));
    }

    public function update(Request $request, Province $province)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        DB::beginTransaction();

        try{
            $province->update($data);
            DB::commit();
            return redirect()->route('admin.province.index')->with('success', 'प्रदेश सफलतापूर्वक अपडेट भयो।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(Province $province)
    {
        DB::beginTransaction();
        try {
            if ($province) {
                $province->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
