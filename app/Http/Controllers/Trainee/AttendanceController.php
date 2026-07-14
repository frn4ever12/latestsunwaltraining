<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Auth::user()->trainingAttendances()
            ->with('training')
            ->latest()
            ->get();
        
        return view('trainee.attendance.index', compact('attendances'));
    }
}
