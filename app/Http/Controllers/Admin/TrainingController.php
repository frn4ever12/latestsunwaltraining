<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\BroadcastMessage;
use App\Models\District;
use App\Models\Province;
use App\Models\SthaniyaTaha;
use App\Models\Training;
use App\Models\Ward;
use App\Services\TrainingService;

class TrainingController extends Controller
{
    protected $trainingService;

    public function __construct(TrainingService $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    public function index()
    {
        $datas = $this->trainingService->getAll();
        $broadcast=BroadcastMessage::latest()->first();
        return view('admin.Trainings.index', compact('datas','broadcast'));
    }

    public function create()
    {
        $districts = District::get();
        $provinces = Province::get();
        $sthaniya_tahas = SthaniyaTaha::get();
        $wards = Ward::get();
        return view('admin.Trainings.form', compact('districts', 'provinces', 'sthaniya_tahas', 'wards'));
    }

    public function store(TrainingRequest $request)
    {
        try {
            $result = $this->trainingService->store($request->validated());
            return redirect()->route('admin.training.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit($id)
    {
        $districts = District::get();
        $provinces = Province::get();
        $sthaniya_tahas = SthaniyaTaha::get();
        $wards = Ward::get();
        try {
            $training = $this->trainingService->find($id);
            return view('admin.Trainings.form', compact('training', 'districts', 'provinces', 'sthaniya_tahas', 'wards'));
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
   public function show(Training $training)
{
    $training->loadCount('trainingApplications');

    return view('admin.Trainings.show', compact('training'));
}


    public function update(TrainingRequest $request, $id)
    {
        try {
            $result = $this->trainingService->update($request->validated(), $id);
            return redirect()
                ->route('admin.training.index')->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->trainingService->delete($id);
            return response()->json([
                'status' => 200,
                'message' => 'Data deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Failed to delete Data: '
            ], 404);
        }
    }
}
