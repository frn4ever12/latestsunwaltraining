<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $datas = $this->bannerService->getAll();
        return view('admin.Banner.index', compact('datas'));
    }
    public function create()
    {
        $banner = $this->bannerService->prepareBannerForCreation();
        return view('admin.Banner.form', compact('banner'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1',
        ]);
        try {
            $banner = $this->bannerService->create($validated, $request->file('image'));
            return to_route('admin.banner.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
    public function edit($id)
    {
        $banner = $this->bannerService->getById($id);
        return view('admin.Banner.form', compact('banner'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1',
        ]);
        try {
            $banner = $this->bannerService->getById($id);
            $this->bannerService->update($banner, $validated, $request->file('image'));
            return to_route('admin.banner.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy($id)
    {
        try {
            $banner = $this->bannerService->getById($id);
            $this->bannerService->delete($banner);
            return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data Not Found']);
        }
    }
}
