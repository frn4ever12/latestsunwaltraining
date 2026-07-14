<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function index()
    {
        $datas=Certificate::get();
        return view('admin.Certificate.index',compact('datas'));
    }
    public function show(Certificate $certificate)
    {
        return view('admin.Certificate.show',compact('certificate'));
    }
    public function create(Request $request)
    {
        return view('admin.Certificate.form');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string'
        ]);
        try{
            DB::beginTransaction();
            Certificate::create($validatedData);
            DB::commit();
            return to_route('admin.certificate.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error','समस्या आयो, डेटा मिलेन।');
        }
    }
    public function edit(Request $request, Certificate $certificate)
    {
        return view('admin.Certificate.form', compact('certificate'));
    }
    public function update(Request $request,Certificate $certificate)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);
        try{
            DB::beginTransaction();
            $certificate->update($validatedData);
            DB::commit();
            return redirect()->route('admin.certificate.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error','समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Certificate $certificate)
    {
        try {
            if ($certificate) {
                $certificate->delete();
                return response()->json(['status' => 200, 'message' => 'Certificate deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Certificate not found'], 404);
        }
    }
}
