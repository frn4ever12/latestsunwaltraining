<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Services\OrganizationService;

class OrganizationController extends Controller
{
    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function index()
    {
        $palika=get_detail();
        return view('admin.Organization.form',compact('palika'));
    }

    public function store(OrganizationRequest $request)
    {
        $data = $request->validated();
        try {
            $this->organizationService->createOrganization($data, $request->logo);
            return redirect()->route('admin.organization.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function update(OrganizationRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $this->organizationService->updateOrganization($data, $request->logo, $id);
            return redirect()->route('admin.organization.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
   
}
