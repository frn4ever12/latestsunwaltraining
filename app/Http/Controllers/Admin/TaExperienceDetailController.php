<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaExperienceDetailRequest;
use App\Models\TaExperienceDetail;
use App\Models\TrainingApplication;
use App\Traits\FileUploadTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaExperienceDetailController extends Controller
{
    use FileUploadTrait, AuthorizesRequests;
    public function store(TaExperienceDetailRequest $request, $training, TrainingApplication $application)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            if (isset($data['document'])) {
                $data['document'] = $this->uploadImage($data['document'], 'application/experience/document/', 'private');
            }
            $application->experienceDetails()->create($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $application->training_id, 'application' => $application->id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक थापियो |', 'experience_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'experience_tab' => true]);
        }
    }

    public function edit($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);

        $detail = TaExperienceDetail::find($detail);
        return view('admin.TrainingApplication.Experience.edit', compact('detail'));
    }

    public function update(TaExperienceDetailRequest $request, $training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $detail = TaExperienceDetail::find($detail);
            if (isset($data['document'])) {
                $olddocument = $detail->document;
                $data['document'] = $this->uploadImage($data['document'], 'application/experience/document/', 'private');
                $this->deleteOldImage($olddocument, 'private');
            }

            $detail->update($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक अपडेट गरियो |', 'experience_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'experience_tab' => true]);
        }
    }

    public function destroy($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);

        DB::beginTransaction();
        try {
            $detail = TaExperienceDetail::find($detail);
            if ($detail) {
                $olddocument = $detail->document;
                $detail->delete();
                $this->deleteOldImage($olddocument, 'private');
                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
