@extends('trainee.includes.main')
@section('title', 'मेरो प्रोफाइल')
@section('page-title')
    मेरो प्रोफाइल
@endsection
@section('content')
    @php
        $user = Auth::user();
        $profile = $user->profile;
        $education = $user->education;
        $documents = $user->documents;
        $skills = $user->skills;
        $experience = $user->experience;
        $profileCompletion = $user->profile_completion ?? 0;
    @endphp

    <div class="glass-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">
                <i class="bi bi-person"></i>
                मेरो प्रोफाइल
            </h2>
            <div class="d-flex gap-2 no-print">
                <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary">
                    <i class="bi bi-pencil-square"></i> सम्पादन गर्नुहोस्
                </a>
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="bi bi-printer"></i> प्रिन्ट गर्नुहोस्
                </button>
            </div>
        </div>

        <!-- Profile Completion Progress Bar -->
        <div class="mb-4 no-print">
            <div class="d-flex justify-content-between mb-2">
                <span class="fw-bold">प्रोफाइल पूर्णता</span>
                <span class="fw-bold {{ $profileCompletion >= 100 ? 'text-success' : 'text-warning' }}">
                    {{ $profileCompletion }}%
                </span>
            </div>
            <div class="progress" style="height: 25px; border-radius: 12px; background: #e5e7eb;">
                <div class="progress-bar {{ $profileCompletion >= 100 ? 'bg-success' : 'bg-warning' }}" 
                     role="progressbar" 
                     style="width: {{ $profileCompletion }}%; border-radius: 12px;" 
                     aria-valuenow="{{ $profileCompletion }}" 
                     aria-valuemin="0" 
                     aria-valuemax="100">
                    {{ $profileCompletion }}%
                </div>
            </div>
        </div>

        <!-- Profile Photo Section -->
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                <div class="profile-photo-container">
                    @if($profile && $profile->passport_photo)
                        <img src="{{ asset('files/' . $profile->passport_photo) }}" 
                             class="profile-photo" 
                             alt="प्रोफाइल फोटो"
                             style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid #007bff;">
                    @else
                        <div class="profile-photo-placeholder" 
                             style="width: 150px; height: 150px; border-radius: 50%; background: #e5e7eb; display: flex; align-items: center; justify-content-center; margin: 0 auto;">
                            <i class="bi bi-person fs-1 text-muted"></i>
                        </div>
                    @endif
                </div>
                <h5 class="mt-2">{{ $profile->full_name_np ?? $user->name }}</h5>
                <p class="text-muted">{{ $profile->mobile_number ?? $user->email }}</p>
            </div>
            <div class="col-md-9">
                <div class="alert alert-info no-print">
                    <i class="bi bi-info-circle"></i>
                    यो प्रोफाइल तालिम आवेदनको लागि प्रयोग गरिन्छ। कृपया सबै विवरण सही रहेको निश्चित गर्नुहोस्।
                </div>
            </div>
        </div>

        <!-- Personal Details -->
        <div class="mb-4 profile-section">
            <h4 class="mb-3 fw-bold section-title">
                <i class="bi bi-person"></i> १. व्यक्तिगत विवरण
            </h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">नाम (English)</label>
                    <p class="form-control-plaintext">{{ $profile->full_name_en ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">नाम (नेपाली)</label>
                    <p class="form-control-plaintext">{{ $profile->full_name_np ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">लिङ्ग</label>
                    <p class="form-control-plaintext">
                        {{ $profile->gender == 'male' ? 'पुरुष' : ($profile->gender == 'female' ? 'महिला' : 'अन्य') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">जन्म मिति (बि.सं.)</label>
                    <p class="form-control-plaintext">{{ $profile->dob_bs ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">जन्म मिति (AD)</label>
                    <p class="form-control-plaintext">{{ $profile->dob_ad ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">नागरिकता नं.</label>
                    <p class="form-control-plaintext">{{ $profile->citizenship_no ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">राष्ट्रिय ID नं.</label>
                    <p class="form-control-plaintext">{{ $profile->national_id_no ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">पासपोर्ट नं.</label>
                    <p class="form-control-plaintext">{{ $profile->passport_no ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">वैवाहिक स्थिति</label>
                    <p class="form-control-plaintext">
                        {{ $profile->marital_status == 'single' ? 'अविवाहित' : 
                           ($profile->marital_status == 'married' ? 'विवाहित' : 
                           ($profile->marital_status == 'divorced' ? 'सम्बन्ध विच्छेद' : 
                           ($profile->marital_status == 'widowed' ? 'विधवा/विधुर' : 'N/A'))) }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">रक्त समूह</label>
                    <p class="form-control-plaintext">{{ $profile->blood_group ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">मोबाइल नं.</label>
                    <p class="form-control-plaintext">{{ $profile->mobile_number ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">वैकल्पिक मोबाइल नं.</label>
                    <p class="form-control-plaintext">{{ $profile->alternative_mobile ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">इमेल</label>
                    <p class="form-control-plaintext">{{ $profile->email ?? $user->email }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">पिताको नाम</label>
                    <p class="form-control-plaintext">{{ $profile->father_name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">माताको नाम</label>
                    <p class="form-control-plaintext">{{ $profile->mother_name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">हजुरबुको नाम</label>
                    <p class="form-control-plaintext">{{ $profile->grandfather_name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">जीवनसाथीको नाम</label>
                    <p class="form-control-plaintext">{{ $profile->spouse_name ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Address Details -->
        <div class="mb-4 profile-section">
            <h4 class="mb-3 fw-bold section-title">
                <i class="bi bi-geo-alt"></i> २. ठेगाना विवरण
            </h4>
            <h5 class="mb-2">स्थायी ठेगाना</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">प्रदेश</label>
                    <p class="form-control-plaintext">{{ $profile->permanentProvince->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">जिल्ला</label>
                    <p class="form-control-plaintext">{{ $profile->permanentDistrict->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">गाउँपालिका/नगरपालिका</label>
                    <p class="form-control-plaintext">{{ $profile->permanentMunicipality->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">वडा नं.</label>
                    <p class="form-control-plaintext">{{ $profile->permanent_ward_id ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">टोल</label>
                    <p class="form-control-plaintext">{{ $profile->permanent_tole ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">घर नं.</label>
                    <p class="form-control-plaintext">{{ $profile->permanent_house_no ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">पोस्टल कोड</label>
                    <p class="form-control-plaintext">{{ $profile->permanent_postal_code ?? 'N/A' }}</p>
                </div>
            </div>

            @if($profile && !$profile->temp_same_as_permanent)
                <h5 class="mb-2">अस्थायी ठेगाना</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">प्रदेश</label>
                        <p class="form-control-plaintext">{{ $profile->tempProvince->name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">जिल्ला</label>
                        <p class="form-control-plaintext">{{ $profile->tempDistrict->name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">गाउँपालिका/नगरपालिका</label>
                        <p class="form-control-plaintext">{{ $profile->tempMunicipality->name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">वडा नं.</label>
                        <p class="form-control-plaintext">{{ $profile->temp_ward_id ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">टोल</label>
                        <p class="form-control-plaintext">{{ $profile->temp_tole ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">घर नं.</label>
                        <p class="form-control-plaintext">{{ $profile->temp_house_no ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">पोस्टल कोड</label>
                        <p class="form-control-plaintext">{{ $profile->temp_postal_code ?? 'N/A' }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Education Details -->
        <div class="mb-4 profile-section">
            <h4 class="mb-3 fw-bold section-title">
                <i class="bi bi-book"></i> ३. शैक्षिक विवरण
            </h4>
            @if($education && $education->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>शिक्षा स्तर</th>
                                <th>संकाय/प्रवाह</th>
                                <th>बोर्ड/विश्वविद्यालय</th>
                                <th>संस्था</th>
                                <th>उत्तीर्ण वर्ष</th>
                                <th>GPA/प्रतिशत</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($education as $edu)
                                <tr>
                                    <td>{{ $edu->educationLevel->name_np ?? 'N/A' }}</td>
                                    <td>{{ $edu->faculty_stream ?? 'N/A' }}</td>
                                    <td>{{ $edu->board_university ?? 'N/A' }}</td>
                                    <td>{{ $edu->institution_name ?? 'N/A' }}</td>
                                    <td>{{ $edu->passed_year ?? 'N/A' }}</td>
                                    <td>{{ $edu->gpa_percentage ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning">कुनै शैक्षिक विवरण छैन।</div>
            @endif
        </div>

        <!-- Skills & Experience -->
        <div class="mb-4 profile-section">
            <h4 class="mb-3 fw-bold section-title">
                <i class="bi bi-tools"></i> ४. सीप तथा अनुभव
            </h4>
            <div class="mb-3">
                <h5 class="fw-bold">सीपहरू</h5>
                <div>
                    @if($skills && $skills->count() > 0)
                        @foreach($skills as $skill)
                            <span class="badge bg-primary me-2 mb-2">{{ $skill->skill_name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">कुनै सीप छैन।</span>
                    @endif
                </div>
            </div>
            
            @if($experience && $experience->count() > 0)
                <h5 class="fw-bold mt-4">कार्य अनुभव</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>संस्था</th>
                                <th>पद</th>
                                <th>सुरु मिति</th>
                                <th>अन्त्य मिति</th>
                                <th>प्रकार</th>
                                <th>विवरण</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($experience as $exp)
                                <tr>
                                    <td>{{ $exp->organization_name ?? 'N/A' }}</td>
                                    <td>{{ $exp->position ?? 'N/A' }}</td>
                                    <td>{{ $exp->from_date ?? 'N/A' }}</td>
                                    <td>{{ $exp->to_date ?? 'N/A' }}</td>
                                    <td>{{ $exp->experience_type ?? 'N/A' }}</td>
                                    <td>{{ $exp->description ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Documents Preview -->
        <div class="mb-4 profile-section">
            <h4 class="mb-3 fw-bold section-title">
                <i class="bi bi-file-earmark"></i> ५. कागजातहरू
            </h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">नागरिकता अगाडि</label>
                    <div class="document-preview">
                        @if($documents && $documents->citizenship_front)
                            <a href="{{ asset('files/' . $documents->citizenship_front) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->citizenship_front) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">नागरिकता पछाडि</label>
                    <div class="document-preview">
                        @if($documents && $documents->citizenship_back)
                            <a href="{{ asset('files/' . $documents->citizenship_back) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->citizenship_back) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">पासपोर्ट साइज फोटो</label>
                    <div class="document-preview">
                        @if($documents && $documents->passport_size_photo)
                            <a href="{{ asset('files/' . $documents->passport_size_photo) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->passport_size_photo) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">शैक्षिक प्रमाणपत्र</label>
                    <div class="document-preview">
                        @if($documents && $documents->academic_certificates)
                            <a href="{{ asset('files/' . $documents->academic_certificates) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->academic_certificates) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">अनुभव प्रमाणपत्र</label>
                    <div class="document-preview">
                        @if($documents && $documents->experience_certificate)
                            <a href="{{ asset('files/' . $documents->experience_certificate) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->experience_certificate) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">सिफारिस पत्र</label>
                    <div class="document-preview">
                        @if($documents && $documents->recommendation_letter)
                            <a href="{{ asset('files/' . $documents->recommendation_letter) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->recommendation_letter) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">अपाङ्गता कार्ड</label>
                    <div class="document-preview">
                        @if($documents && $documents->disability_card)
                            <a href="{{ asset('files/' . $documents->disability_card) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->disability_card) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">समावेशी प्रमाणपत्र</label>
                    <div class="document-preview">
                        @if($documents && $documents->inclusion_certificate)
                            <a href="{{ asset('files/' . $documents->inclusion_certificate) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('files/' . $documents->inclusion_certificate) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">अन्य कागजातहरू</label>
                    <div class="document-preview">
                        @if($documents && $documents->other_documents)
                            <a href="{{ asset('storage/' . $documents->other_documents) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> हेर्नुहोस्
                            </a>
                            <img src="{{ asset('storage/' . $documents->other_documents) }}" 
                                 class="img-thumbnail mt-2" 
                                 style="max-width: 200px; max-height: 200px;">
                        @else
                            <span class="text-muted">अपलोड गरिएको छैन</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Training Application Details -->
        @if($user->trainingApplications()->count() > 0)
            <div class="mb-4 profile-section">
                <h4 class="mb-3 fw-bold section-title">
                    <i class="bi bi-journal-check"></i> ६. तालिम आवेदन विवरण
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>आवेदन नं.</th>
                                <th>तालिमको नाम</th>
                                <th>आवेदन मिति</th>
                                <th>स्थिति</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->trainingApplications as $application)
                                <tr>
                                    <td>{{ $application->application_no }}</td>
                                    <td>{{ $application->training->name_np ?? 'N/A' }}</td>
                                    <td>{{ $application->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <span class="badge {{ $application->getBadgeClass() }}">
                                            {{ $application->getStatusLabel() }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('training-application.confirmation', $application) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> विवरण
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="mb-4 profile-section no-print">
                <h4 class="mb-3 fw-bold section-title">
                    <i class="bi bi-journal-plus"></i> ६. तालिम आवेदन
                </h4>
                @if($profileCompletion >= 100)
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i>
                        तपाईंको प्रोफाइल १००% पूरा भएको छ। तपाईं तालिम आवेदन गर्न सक्नुहुन्छ।
                    </div>
                    <a href="{{ route('trainee.training.index') }}" class="btn btn-primary">
                        <i class="bi bi-list"></i> उपलब्ध तालिमहरू हेर्नुहोस्
                    </a>
                @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        तालिम आवेदन गर्नुअघि कृपया आफ्नो प्रोफाइल १००% पूरा गर्नुहोस्।
                    </div>
                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i> प्रोफाइल पूरा गर्नुहोस्
                    </a>
                @endif
            </div>
        @endif
    </div>

    <style>
        .profile-section {
            page-break-inside: avoid;
        }
        
        .section-title {
            border-bottom: 2px solid #007bff;
            padding-bottom: 8px;
            margin-bottom: 16px;
        }
        
        .document-preview img {
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .document-preview img:hover {
            transform: scale(1.05);
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            
            .glass-card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }
            
            .profile-section {
                page-break-inside: avoid;
            }
            
            .section-title {
                border-bottom: 2px solid #000;
            }
            
            .badge {
                border: 1px solid #000;
                background: white !important;
                color: black !important;
            }
            
            .table {
                border: 1px solid #000;
            }
            
            .table th, .table td {
                border: 1px solid #000;
            }
            
            .btn {
                display: none !important;
            }
            
            .document-preview a {
                display: none !important;
            }
        }
    </style>
@endsection
