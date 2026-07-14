<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->hasRole('trainee')) {
            $user = Auth::user();
            $fields = ['name_np', 'email', 'contact_no', 'dob_bs', 'gender'];
            $filled = 0;
            foreach ($fields as $field) {
                if (!empty($user->$field)) {
                    $filled++;
                }
            }
            $profileCompletion = round(($filled / count($fields)) * 100);

            if ($profileCompletion < 100) {
                return redirect()->route('trainee.profile.edit')
                    ->with('warning', 'कृपया तालिम आवेदन गर्नुअघि आफ्नो प्रोफाइल पूरा गर्नुहोस्।');
            }
        }

        return $next($request);
    }
}
