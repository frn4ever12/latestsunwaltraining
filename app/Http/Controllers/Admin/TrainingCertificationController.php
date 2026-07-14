<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingCertificationController extends Controller
{
    public function index($training)
    {
        $training = Training::with('trainingCertifications')->findOrFail($training);

        $certificationData = [];

        foreach ($training->trainingCertifications as $cert) {
            $certificationData['certified_date'] = $cert->certified_date;
            $certificationData['certificate_id'] = $cert->certificate_id;
        }

        $applicants = $training->trainingApplications()->select('id', 'fullname_np', 'status')->get();

        foreach ($applicants as $applicant) {
            $applicantCertification = $training->trainingCertifications()
                ->where('training_application_id', $applicant->id)
                ->first();

            if ($applicantCertification) {
                $certificationData[$applicant->id] = [
                    'status' => $applicantCertification->status,
                    'certified_date' => $applicantCertification->certified_date,
                    'certificate_id' => $applicantCertification->certificate_id,
                ];
            } else {
                $certificationData[$applicant->id] = [
                    'status' => 0,
                    'certified_date' => null,
                    'certificate_id' => null,
                ];
            }
        }

        return view('admin.Trainings.Certifications.form', compact('training', 'certificationData','applicants'));
    }
    public function show( $training){
        $training=Training::select('id','start_miti_bs','end_miti_bs','institution_name_np','institution_name_eng','name_np','name_eng','start_miti_ad','end_miti_ad','department_id')->find($training);
        $datas=TrainingCertification::where('status','1')->get();
        
        return view('admin.Trainings.Certifications.show',compact('training','datas'));
    }
    public function store(Request $request, Training $training)
    {
        $validated = $request->validate([
            'certificate_id' => 'required',
            'certified_date' => 'required|date',
            'certifications' => 'required|array',
            'certifications.*' => 'in:0,1',
        ]);

        try {
            DB::beginTransaction();

            foreach ($validated['certifications'] as $applicationId => $status) {
                $training->trainingCertifications()->updateOrCreate(
                    ['training_application_id' => $applicationId],
                    [
                        'certificate_id' => $validated['certificate_id'],
                        'certified_date' => $validated['certified_date'],
                        'status' => $status,
                    ]
                );
            }

            DB::commit();
            return redirect()->back()->with('success', 'Certificates updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
