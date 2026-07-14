<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;

class OtpService
{
    /**
     * Generate and send OTP to user email
     */
    public function generateAndSendOtp(User $user): array
    {
        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Set expiration time (15 minutes from now)
        $expiresAt = now()->addMinutes(15);
        
        // Store OTP in database
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => $expiresAt,
        ]);
        
        // Also store in cache for quick access
        Cache::put("otp_{$user->email}", $otp, 900); // 15 minutes
        
        // Send OTP email
        try {
            Mail::to($user->email)->send(new OtpEmail($otp, $user->name_np ?? $user->name));
            
            return [
                'success' => true,
                'message' => 'OTP sent successfully to your email',
                'expires_at' => $expiresAt
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to send OTP email: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Verify OTP
     */
    public function verifyOtp(User $user, string $otp): bool
    {
        // Check if OTP matches
        if ($user->otp_code !== $otp) {
            return false;
        }
        
        // Check if OTP is expired
        if (now()->gt($user->otp_expires_at)) {
            return false;
        }
        
        // Verify user
        $user->update([
            'is_verified' => true,
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);
        
        // Clear cache
        Cache::forget("otp_{$user->email}");
        
        return true;
    }
    
    /**
     * Resend OTP
     */
    public function resendOtp(User $user): array
    {
        return $this->generateAndSendOtp($user);
    }
    
    /**
     * Check if OTP is expired
     */
    public function isOtpExpired(User $user): bool
    {
        return now()->gt($user->otp_expires_at);
    }
}
