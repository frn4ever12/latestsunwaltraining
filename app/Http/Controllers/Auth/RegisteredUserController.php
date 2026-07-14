<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use App\Services\OtpService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_np' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required', 'in:male,female,other'],
            'age' => ['nullable', 'integer', 'min:1', 'max:100'],
            'dob_bs' => ['required', 'string', 'max:20'],
            'dob_ad' => ['nullable', 'string', 'max:20'],
            'sthyayi_province_id' => ['nullable', 'exists:provinces,id'],
            'sthyayi_district_id' => ['nullable', 'exists:districts,id'],
            'sthyayi_sthaniya_taha_id' => ['nullable', 'exists:sthaniya_tahas,id'],
            'sthyayi_ward_id' => ['nullable', 'exists:wards,id'],
            'account_type' => ['required', 'in:trainee,trainer'],
            'consent' => ['accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'name_np' => $request->name_np,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'dob_bs' => $request->dob_bs,
            'dob_ad' => $request->dob_ad,
            'approval_status' => 'pending',
        ]);
        
        // Assign role based on account type
        if ($request->account_type == 'trainer') {
            $user->assignRole('trainer');
        } else {
            $user->assignRole('trainee');
        }
        event(new Registered($user));
        
        // Generate and send OTP
        $otpService = app(OtpService::class);
        $otpResult = $otpService->generateAndSendOtp($user);
        
        if (!$otpResult['success']) {
            // If OTP fails, log error but continue
            \Log::error('OTP sending failed: ' . $otpResult['message']);
        }
        
        // Send SMS only if token is configured
        if (!empty($user->contact_no) && !empty(config('sms.token'))) {
            try {
                $smsService = app(SmsService::class);
                $smsService->sendSMS($user->contact_no, 'तपाईंको खाता दर्ता भइसकेको छ। कृपया इमेल जाँच गर्नुहोस्। नदेखिए स्प्याम बक्स पनि जाँच्नुस्।');
            } catch (\Exception $e) {
                // Log error but don't fail registration
                \Log::error('SMS sending failed: ' . $e->getMessage());
            }
        }
        
        // Store user email in session for OTP verification
        session(['pending_verification_email' => $user->email]);
        
        return redirect()->route('verify.otp')->with('success', 'कृपया तपाईंको इमेलमा पठाइएको OTP कोड प्रविष्ट गर्नुहोस्। तपाईंको दर्ता सफल भएपछि, अन्तिम स्वीकृतिको लागि प्रशासक वा पालिकाको स्वीकृति आवश्यक छ।');
    }

    /**
     * Show OTP verification form.
     */
    public function showOtpVerification(): View|RedirectResponse
    {
        if (!session('pending_verification_email')) {
            return redirect()->route('register')->with('error', 'कृपया पहिले दर्ता गर्नुहोस्।');
        }

        return view('auth.verify-otp');
    }

    /**
     * Verify OTP.
     */
    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $email = session('pending_verification_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('register')->with('error', 'खाता फेला परेन। कृपया पुन: दर्ता गर्नुहोस्।');
        }

        $otpService = app(OtpService::class);
        if ($otpService->verifyOtp($user, $request->otp)) {
            // Clear session
            session()->forget('pending_verification_email');
            
            // Auto-approve user
            $user->approval_status = 'approved';
            $user->save();
            
            return redirect()->route('login')->with('success', 'खाता सफलतापूर्वक सत्यापित भयो। कृपया लगइन गर्नुहोस्।');
        }

        return back()->with('error', 'अमान्य OTP कोड। कृपया पुन: प्रयास गर्नुहोस्।');
    }

    /**
     * Resend OTP.
     */
    public function resendOtp(Request $request): RedirectResponse
    {
        $email = session('pending_verification_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('register')->with('error', 'खाता फेला परेन। कृपया पुन: दर्ता गर्नुहोस्।');
        }

        $otpService = app(OtpService::class);
        $otpResult = $otpService->resendOtp($user);

        if ($otpResult['success']) {
            return back()->with('success', 'OTP पुन: पठाइयो। कृपया तपाईंको इमेल जाँच गर्नुहोस्।');
        }

        return back()->with('error', 'OTP पठाउन असफल भयो। कृपया पछि पुन: प्रयास गर्नुहोस्।');
    }
}
