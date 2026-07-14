<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate profile completion for trainees
        $user = auth()->user();
        $fields = ['name_np', 'email', 'contact_no', 'dob_bs', 'gender'];
        $filled = 0;
        foreach ($fields as $field) {
            if (!empty($user->$field)) {
                $filled++;
            }
        }
        $profileCompletion = round(($filled / count($fields)) * 100);

        // Get organization/municipality name
        $organization = \App\Models\Organization::first();
        $municipalityName = $organization ? $organization->name_np ?? 'नगरपालिका' : 'नगरपालिका';
            
        return view('trainee.dashboard', compact('profileCompletion', 'municipalityName'));
    }
}
