<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingApplicationRequest;
use App\Models\Training;
use App\Models\TrainingApplication;
use App\Services\TrainingApplicationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TrainingApplicationController extends Controller
{
    protected $trainingApplicationService;

    public function __construct(TrainingApplicationService $trainingApplicationService)
    {
        $this->trainingApplicationService = $trainingApplicationService;
    }
    public function index($training)
    {
        $training = Training::select('id', 'status', 'name_np','start_miti_bs', 'user_id')->find($training);
        
        // Check if user is trainee
        if (Auth::user()->hasRole('trainee')) {
            // Check profile completion
            $profileCompletion = Auth::user()->calculateProfileCompletion();
            if ($profileCompletion < 100) {
                return redirect()->route('trainee.profile.edit')->with('warning', 'कृपया तालिममा आवेदन गर्नुअघि आफ्नो प्रोफाइल १००% पूर्ण गर्नुहोस्।');
            }
            return view('trainee.training-application.form', compact('training'));
        }
        
        return view('admin.TrainingApplication.form', compact('training'));
    }

    public function create($training)
    {
        $training = Training::select('id', 'status', 'name_np','start_miti_bs', 'user_id')->find($training);
        
        // Check if user is trainee, return trainee view
        if (Auth::user()->hasRole('trainee')) {
            return view('trainee.training-application.form', compact('training'));
        }
        
        return view('admin.TrainingApplication.form', compact('training'));
    }

    public function store(TrainingApplicationRequest $request, $training)
    {
        $validatedData = $request->validated();
        try {
            $user = Auth::user();
            $profile = $user->profile;
            
            // Copy profile data to application to preserve historical data
            if ($profile) {
                $validatedData['fullname_np'] = $profile->full_name_np;
                $validatedData['fullname_eng'] = $profile->full_name_en;
                $validatedData['father_name'] = $profile->father_name;
                $validatedData['mother_name'] = $profile->mother_name;
                $validatedData['grandfather_name'] = $profile->grandfather_name;
                $validatedData['citizenship_no'] = $profile->citizenship_no;
                $validatedData['dob_bs'] = $profile->dob_bs;
                $validatedData['dob_ad'] = $profile->dob_ad;
                $validatedData['gender'] = $profile->gender;
                $validatedData['email'] = $profile->email;
                $validatedData['contact_no'] = $profile->mobile_number;
                $validatedData['mobile_no'] = $profile->mobile_number;
                
                if ($profile->citizenship_district_id) {
                    $validatedData['citizenship_district_id'] = $profile->citizenship_district_id;
                }
            }
            
            $validatedData['training_id'] = $training;
            $result = $this->trainingApplicationService->store($validatedData);
            
            // Redirect trainees to training list with success message
            if (Auth::user()->hasRole('trainee')) {
                return to_route('trainee.training.index')->with('success', 'सफलता! हजुरको आवेदन सफलतापूर्वक पेश गरियो। आवेदन कोड: ' . $result->application_no);
            }
            
            return to_route('training-application.edit', [$training, $result->id])->with(['success' => 'सफलता! हजुरको व्यक्तिगत विवरण सफलतापूर्वक सुरक्षित भयो ।', 'education_tab' => true]);
        } catch (\Exception $e) {
            \Log::error('Application submission error: ' . $e->getMessage());
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function edit($training, TrainingApplication $application)
    {
        try {
            $training = Training::find($training);
            
            // Check if user is trainee, return trainee view
            if (Auth::user()->hasRole('trainee')) {
                return view('trainee.training-application.form', compact('training', 'application'));
            }
            
            return view('admin.TrainingApplication.form', compact('training', 'application'));
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function update(TrainingApplicationRequest $request, $training, TrainingApplication $application)
    {
        try {
            $result = $this->trainingApplicationService->update($request->validated(), $application);
            
            // Redirect trainees to trainee view
            if (Auth::user()->hasRole('trainee')) {
                return to_route('training.index')->with('success', 'सफलता! आवेदन अपडेट भयो ।');
            }
            
            return redirect()
                ->route('training-application.edit', [$training, $application])->with(['success' => 'सफलता! डेटा सफलतापूर्वक सुरक्षित भयो ।', 'education_tab' => true]);
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }

    public function alreadyApplied()
    {
        return view('shared.messages.already-applied');
    }

    public function confirmation($training, TrainingApplication $application)
    {
        try {
            $training = Training::find($training);
            
            // Check if user is trainee, return trainee view
            if (Auth::user()->hasRole('trainee')) {
                return view('trainee.training-application.confirmation', compact('training', 'application'));
            }
            
            return view('admin.TrainingApplication.confirmation', compact('training', 'application'));
        } catch (\Exception $e) {
            return back()->with('error', 'समस्या आयो, डेटा मिलेन।');
        }
    }
}
