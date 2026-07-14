<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = \App\Models\Training::with(['department', 'category'])
            ->where('status', '!=', 'closed')
            ->latest()
            ->get();
        
        return view('trainee.training.index', compact('trainings'));
    }

    public function myTrainings()
    {
        $applications = Auth::user()->trainingApplications()
            ->with('training')
            ->latest()
            ->get();
        
        return view('trainee.my-trainings.index', compact('applications'));
    }

    public function show($id)
    {
        $training = \App\Models\Training::findOrFail($id);
        $application = Auth::user()->trainingApplications()
            ->where('training_id', $id)
            ->first();
        
        return view('trainee.training.show', compact('training', 'application'));
    }
}
