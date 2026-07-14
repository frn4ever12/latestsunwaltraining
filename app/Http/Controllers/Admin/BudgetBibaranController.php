<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BudgetBibaran;
use App\Models\Department;
use App\Services\BudgetbibaranService;

class BudgetBibaranController extends Controller
{
    protected $budgetBibaranService;

    public function __construct(BudgetBibaranService $budgetBibaranService)
    {
        $this->budgetBibaranService = $budgetBibaranService;
    }

    public function index()
    {
        $datas = BudgetBibaran::with('department')->latest()->get();
        return view('admin.BudgetBibaran.index', compact('datas'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.BudgetBibaran.form', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'rakam' => 'required|numeric',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $this->budgetBibaranService->store($validatedData);
            return redirect()->route('admin.budgetBibaran.index')->with('success', 'सफलता! बजेट विवरण सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'त्रुटि! बजेट विवरण सुरक्षित हुन सकेन।');
        }
    }

    public function edit(BudgetBibaran $bibaran)
    {
       
        $departments = Department::all();
        return view('admin.BudgetBibaran.form', compact('bibaran', 'departments'));
    }

    public function update(Request $request, BudgetBibaran $bibaran)
    {
        $validatedData = $request->validate([
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'rakam' => 'required|numeric',
            'status' => 'sometimes|in:0,1'
        ]);

        try {
            $this->budgetBibaranService->update($validatedData, $bibaran);
            return redirect()->route('admin.budgetBibaran.index')->with('success', 'सफलता! बजेट विवरण अपडेट भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'त्रुटि! बजेट विवरण अपडेट हुन सकेन।');
        }
    }

    public function destroy(BudgetBibaran $bibaran)
    {
        try {
            $this->budgetBibaranService->delete($bibaran);
            return response()->json(['status' => 200, 'message' => 'बजेट विवरण सफलतापूर्वक हटाइयो।']);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'त्रुटि! बजेट विवरण फेला परेन।'], 404);
        }
    }
}
