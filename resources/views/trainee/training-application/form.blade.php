@extends('trainee.includes.main')
@section('title', 'तालिम आवेदन')
@section('content')
    @php
        $user = Auth::user();
        $profile = $user->profile;
        $education = $user->education;
        $documents = $user->documents;
        $skills = $user->skills;
        $experience = $user->experience;
    @endphp

    <div class="glass-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="card-title">
                    <i class="bi bi-file-earmark-plus"></i>
                    तालिम आवेदन फारम
                </h2>
                <small>{{ $training->name_np }} - {{ $training->start_miti_bs }}</small>
            </div>
            <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary">
                <i class="bi bi-pencil-square"></i> प्रोफाइल सम्पादन गर्नुहोस्
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 8px;">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger" style="border-radius: 8px;">
                {{ session('error') }}
            </div>
        @endif

        @if(!$profile)
            <div class="alert alert-warning" style="border-radius: 8px;">
                <i class="bi bi-exclamation-triangle-fill"></i>
                तपाईंको प्रोफाइल छैन। कृपया आवेदन गर्नुअघि प्रोफाइल सिर्जना गर्नुहोस्।
                <a href="{{ route('trainee.profile.edit') }}" class="alert-link">प्रोफाइल सिर्जना गर्नुहोस्</a>
            </div>
        @endif

        <form method="POST" action="{{ isset($application) ? route('training-application.update', [$training, $application]) : route('training-application.store', $training) }}">
            @csrf
            @if(isset($application))
                @method('PATCH')
            @endif
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3" id="formTabs" role="tablist" style="border-bottom: none;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" style="background-color: #007bff; color: white; border-color: #007bff;">
                        <i class="bi bi-person"></i> व्यक्तिगत विवरण
                    </button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" style="background-color: #28a745; color: white; border-color: #28a745;">
                        <i class="bi bi-geo-alt"></i> ठेगाना विवरण
                    </button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab" style="background-color: #17a2b8; color: white; border-color: #17a2b8;">
                        <i class="bi bi-book"></i> शिक्षा
                    </button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab" style="background-color: #6f42c1; color: white; border-color: #6f42c1;">
                        <i class="bi bi-tools"></i> सीप र अनुभव
                    </button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" style="background-color: #ffc107; color: black; border-color: #ffc107;">
                        <i class="bi bi-file-earmark"></i> कागजातहरू
                    </button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview" type="button" role="tab" style="background-color: #6c757d; color: white; border-color: #6c757d;">
                        <i class="bi bi-eye"></i> फाइलको पूर्वावलोकन
                    </button>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="formTabContent">
                
                <!-- Personal Details Tab - Read Only -->
                <div class="tab-pane fade show active" id="personal" role="tabpanel">
                    <h4 class="mb-3 fw-bold">व्यक्तिगत विवरण <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                    @if($profile)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>फोटो</th>
                                                <th>नाम (English)</th>
                                                <th>नाम (नेपाली)</th>
                                                <th>जन्म मिति (बि.सं.)</th>
                                                <th>जन्म मिति (AD)</th>
                                                <th>नागरिकता नं.</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($profile->passport_photo)
                                                        <img src="{{ asset('files/' . $profile->passport_photo) }}" 
                                                             alt="Profile Photo" 
                                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                                    @else
                                                        <div style="width: 60px; height: 60px; background-color: #e0e0e0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bi bi-person" style="font-size: 24px; color: #999;"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $profile->full_name_en ?? '' }}</td>
                                                <td>{{ $profile->full_name_np ?? '' }}</td>
                                                <td>{{ $profile->dob_bs ?? '' }}</td>
                                                <td>{{ $profile->dob_ad ?? '' }}</td>
                                                <td>{{ $profile->citizenship_no ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Personal Details -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">सम्पर्क नं.</label>
                                <input type="text" class="form-control" value="{{ $profile->mobile_number ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">इमेल</label>
                                <input type="email" class="form-control" value="{{ $profile->email ?? $user->email }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">लिङ्ग</label>
                                <input type="text" class="form-control" value="{{ $profile->gender == 'male' ? 'पुरुष' : ($profile->gender == 'female' ? 'महिला' : 'अन्य') }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">रक्त समूह</label>
                                <input type="text" class="form-control" value="{{ $profile->blood_group ?? '' }}" readonly>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">प्रोफाइल डाटा छैन। कृपया प्रोफाइल सम्पादन गर्नुहोस्।</div>
                    @endif
                </div>

                <!-- Address Details - Read Only -->
                <div class="tab-pane fade" id="address" role="tabpanel">
                    <h4 class="mb-3 fw-bold">ठेगाना विवरण <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                    @if($profile)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>प्रदेश</th>
                                                <th>जिल्ला</th>
                                                <th>गाउँपालिका/नगरपालिका</th>
                                                <th>वडा नं.</th>
                                                <th>टोल/घर नं.</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $profile->permanentProvince->name ?? '' }}</td>
                                                <td>{{ $profile->permanentDistrict->name ?? '' }}</td>
                                                <td>{{ $profile->permanentMunicipality->name ?? '' }}</td>
                                                <td>{{ $profile->permanent_ward_id ?? '' }}</td>
                                                <td>{{ $profile->permanent_tole ?? '' }} / {{ $profile->permanent_house_no ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">ठेगाना डाटा छैन।</div>
                    @endif
                </div>

                <!-- Education Details - Read Only -->
                <div class="tab-pane fade" id="education" role="tabpanel">
                    <h4 class="mb-3 fw-bold">शिक्षा <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                    @if($education && $education->count() > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>शिक्षा स्तर</th>
                                                <th>संकाय/प्रवाह</th>
                                                <th>संस्था</th>
                                                <th>उत्तीर्ण वर्ष</th>
                                                <th>GPA/प्रतिशत</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($education as $edu)
                                                <tr>
                                                    <td>{{ $edu->educationLevel->name_np ?? '' }}</td>
                                                    <td>{{ $edu->faculty_stream ?? '' }}</td>
                                                    <td>{{ $edu->institution_name ?? '' }}</td>
                                                    <td>{{ $edu->passed_year ?? '' }}</td>
                                                    <td>{{ $edu->gpa_percentage ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                            <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">कुनै शैक्षिक विवरण छैन।</div>
                    @endif
                </div>

                <!-- Experience Details - Read Only -->
                <div class="tab-pane fade" id="experience" role="tabpanel">
                    <h4 class="mb-3 fw-bold">सीप र अनुभव <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                    @if($experience && $experience->count() > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>संस्था</th>
                                                <th>पद</th>
                                                <th>सुरु मिति</th>
                                                <th>अन्त्य मिति</th>
                                                <th>प्रकार</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($experience as $exp)
                                                <tr>
                                                    <td>{{ $exp->organization_name ?? '' }}</td>
                                                    <td>{{ $exp->position ?? '' }}</td>
                                                    <td>{{ $exp->from_date ?? '' }}</td>
                                                    <td>{{ $exp->to_date ?? '' }}</td>
                                                    <td>{{ $exp->experience_type ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                            <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">कुनै अनुभव छैन।</div>
                    @endif
                </div>

                <!-- Documents Preview - Read Only -->
                <div class="tab-pane fade" id="documents" role="tabpanel">
                    <h4 class="mb-3 fw-bold">कागजातहरू <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                    @if($documents)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>कागजात प्रकार</th>
                                                <th>स्थिति</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>नागरिकता अगाडि</td>
                                                <td>
                                                    @if($documents->citizenship_front)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($documents->citizenship_front)
                                                        <a href="{{ asset('files/' . $documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>नागरिकता पछाडि</td>
                                                <td>
                                                    @if($documents->citizenship_back)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($documents->citizenship_back)
                                                        <a href="{{ asset('files/' . $documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>पासपोर्ट साइज फोटो</td>
                                                <td>
                                                    @if($documents->passport_size_photo)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($documents->passport_size_photo)
                                                        <a href="{{ asset('files/' . $documents->passport_size_photo) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>शैक्षिक प्रमाणपत्र</td>
                                                <td>
                                                    @if($documents->academic_certificates)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($documents->academic_certificates)
                                                        <a href="{{ asset('files/' . $documents->academic_certificates) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('trainee.profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस् / Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">कागजात डाटा छैन।</div>
                    @endif
                </div>

                <!-- File Preview Tab -->
                <div class="tab-pane fade" id="preview" role="tabpanel">
                    <h4 class="mb-3 fw-bold">फाइलको पूर्वावलोकन <small class="text-muted">(पूर्ण फाइल हेर्नुहोस्)</small></h4>
                    
                    @if($profile)
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="bi bi-person"></i> व्यक्तिगत विवरण</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center mb-3">
                                        @if($profile->passport_photo)
                                            <img src="{{ asset('files/' . $profile->passport_photo) }}" alt="Profile Photo" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #007bff;">
                                        @else
                                            <div style="width: 150px; height: 150px; background-color: #e0e0e0; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 3px solid #007bff;">
                                                <i class="bi bi-person" style="font-size: 60px; color: #999;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>नाम (English)</th>
                                                <td>{{ $profile->full_name_en ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>नाम (नेपाली)</th>
                                                <td>{{ $profile->full_name_np ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>जन्म मिति (बि.सं.)</th>
                                                <td>{{ $profile->dob_bs ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>जन्म मिति (AD)</th>
                                                <td>{{ $profile->dob_ad ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>नागरिकता नं.</th>
                                                <td>{{ $profile->citizenship_no ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>सम्पर्क नं.</th>
                                                <td>{{ $profile->mobile_number ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>इमेल</th>
                                                <td>{{ $profile->email ?? auth()->user()->email }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="bi bi-geo-alt"></i> ठेगाना विवरण</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>प्रदेश</th>
                                        <td>{{ $profile->permanentProvince->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>जिल्ला</th>
                                        <td>{{ $profile->permanentDistrict->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>गाउँपालिका/नगरपालिका</th>
                                        <td>{{ $profile->permanentMunicipality->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>वडा नं.</th>
                                        <td>{{ $profile->permanent_ward_id ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>टोल/घर नं.</th>
                                        <td>{{ $profile->permanent_tole ?? '' }} / {{ $profile->permanent_house_no ?? '' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        @if($profile->education && $profile->education->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="bi bi-book"></i> शिक्षा</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>शिक्षा स्तर</th>
                                            <th>संकाय/प्रवाह</th>
                                            <th>संस्था</th>
                                            <th>उत्तीर्ण वर्ष</th>
                                            <th>GPA/प्रतिशत</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($profile->education as $edu)
                                            <tr>
                                                <td>{{ $edu->educationLevel->name_np ?? '' }}</td>
                                                <td>{{ $edu->faculty_stream ?? '' }}</td>
                                                <td>{{ $edu->institution_name ?? '' }}</td>
                                                <td>{{ $edu->passed_year ?? '' }}</td>
                                                <td>{{ $edu->gpa_percentage ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if($profile->experience && $profile->experience->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header bg-purple text-white" style="background-color: #6f42c1;">
                                <h5 class="mb-0"><i class="bi bi-tools"></i> सीप र अनुभव</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>संस्था</th>
                                            <th>पद</th>
                                            <th>सुरु मिति</th>
                                            <th>अन्त्य मिति</th>
                                            <th>प्रकार</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($profile->experience as $exp)
                                            <tr>
                                                <td>{{ $exp->organization_name ?? '' }}</td>
                                                <td>{{ $exp->position ?? '' }}</td>
                                                <td>{{ $exp->from_date ?? '' }}</td>
                                                <td>{{ $exp->to_date ?? '' }}</td>
                                                <td>{{ $exp->experience_type ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if($profile->documents)
                        <div class="card mb-4">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="mb-0"><i class="bi bi-file-earmark"></i> कागजातहरू</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>कागजात प्रकार</th>
                                            <th>स्थिति</th>
                                            <th>कार्य</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>नागरिकता अगाडि</td>
                                            <td>
                                                @if($profile->documents->citizenship_front)
                                                    <span class="badge bg-success">अपलोड गरिएको</span>
                                                @else
                                                    <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($profile->documents->citizenship_front)
                                                    <a href="{{ asset('files/' . $profile->documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>नागरिकता पछाडि</td>
                                            <td>
                                                @if($profile->documents->citizenship_back)
                                                    <span class="badge bg-success">अपलोड गरिएको</span>
                                                @else
                                                    <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($profile->documents->citizenship_back)
                                                    <a href="{{ asset('files/' . $profile->documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>पासपोर्ट साइज फोटो</td>
                                            <td>
                                                @if($profile->documents->passport_size_photo)
                                                    <span class="badge bg-success">अपलोड गरिएको</span>
                                                @else
                                                    <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($profile->documents->passport_size_photo)
                                                    <a href="{{ asset('files/' . $profile->documents->passport_size_photo) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>शैक्षिक प्रमाणपत्र</td>
                                            <td>
                                                @if($profile->documents->academic_certificates)
                                                    <span class="badge bg-success">अपलोड गरिएको</span>
                                                @else
                                                    <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($profile->documents->academic_certificates)
                                                    <a href="{{ asset('files/' . $profile->documents->academic_certificates) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="alert alert-warning">प्रोफाइल डाटा छैन। कृपया प्रोफाइल सम्पादन गर्नुहोस्।</div>
                    @endif
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" @if(!$profile) disabled @endif>
                    <i class="bi bi-send"></i> {{ isset($application) ? 'अपडेट गर्नुहोस्' : 'आवेदन पठाउनुहोस्' }}
                </button>
                <a href="{{ route('trainee.training.index') }}" class="btn btn-outline">
                    <i class="bi bi-x-circle"></i> रद्द गर्नुहोस्
                </a>
            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">
                        <i class="bi bi-question-circle"></i> पुष्टि गर्नुहोस्
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">के तपाईं साँच्चै यो तालिमको लागि आवेदन गर्न चाहनुहुन्छ?</p>
                    <p class="text-muted small mt-2">एक पटक आवेदन पठाएपछि तपाईं यो आवेदन परिवर्तन गर्न सक्नुहुन्न।</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> रद्द गर्नुहोस्
                    </button>
                    <button type="button" class="btn btn-success" id="confirmSubmitBtn">
                        <i class="bi bi-check-circle"></i> हो, आवेदन गर्नुहोस्
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.querySelector('form button[type="submit"]');
            const confirmModal = document.getElementById('confirmModal');
            const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
            let confirmed = false;
            
            // When main submit button is clicked, show modal
            submitBtn.addEventListener('click', function(e) {
                if (!confirmed) {
                    e.preventDefault();
                    const modal = new bootstrap.Modal(confirmModal);
                    modal.show();
                }
            });
            
            // When confirm button is clicked, submit the form
            confirmSubmitBtn.addEventListener('click', function() {
                confirmed = true;
                const modal = bootstrap.Modal.getInstance(confirmModal);
                modal.hide();
                
                // Submit the form
                submitBtn.click();
            });
        });
    </script>
@endsection
