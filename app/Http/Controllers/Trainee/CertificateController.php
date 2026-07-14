<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Auth::user()->trainingApplications()
            ->where('status', 'approved')
            ->with('training')
            ->get();
        
        return view('trainee.certificate.index', compact('certificates'));
    }

    public function download($id)
    {
        $application = Auth::user()->trainingApplications()->findOrFail($id);
        // Add certificate download logic here
        return back()->with('success', 'प्रमाणपत्र डाउनलोड गर्नुहोस्');
    }
}
