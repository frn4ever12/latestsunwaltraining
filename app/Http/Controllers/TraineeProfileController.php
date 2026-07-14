<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\UserEducation;
use App\Models\UserDocument;
use App\Models\UserSkill;
use App\Models\UserExperience;
use Illuminate\Support\Facades\Storage;

class TraineeProfileController extends Controller
{
    public function view()
    {
        $user = auth()->user();
        return view('trainee.profile.view');
    }

    public function updatePersonal(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'full_name_en' => 'required|string|max:255',
            'full_name_np' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob_bs' => 'required|string',
            'dob_ad' => 'required|date',
            'citizenship_no' => 'required|string',
            'national_id_no' => 'nullable|string',
            'passport_no' => 'nullable|string',
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'blood_group' => 'nullable|string',
            'mobile_number' => 'required|string',
            'alternative_mobile' => 'nullable|string',
            'email' => 'required|email',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'grandfather_name' => 'required|string',
            'spouse_name' => 'nullable|string',
            'passport_photo' => 'nullable|image|max:2048',
        ]);

        $profile = $user->profile ?? new UserProfile();
        $profile->user_id = $user->id;
        
        if ($request->hasFile('passport_photo')) {
            if ($profile->passport_photo) {
                Storage::delete('public/' . $profile->passport_photo);
            }
            $profile->passport_photo = $request->file('passport_photo')->store('profile_photos', 'public');
        }

        $profile->fill($validated);
        $profile->save();

        $user->calculateProfileCompletion();

        // Refresh user to load updated profile
        $user->refresh();

        // Check if user clicked "Save and Next"
        $nextTab = $request->input('next_tab');
        if ($nextTab) {
            return redirect()->route('trainee.profile.edit', ['tab' => $nextTab])->with('success', 'व्यक्तिगत विवरण सुरक्षित भयो।');
        }

        return redirect()->route('trainee.profile.edit', ['tab' => 'personal'])->with('success', 'व्यक्तिगत विवरण सुरक्षित भयो।');
    }

    public function updateAddress(Request $request)
    {
        $user = auth()->user();
        
        // Convert checkbox to boolean before validation
        $request->merge([
            'temp_same_as_permanent' => $request->has('temp_same_as_permanent'),
        ]);
        
        $validated = $request->validate([
            'permanent_province_id' => 'required|exists:provinces,id',
            'permanent_district_id' => 'required|exists:districts,id',
            'permanent_municipality_id' => 'required|exists:sthaniya_tahas,id',
            'permanent_ward_id' => 'required|integer',
            'permanent_tole' => 'nullable|string',
            'permanent_house_no' => 'nullable|string',
            'temp_same_as_permanent' => 'nullable|boolean',
            'temp_province_id' => 'nullable|exists:provinces,id',
            'temp_district_id' => 'nullable|exists:districts,id',
            'temp_municipality_id' => 'nullable|exists:sthaniya_tahas,id',
            'temp_ward_id' => 'nullable|integer',
            'temp_tole' => 'nullable|string',
            'temp_house_no' => 'nullable|string',
        ]);

        $profile = $user->profile ?? new UserProfile();
        $profile->user_id = $user->id;
        $profile->fill($validated);
        $profile->save();

        $user->calculateProfileCompletion();

        // Refresh user to load updated profile
        $user->refresh();

        // Check if user clicked "Save and Next"
        $nextTab = $request->input('next_tab');
        if ($nextTab) {
            return redirect()->route('trainee.profile.edit', ['tab' => $nextTab])->with('success', 'ठेगाना विवरण सुरक्षित भयो।');
        }

        return redirect()->route('trainee.profile.edit', ['tab' => 'address'])->with('success', 'ठेगाना विवरण सुरक्षित भयो।');
   }

    public function updateEducation(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'education_id' => 'nullable|exists:user_educations,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'faculty_stream' => 'nullable|string',
            'board_university' => 'nullable|string',
            'institution_name' => 'nullable|string',
            'passed_year' => 'nullable|string',
            'gpa_percentage' => 'nullable|string',
            'certificate_upload' => 'nullable|file|max:2048',
        ]);

        // Update existing or create new education record
        if ($request->education_id) {
            $education = UserEducation::find($request->education_id);
            if ($education && $education->user_id == $user->id) {
                $education->education_level_id = $request->education_level_id;
                $education->faculty_stream = $request->faculty_stream;
                $education->board_university = $request->board_university;
                $education->institution_name = $request->institution_name;
                $education->passed_year = $request->passed_year;
                $education->gpa_percentage = $request->gpa_percentage;
                
                if ($request->hasFile('certificate_upload')) {
                    if ($education->certificate_upload) {
                        Storage::delete('public/' . $education->certificate_upload);
                    }
                    $education->certificate_upload = $request->file('certificate_upload')->store('education_certificates', 'public');
                }
                
                $education->save();
            }
        } else {
            $education = new UserEducation();
            $education->user_id = $user->id;
            $education->education_level_id = $request->education_level_id;
            $education->faculty_stream = $request->faculty_stream;
            $education->board_university = $request->board_university;
            $education->institution_name = $request->institution_name;
            $education->passed_year = $request->passed_year;
            $education->gpa_percentage = $request->gpa_percentage;
            
            if ($request->hasFile('certificate_upload')) {
                $education->certificate_upload = $request->file('certificate_upload')->store('education_certificates', 'public');
            }
            
            $education->save();
        }

        $user->calculateProfileCompletion();

        // Check if user clicked "Save and Next"
        $nextTab = $request->input('next_tab');
        if ($nextTab) {
            return redirect()->route('trainee.profile.edit', ['tab' => $nextTab])->with('success', 'शिक्षा विवरण सुरक्षित भयो।');
        }

        return redirect()->route('trainee.profile.edit', ['tab' => 'education'])->with('success', 'शिक्षा विवरण सुरक्षित भयो।');
    }

    public function deleteEducation($id)
    {
        $user = auth()->user();
        $education = UserEducation::find($id);
        
        if ($education && $education->user_id == $user->id) {
            if ($education->certificate_upload) {
                Storage::delete('public/' . $education->certificate_upload);
            }
            $education->delete();
            $user->calculateProfileCompletion();
            
            if (request()->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'शिक्षा विवरण मेटाइयो।']);
            }
            
            return redirect()->back()->with('success', 'शिक्षा विवरण मेटाइयो।');
        }
        
        if (request()->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'शिक्षा विवरण मेटाउन सकिएन।']);
        }
        
        return redirect()->back()->with('error', 'शिक्षा विवरण मेटाउन सकिएन।');
    }

    public function getEducation($id)
    {
        $user = auth()->user();
        $education = UserEducation::find($id);
        
        if ($education && $education->user_id == $user->id) {
            return response()->json($education);
        }
        
        return response()->json(['error' => 'Education not found'], 404);
    }

    public function updateDocuments(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'citizenship_front' => 'nullable|file|max:2048',
            'citizenship_back' => 'nullable|file|max:2048',
            'passport_size_photo' => 'nullable|image|max:2048',
            'academic_certificates' => 'nullable|file|max:2048',
            'experience_certificate' => 'nullable|file|max:2048',
            'recommendation_letter' => 'nullable|file|max:2048',
            'disability_card' => 'nullable|file|max:2048',
            'inclusion_certificate' => 'nullable|file|max:2048',
            'other_documents' => 'nullable|file|max:2048',
        ]);

        $documents = $user->documents ?? new UserDocument();
        $documents->user_id = $user->id;

        $fileFields = [
            'citizenship_front', 'citizenship_back', 'passport_size_photo',
            'academic_certificates', 'experience_certificate', 'recommendation_letter',
            'disability_card', 'inclusion_certificate', 'other_documents'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($documents->$field) {
                    Storage::delete('public/' . $documents->$field);
                }
                $documents->$field = $request->file($field)->store('user_documents', 'public');
            }
        }

        $documents->save();

        $user->calculateProfileCompletion();

        // Check if user clicked "Save and Next"
        $nextTab = $request->input('next_tab');
        if ($nextTab) {
            return redirect()->route('trainee.profile.edit', ['tab' => $nextTab])->with('success', 'कागजातहरू सुरक्षित भए।');
        }

        return redirect()->back()->with('success', 'कागजातहरू सुरक्षित भए।');
    }

    public function updateSkills(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'skills' => 'nullable|string',
        ]);

        // Update skills
        $user->skills()->delete();
        if ($request->skills) {
            $skills = json_decode($request->skills, true);
            if (is_array($skills)) {
                foreach ($skills as $skillName) {
                    $skill = new UserSkill();
                    $skill->user_id = $user->id;
                    $skill->skill_name = $skillName;
                    $skill->save();
                }
            }
        }

        $user->calculateProfileCompletion();

        return redirect()->back()->with('success', 'सीपहरू सुरक्षित भए।');
    }

    public function updateExperience(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'experience_id' => 'nullable|exists:user_experiences,id',
            'organization_name' => 'required|string',
            'position' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'experience_type' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Update existing or create new experience record
        if ($request->experience_id) {
            $experience = UserExperience::find($request->experience_id);
            if ($experience && $experience->user_id == $user->id) {
                $experience->organization_name = $request->organization_name;
                $experience->position = $request->position;
                $experience->from_date = $request->from_date;
                $experience->to_date = $request->to_date;
                $experience->experience_type = $request->experience_type;
                $experience->description = $request->description;
                $experience->save();
            }
        } else {
            $experience = new UserExperience();
            $experience->user_id = $user->id;
            $experience->organization_name = $request->organization_name;
            $experience->position = $request->position;
            $experience->from_date = $request->from_date;
            $experience->to_date = $request->to_date;
            $experience->experience_type = $request->experience_type;
            $experience->description = $request->description;
            $experience->save();
        }

        $user->calculateProfileCompletion();

        // Check if user clicked "Save and Next"
        $nextTab = $request->input('next_tab');
        if ($nextTab) {
            return redirect()->route('trainee.profile.edit', ['tab' => $nextTab])->with('success', 'अनुभव विवरण सुरक्षित भए।');
        }

        return redirect()->route('trainee.profile.edit', ['tab' => 'experience'])->with('success', 'अनुभव विवरण सुरक्षित भए।');
    }

    public function deleteExperience($id)
    {
        $user = auth()->user();
        $experience = UserExperience::find($id);
        
        if ($experience && $experience->user_id == $user->id) {
            $experience->delete();
            $user->calculateProfileCompletion();
            
            if (request()->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'अनुभव विवरण मेटाइयो।']);
            }
            
            return redirect()->back()->with('success', 'अनुभव विवरण मेटाइयो।');
        }
        
        if (request()->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'अनुभव विवरण मेटाउन सकिएन।']);
        }
        
        return redirect()->back()->with('error', 'अनुभव विवरण मेटाउन सकिएन।');
    }

    public function getExperience($id)
    {
        $user = auth()->user();
        $experience = UserExperience::find($id);
        
        if ($experience && $experience->user_id == $user->id) {
            return response()->json($experience);
        }
        
        return response()->json(['error' => 'Experience not found'], 404);
    }

    public function getDistricts($provinceId)
    {
        $districts = \App\Models\District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }

    public function getMunicipalities($districtId)
    {
        $municipalities = \App\Models\SthaniyaTaha::where('district_id', $districtId)->get();
        return response()->json($municipalities);
    }
}
