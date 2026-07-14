<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaEducationDetailRequest;
use App\Models\TaEducationDetail;
use App\Models\TrainingApplication;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use function Ramsey\Uuid\v1;

class TaEducationDetailController extends Controller
{
    use AuthorizesRequests;
    use FileUploadTrait;
    public function store(TaEducationDetailRequest $request, $training, TrainingApplication $application)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            if (isset($data['marksheet'])) {
                $data['marksheet'] = $this->uploadImage($data['marksheet'], 'application/education/marksheet/', 'private');
            }

            if (isset($data['equivalency_certificate'])) {
                $data['equivalency_certificate'] = $this->uploadImage($data['equivalency_certificate'], 'application/education/equivalency_certificate/', 'private');
            }

            if (isset($data['character_certificate'])) {
                $data['character_certificate'] = $this->uploadImage($data['character_certificate'], 'application/education/character_certificate/', 'private');
            }
            $application->educationDetails()->create($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $application->training_id, 'application' => $application->id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक थापियो |', 'education_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'education_tab' => true]);
        }
    }

    public function edit($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);
        $detail = TaEducationDetail::find($detail);
        return view('admin.TrainingApplication.Education.edit', compact('detail'));
    }

    public function update(TaEducationDetailRequest $request, $training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $detail = TaEducationDetail::find($detail);
            if (isset($data['marksheet'])) {
                $oldmarksheet = $detail->marksheet;
                $data['marksheet'] = $this->uploadImage($data['marksheet'], 'application/education/marksheet/', 'private');
                $this->deleteOldImage($oldmarksheet, 'private');
            }

            if (isset($data['character_certificate'])) {
                $oldcharacter_certificate = $detail->character_certificate;
                $data['character_certificate'] = $this->uploadImage($data['character_certificate'], 'application/education/character_certificate/', 'private');
                $this->deleteOldImage($oldcharacter_certificate, 'private');
            }
            if (isset($data['equivalency_certificate'])) {
                $oldequivalency_certificate = $detail->equivalency_certificate;
                $data['equivalency_certificate'] = $this->uploadImage($data['equivalency_certificate'], 'application/education/equivalency_certificate/', 'private');
                $this->deleteOldImage($oldequivalency_certificate, 'private');
            }
            $detail->update($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक अपडेट गरियो |', 'education_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'education_tab' => true]);
        }
    }

    public function destroy($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);
        DB::beginTransaction();
        try {
            $detail = TaEducationDetail::find($detail);
            if ($detail) {
                $oldmarksheet = $detail->marksheet;
                $oldcharacter_certificate = $detail->character_certificate;
                $oldequivalency_certificate = $detail->equivalency_certificate;
                $detail->delete();

                $this->deleteOldImage($oldmarksheet, 'private');
                $this->deleteOldImage($oldcharacter_certificate, 'private');
                $this->deleteOldImage($oldequivalency_certificate, 'private');

                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
