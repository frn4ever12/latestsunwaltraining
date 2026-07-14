<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KarmachariRequest;
use App\Services\KarmachariService;

class KarmachariController extends Controller
{
    protected $karmachariService;

    public function __construct(KarmachariService $karmachariService)
    {
        $this->karmachariService = $karmachariService;
    }

    public function index()
    {
        $datas=$this->karmachariService->getAllKarmacharis();
        return view('admin.Karmachari.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.Karmachari.form');
    }

    public function store(KarmachariRequest $request)
    {
        try {
            $result = $this->karmachariService->storeKarmachari($request->validated());
            return redirect()->route('admin.karmachari.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit($id)
    {
        try {
            $karmachari = $this->karmachariService->find($id);
            return view('admin.Karmachari.form', compact('karmachari'));
        }catch(\Exception $e){
            return back()->with('error','समस्या आयो, डेटा मिलेन।');
        }
    }

    public function update(KarmachariRequest $request, $id)
    {
        try {
            $result = $this->karmachariService->updateKarmachari($request->validated(), $id);
            return redirect()
                ->route('admin.karmachari.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
            }catch(\Exception $e){
                return back()->with('error','समस्या आयो, डेटा मिलेन।');
            }
    }

    public function destroy($id)
    {
        try {
            $result = $this->karmachariService->deleteKarmachari($id);
            return response()->json([
                'status' => 200,
                'message' => 'Karmachari deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Failed to delete Karmachari: '
            ], 404);
        }
    }
}
