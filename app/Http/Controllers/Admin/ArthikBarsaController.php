<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ArthikBarsaService;
use Illuminate\Http\Request;

class ArthikBarsaController extends Controller
{
    protected $arthikBarsaService;

    public function __construct(ArthikBarsaService $arthikBarsaService)
    {
        $this->arthikBarsaService = $arthikBarsaService;
    }

    public function index()
    {
        $datas = $this->arthikBarsaService->getAllArthikBarsas();
        return view('admin.ArthikBarsa.index', compact('datas'));
    }

    public function create()
    {
        $arthikBarsa = $this->arthikBarsaService->prepareArthikBarsaForCreation();
        return view('admin.ArthikBarsa.form', compact('arthikBarsa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'arthik_barsa' => 'required|string|unique:arthik_barsas',
            'status' => 'required|in:0,1'
        ]);

        try {
            $this->arthikBarsaService->createArthikBarsa($validated);
            return redirect()
                ->route('admin.arthik-barsa.index')
                ->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
                return back()
                    ->with('error', 'असफल! डेटा सुरक्षित गर्न सकिएन ।');
        }
    }

    public function edit($id)
    {
        $arthik_barsa = $this->arthikBarsaService->getArthikBarsaById($id);
        return view('admin.ArthikBarsa.form', compact('arthik_barsa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'arthik_barsa' => 'required|string|unique:arthik_barsas,arthik_barsa,' . $id,
            'status' => 'required|in:0,1'
        ]);

        try {
            $arthikBarsa = $this->arthikBarsaService->getArthikBarsaById($id);
            $this->arthikBarsaService->updateArthikBarsa($arthikBarsa, $validated);
            return redirect()
                ->route('admin.arthik-barsa.index')
                ->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'असफल! डेटा सुरक्षित गर्न सकिएन ।');
        }
    }

    public function destroy($id)
    {
        try {
            $arthikBarsa = $this->arthikBarsaService->getArthikBarsaById($id);
            $this->arthikBarsaService->deleteArthikBarsa($arthikBarsa);
            return response()->json([
                'status' => 200,
                'message' => 'डेटा सफलतापूर्वक मेटियो'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'डेटा फेला परेन'
            ]);
        }
    }
}
