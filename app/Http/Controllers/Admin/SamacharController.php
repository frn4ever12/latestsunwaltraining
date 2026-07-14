<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Samachar;
use App\Services\SamacharService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SamacharController extends Controller
{
    protected $samacharService;
    public function __construct(SamacharService $samacharService)
    {
        $this->samacharService = $samacharService;
    }

    public function index()
    {
        $datas = Samachar::get();
        return view('admin.Samachar.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Samachar.form');
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
            $this->samacharService->store($validatedData);
            DB::commit();
            return redirect()->route('admin.samachar.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Samachar $samachar)
    {
        return view('admin.Samachar.form', compact('samachar'));
    }

    public function update(Request $request, Samachar $samachar)
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
            $this->samacharService->update($validatedData, $samachar);
            DB::commit();
            return redirect()->route('admin.samachar.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Samachar $samachar)
    {
        try {
            if ($samachar) {
                $this->samacharService->delete($samachar);
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
