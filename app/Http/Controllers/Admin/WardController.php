<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SthaniyaTaha;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    public function index(Request $request)
    {
        $datas = ward::latest()->get();
        return view('admin.Ward.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Ward.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'nullabke|string|max:255',
            'status' => 'required|boolean'
        ]);
        DB::beginTransaction();
        try {
            Ward::create($data);
            DB::commit();
            return redirect()->route('admin.ward.index')->with('success', 'जिल्ला सफलतापूर्वक थापियो |');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Ward $ward)
    {
        return view('admin.Ward.form', compact('ward'));
    }

    public function update(Request $request, Ward $ward)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_eng' => 'nullabke|string|max:255',
            'sthaiya_taha_id' => 'nullable|exists:sthaniya_tahas,id',
            'status' => 'required|boolean'

        ]);
        DB::beginTransaction();
        try {
            $ward->update($data);
            DB::commit();
            return redirect()->route('admin.ward.index')->with('success', 'जिल्ला सफलतापूर्वक अपडेट गरियो |');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy(Ward $ward)
    {
        DB::beginTransaction();
        try {
            if ($ward) {
                $ward->delete();
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
