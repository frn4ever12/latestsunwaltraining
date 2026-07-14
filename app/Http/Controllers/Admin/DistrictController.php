<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $datas = District::latest()->get();
        return view('admin.Districts.index', compact('datas'));
    }

    public function create()
    {
        $provinces = Province::get();
        return view('admin.Districts.form', compact('provinces'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'status' => 'required|boolean'

        ]);
        try {
            DB::beginTransaction();
            District::create($data);
            DB::commit();
            return redirect()->route('admin.district.index')->with('success', 'जिल्ला सफलतापूर्वक थापियो |');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(District $district)
    {
        $provinces = Province::all();
        return view('admin.Districts.form', compact('district', 'provinces'));
    }

    public function update(Request $request, District $district)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'status' => 'required|boolean'

        ]);
        try {
            DB::beginTransaction();
            $district->update($data);
            DB::commit();
            return redirect()->route('admin.district.index')->with('success', 'जिल्ला सफलतापूर्वक अपडेट गरियो |');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(District $district)
    {
        try {
            DB::beginTransaction();
            if ($district) {
                $district->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
