<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('trainee.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name_np' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'contact_no' => 'nullable|string',
            'dob_bs' => 'nullable|string',
            'gender' => 'nullable|string',
            'province_id' => 'nullable|exists:provinces,id',
            'district_id' => 'nullable|exists:districts,id',
            'municipality_id' => 'nullable|exists:areas,id',
            'ward_id' => 'nullable|integer',
            'tole' => 'nullable|string',
            'highest_education' => 'nullable|exists:education_levels,id',
            'institution' => 'nullable|string',
            'main_skill' => 'nullable|string',
            'experience_years' => 'nullable|integer',
            'other_skills' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'citizenship_front' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'citizenship_back' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'educational_certificate' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $user = Auth::user();
        
        // Handle file uploads
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_photos', 'public');
            $validated['photo'] = $path;
        }
        if ($request->hasFile('citizenship_front')) {
            $path = $request->file('citizenship_front')->store('citizenship_documents', 'public');
            $validated['citizenship_front'] = $path;
        }
        if ($request->hasFile('citizenship_back')) {
            $path = $request->file('citizenship_back')->store('citizenship_documents', 'public');
            $validated['citizenship_back'] = $path;
        }
        if ($request->hasFile('educational_certificate')) {
            $path = $request->file('educational_certificate')->store('educational_documents', 'public');
            $validated['educational_certificate'] = $path;
        }

        $user->update($validated);

        return back()->with('success', 'प्रोफाइल सफलतापूर्वक अपडेट भयो');
    }
}
