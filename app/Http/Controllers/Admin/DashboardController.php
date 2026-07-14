<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BibadPrakar;
use App\Models\TrainingApplication;
use App\Models\Ward;

class DashboardController extends Controller
{

    public function dashboard()
    {
        // Always show admin dashboard for /portal/dashboard
        // Trainees should access /portal/trainee/dashboard for their dashboard

        $countData = [
            'male_count' => TrainingApplication::where('gender', 'male')->count(),
            'female_count' => TrainingApplication::where('gender', 'female')->count(),
        ];
        $wards = Ward::leftJoin('ta_thegana_details', 'ta_thegana_details.sthyayi_ward_id', '=', 'wards.id')
            ->leftJoin('training_applications', 'training_applications.id', '=', 'ta_thegana_details.training_application_id')
            ->select(
                'wards.id',
                'wards.name'
            )
            ->selectRaw('COUNT(DISTINCT CASE WHEN training_applications.gender = "male" THEN training_applications.id END) as male_count')
            ->selectRaw('COUNT(DISTINCT CASE WHEN training_applications.gender = "female" THEN training_applications.id END) as female_count')
            ->selectRaw('COUNT(DISTINCT training_applications.id) as total_count')
            ->groupBy('wards.id', 'wards.name', 'wards.name_eng')
            ->get();

        $profileCompletion = 0;
            
        return view('dashboard', compact('countData', 'wards', 'profileCompletion'));
    }
}
