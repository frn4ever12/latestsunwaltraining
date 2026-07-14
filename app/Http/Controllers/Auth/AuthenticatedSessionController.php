<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();
        
        // Check if user is approved
        if ($user->approval_status !== 'approved') {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            if ($user->approval_status === 'pending') {
                return back()->with('error', 'तपाईंको खाता अझै स्वीकृत भएको छैन। कृपया प्रशासकले स्वीकृत गरेपछि लगइन गर्नुहोस्।');
            } elseif ($user->approval_status === 'rejected') {
                return back()->with('error', 'तपाईंको खाता अस्वीकार गरिएको छ। कृपया प्रशासकलाई सम्पर्क गर्नुहोस्।');
            }
        }

        $request->session()->regenerate();

        // Clear intended URL to force redirect to proper dashboard
        $request->session()->forget('url.intended');

        // Redirect based on user role - prioritize admin roles
        if ($user->hasAnyRole(['super-admin', 'admin'])) {
            return redirect()->route('dashboard');
        }

        if ($user->hasRole('trainee')) {
            return redirect()->route('trainee.profile.edit')
                ->with('info', 'कृपया आफ्नो प्रोफाइल पूर्ण गर्नुहोस्। प्रोफाइल पूर्ण गरेपछि मात्र तालिमको लागि आवेदन दिन सकिन्छ।');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
