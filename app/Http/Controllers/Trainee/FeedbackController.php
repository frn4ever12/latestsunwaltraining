<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $trainings = Auth::user()->trainingApplications()
            ->where('status', 'approved')
            ->with('training')
            ->get();
        
        return view('trainee.feedback.index', compact('trainings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        // Store feedback logic here
        // You may need to create a feedback model and migration

        return back()->with('success', 'प्रतिक्रिया सफलतापूर्वक पेश गरियो।');
    }
}
