<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Services\NoticeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    protected $noticeService;
    public function __construct(NoticeService $noticeService)
    {
        $this->noticeService = $noticeService;
    }

    public function index()
    {
        $datas = Notice::get();
        return view('admin.Notice.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.Notice.form');
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
            $this->noticeService->store($validatedData);
            DB::commit();
            return redirect()->route('admin.notice.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit(Notice $notice)
    {
        return view('admin.Notice.form', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
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
            $this->noticeService->update($validatedData, $notice);
            DB::commit();
            return redirect()->route('admin.notice.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(Notice $notice)
    {
        try {
            if ($notice) {
                $this->noticeService->delete($notice);
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
