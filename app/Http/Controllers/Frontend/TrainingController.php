<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $query = Training::with(['department', 'category', 'trainingApplications'])
            ->withCount('trainingApplications');
        
        if (!empty(request()->input('training_name'))) {
            $query->where('name_np', 'like', '%' . request()->input('training_name') . '%');
        }
        if (!empty(request()->input('entry_date'))) {
            $query->whereDate('start_miti_bs', '>=', request()->input('entry_date'));
        }
        if (!empty(request()->input('end_date'))) {
            $query->whereDate('end_miti_bs', '<=', request()->input('end_date'));
        }

        $trainings = $query->latest()->paginate(12);
        
        $departments = \App\Models\Department::all();
        $categories = \App\Models\Category::all();
        $wards = \App\Models\Ward::all();
        
        return view('frontend.Training.index', compact('trainings', 'departments', 'categories', 'wards'));
    }
    public function show($id)
    {
        $training = Training::with(['department', 'category', 'trainingApplications'])
            ->withCount('trainingApplications')
            ->findOrFail($id);

        return view('frontend.Training.show', compact('training'));
    }
}
