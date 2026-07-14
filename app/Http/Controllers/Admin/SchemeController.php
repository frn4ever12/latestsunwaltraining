<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scheme;
use App\Services\SchemeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchemeController extends Controller
{
    protected $schemeService;
    public function __construct(SchemeService $schemeService)
    {
        $this->schemeService = $schemeService;
    }

    public function index()
    {
        $datas = Scheme::get();
        return view('admin.Scheme.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Scheme.form');
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
            $this->schemeService->store($validatedData);
            DB::commit();
            return redirect()->route('admin.scheme.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Scheme $scheme)
    {
        return view('admin.Scheme.form', compact('scheme'));
    }

    public function update(Request $request, Scheme $scheme)
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
            $this->schemeService->update($validatedData, $scheme);
            DB::commit();
            return redirect()->route('admin.scheme.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Scheme $scheme)
    {
        try {
            if ($scheme) {
                $this->schemeService->delete($scheme);
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
