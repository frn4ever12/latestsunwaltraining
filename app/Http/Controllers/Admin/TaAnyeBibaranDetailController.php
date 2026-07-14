<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaAnyeBibaranRequest;
use App\Models\TaAnyeBibaranDetail;
use App\Models\TrainingApplication;
use App\Traits\FileUploadTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaAnyeBibaranDetailController extends Controller
{
    use FileUploadTrait, AuthorizesRequests;
    public function store(TaAnyeBibaranRequest $request, $training, TrainingApplication $application)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            if (isset($data['anye_document'])) {
                $data['anye_document'] = $this->uploadImage($data['anye_document'], 'application/others/anye_document/', 'private');
            }

            $application->anyeBibaranDetails()->create($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $application->training_id, 'application' => $application->id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक थापियो |', 'anye_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'anye_tab' => true]);
        }
    }

    public function edit($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);

        $detail = TaAnyeBibaranDetail::find($detail);
        return view('admin.TrainingApplication.AnyeBibaran.edit', compact('detail'));
    }

    public function update(TaAnyeBibaranRequest $request, $training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $detail = TaAnyeBibaranDetail::find($detail);
            if (isset($data['anye_document'])) {
                $oldanye_document = $detail->anye_document;
                $data['anye_document'] = $this->uploadImage($data['anye_document'], 'application/others/anye_document/', 'private');
                $this->deleteOldImage($oldanye_document, 'private');
            }

            $detail->update($data);
            DB::commit();
            return redirect()->route('admin.application.edit', ['training' => $detail->trainingApplication->training_id, 'application' => $detail->training_application_id])->with(['success' => 'शैक्षिक विवरण सफलतापूर्वक अपडेट गरियो |', 'anye_tab' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'समस्या आयो, डेटा मिलेन।', 'anye_tab' => true]);
        }
    }

    public function destroy($training, TrainingApplication $application, $detail)
    {
        $this->authorize('update', $application);

        DB::beginTransaction();
        try {
            if ($detail) {
                $detail = TaAnyeBibaranDetail::find($detail);
                $oldanye_document = $detail->anye_document ?? '';
                $detail->delete();
                $this->deleteOldImage($oldanye_document, 'private');

                DB::commit();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
