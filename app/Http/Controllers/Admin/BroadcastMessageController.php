<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BroadcastMessage;
use Illuminate\Http\Request;

class BroadcastMessageController extends Controller
{
    public function index()
    {
        $datas = BroadcastMessage::latest()->select('id','title_np','title_eng','status')->get();
        return view('admin.Broadcast.index', compact('datas'));
    }
    public function create()
    {
        return view('admin.Broadcast.form');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_np' => 'required|string',
            'title_eng' => 'nullable|string',
            'message' => 'required',
            'status' => 'sometimes|in:0,1'
        ]);
        try {
            $broadcast = BroadcastMessage::create($validatedData);
            return redirect()->route('admin.broadcast.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function edit(BroadcastMessage $broadcast)
    {
        return view('admin.Broadcast.form', compact('broadcast'));
    }
    public function update(Request $request, BroadcastMessage $broadcast)
    {
        $validatedData = $request->validate([
            'title_np' => 'required|string',
            'title_eng' => 'nullable|string',
            'message' => 'required',
            'status' => 'sometimes|in:0,1'
        ]);
        try {
            $broadcast->update($validatedData);
            return redirect()->route('admin.broadcast.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function destroy(BroadcastMessage $broadcast)
    {
        try {
            if ($broadcast) {
                $broadcast->delete();
                return response()->json(['status' => 200, 'message' => 'broadcast deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'broadcast not found'], 404);
        }
    }
}
