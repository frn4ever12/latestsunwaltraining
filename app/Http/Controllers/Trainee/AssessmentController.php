<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Auth::user()->trainingApplications()
            ->with('training')
            ->get();
        
        return view('trainee.assessment.index', compact('assessments'));
    }

    public function show($id)
    {
        $application = Auth::user()->trainingApplications()->findOrFail($id);
        return view('trainee.assessment.show', compact('application'));
    }
}
