<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingAttendanceController extends Controller
{
    public function index(Training $training)
    {
        $startDate = Carbon::parse($training->start_miti_bs ?? $training->start_miti_ad);
        $endDate = Carbon::parse($training->end_miti_bs ?? $training->end_miti_ad);

        $dates = [];
        while ($startDate <= $endDate) {
            $dates[] = [
                'date' => $startDate->format('Y-m-d'),
                'day' => $startDate->format('l'),
            ];
            $startDate->addDay();
        }
        $applicants = $training->trainingApplications()->where('status','approved')->select('id', 'fullname_np', 'status')->get();
        $attendanceData = [];
        foreach ($applicants as $applicant) {
            $attendanceRecord = $applicant->trainingAttendances->first();
            if ($attendanceRecord && is_array($attendanceRecord->attendance)) {
                $attendanceData[$applicant->id] = $attendanceRecord->attendance;
            }
        }
        return view('admin.Trainings.Attendance.form', compact('training', 'applicants', 'dates', 'attendanceData'));
    }
    public function store(Request $request, Training $training)
    {
        $validated = $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'array',
            'attendance.*.*' => 'nullable|in:0,1',
        ]);
        try {
            DB::beginTransaction();
            foreach ($validated['attendance'] as $applicationId => $dates) {
                $existing = $training->trainingAttendances()
                    ->where('training_application_id', $applicationId)
                    ->first();
            
                $newAttendance = $existing ? $existing->attendance : [];
            
                foreach ($dates as $date => $status) {
                    $newAttendance[$date] = (int)$status;
                }
            
                $training->trainingAttendances()->updateOrCreate(
                    ['training_application_id' => $applicationId],
                    ['attendance' => $newAttendance]
                );
            }            
            DB::commit();
            return back()->with('success', 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
}
