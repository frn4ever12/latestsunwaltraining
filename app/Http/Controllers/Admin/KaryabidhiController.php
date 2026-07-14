<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyabidhi;
use App\Services\KaryabidhiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KaryabidhiController extends Controller
{
    protected $karyabidhiService;
    public function __construct(KaryabidhiService $karyabidhiService)
    {
        $this->karyabidhiService = $karyabidhiService;
    }

    public function index()
    {
        $datas = Karyabidhi::get();
        return view('admin.Karyabidhi.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Karyabidhi.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_np' => 'required|string|max:255',
            'title_eng' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'miti_bs' => 'nullable|date',
            'miti_ad' => 'nullable|date',
            'document' => 'nullable|mimes:jpeg,png,jpg,pdf|max:4096',
            'status' => 'sometimes|in:0,1',
        ]);
        try {
            DB::beginTransaction();
            $validatedData['user_id'] = Auth::id();
            $this->karyabidhiService->store($validatedData);
            DB::commit();
            return redirect()->route('admin.karyabidhi.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Karyabidhi $karyabidhi)
    {
        return view('admin.Karyabidhi.form', compact('karyabidhi'));
    }

    public function update(Request $request, Karyabidhi $karyabidhi)
    {
        $validatedData = $request->validate([
            'title_np' => 'required|string|max:255',
            'title_eng' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'miti_bs' => 'nullable|date',
            'miti_ad' => 'nullable|date',
            'document' => 'nullable|mimes:jpeg,png,jpg,pdf|max:4096',
            'status' => 'sometimes|in:0,1',
        ]);
        try {
            DB::beginTransaction();
            $validatedData['user_id'] = Auth::id();
            $this->karyabidhiService->update($validatedData, $karyabidhi);
            DB::commit();
            return redirect()->route('admin.karyabidhi.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Karyabidhi $karyabidhi)
    {
        try {
            if ($karyabidhi) {
                $this->karyabidhiService->delete($karyabidhi);
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
