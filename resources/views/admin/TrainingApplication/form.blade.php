@extends('admin.includes.main')
@section('head')
    <style>
        .nav-tabs {
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            padding: 8px 12px 0 12px;
            border-radius: 6px 6px 0 0;
        }

        .nav-tabs .nav-link {
            color: #495057;
            text-align: center;
            font-weight: 500;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-bottom: none;
            border-radius: 6px 6px 0 0;
            background: transparent;
            transition: all 0.3s;
            font-size: 0.85rem;
        }

        .nav-tabs .nav-link:hover {
            color: #0f61f0;
            background: #e9ecef;
        }

        .nav-tabs .nav-link.active {
            color: #0f61f0;
            background: white;
            border-color: #e9ecef #e9ecef white;
            font-weight: 600;
        }

        .tab-number {
            display: inline-block;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            background: #e9ecef;
            border-radius: 50%;
            margin-right: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #495057;
            transition: all 0.3s;
        }

        .nav-tabs .nav-link.active .tab-number {
            background: #0f61f0;
            color: white;
        }

        .tab-content {
            background: white;
            border: 1px solid #e9ecef;
            border-top: none;
            border-radius: 0 0 6px 6px;
            padding: 15px;
        }

        .review-item {
            margin-bottom: 0.3rem;
            padding: 6px;
            background: #f8f9fa;
            border-radius: 4px;
        }

        .review-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.15rem;
            font-size: 0.8rem;
        }

        .review-value {
            color: #6c757d;
            font-size: 0.8rem;
        }

        .invalid-feedback {
            display: block;
            font-weight: 500;
            margin-top: 0.2rem;
            font-size: 0.75rem;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.25rem;
            font-size: 0.8rem;
        }

        .card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            padding: 12px 15px;
        }

        .card-header h3 {
            font-size: 0.95rem;
        }

        .card-header small {
            font-size: 0.65rem;
        }

        .card-title {
            font-size: 0.75rem !important;
        }

        .next-tab, .prev-tab {
            background: linear-gradient(135deg, #0f61f0 0%, #3b82f6 100%);
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.85rem;
        }

        .prev-tab {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        }

        .next-tab:hover, .prev-tab:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(15, 97, 240, 0.3);
        }

        .tab-pane {
            animation: fadeIn 0.2s ease-in-out;
        }

        .tab-pane h4 {
            font-size: 0.95rem;
            margin-bottom: 0.6rem;
        }

        .row {
            margin-bottom: 0.5rem !important;
        }

        .mb-3, .mb-4 {
            margin-bottom: 0.5rem !important;
        }

        .g-3 {
            gap: 0.5rem !important;
        }

        .tab-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e9ecef;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            max-width: 1400px;
        }

        .form-control, .form-select {
            font-size: 0.85rem;
            padding: 0.4rem 0.6rem;
        }

        .col-md-4, .col-md-3, .col-md-2 {
            padding-left: 0.4rem;
            padding-right: 0.4rem;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/css/select2.css') }}">
@endsection
@section('content')
    <div class="container py-4">
        <div class="card mb-3">
            <div class="card-header bg-white pt-3">
                <h3 class="fw-bold">तालिम आवेदन फारम</h3>
            </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-0">

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
                    
                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel">
                        <h4 class="mb-3 fw-bold">व्यक्तिगत विवरण <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                        @if($application && $application->user && $application->user->profile)
                            @php
                                $profile = $application->user->profile;
                            @endphp
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
                                    <input type="email" class="form-control" value="{{ $profile->email ?? $application->user->email }}" readonly>
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
                            <div class="alert alert-warning">प्रोफाइल डाटा छैन।</div>
                        @endif
                    </div>

                    <!-- Address Details Tab -->
                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <h4 class="mb-3 fw-bold">ठेगाना विवरण <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                        @if($application && $application->user && $application->user->profile)
                            @php
                                $profile = $application->user->profile;
                            @endphp
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $profile->permanentProvince->name ?? '' }}</td>
                                                    <td>{{ $profile->permanentDistrict->name ?? '' }}</td>
                                                    <td>{{ $profile->permanentMunicipality->name ?? '' }}</td>
                                                    <td>{{ $profile->permanent_ward_id ?? '' }}</td>
                                                    <td>{{ $profile->permanent_tole ?? '' }} / {{ $profile->permanent_house_no ?? '' }}</td>
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

                    <!-- Education Details Tab -->
                    <div class="tab-pane fade" id="education" role="tabpanel">
                        <h4 class="mb-3 fw-bold">शिक्षा <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                        @if($application && $application->educationDetails && $application->educationDetails->count() > 0)
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($application->educationDetails as $edu)
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
                            </div>
                        @else
                            <div class="alert alert-info">कुनै शैक्षिक विवरण छैन।</div>
                        @endif
                    </div>

                    <!-- Experience Details Tab -->
                    <div class="tab-pane fade" id="experience" role="tabpanel">
                        <h4 class="mb-3 fw-bold">सीप र अनुभव <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                        @if($application && $application->experienceDetails && $application->experienceDetails->count() > 0)
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($application->experienceDetails as $exp)
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
                            </div>
                        @else
                            <div class="alert alert-info">कुनै अनुभव छैन।</div>
                        @endif
                    </div>

                    <!-- Documents Tab -->
                    <div class="tab-pane fade" id="documents" role="tabpanel">
                        <h4 class="mb-3 fw-bold">कागजातहरू <small class="text-muted">(प्रोफाइलबाट)</small></h4>
                        @if($application && $application->user && $application->user->documents)
                            @php
                                $documents = $application->user->documents;
                            @endphp
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
                                                            <a href="{{ asset('files/' . $documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                                            </a>
                                                        @endif
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
                                                            <a href="{{ asset('files/' . $documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                                            </a>
                                                        @endif
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
                                                            <a href="{{ asset('files/' . $documents->passport_size_photo) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                                            </a>
                                                        @endif
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
                                                            <a href="{{ asset('files/' . $documents->academic_certificates) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                                            </a>
                                                        @endif
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
                        
                        @if($application && $application->user && $application->user->profile)
                            @php
                                $profile = $application->user->profile;
                            @endphp
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
                                                    <td>{{ $profile->email ?? $application->user->email }}</td>
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

                            @if($application->educationDetails && $application->educationDetails->count() > 0)
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
                                            @foreach($application->educationDetails as $edu)
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

                            @if($application->experienceDetails && $application->experienceDetails->count() > 0)
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
                                            @foreach($application->experienceDetails as $exp)
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

                            @if($application->user->documents)
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
                                                    @if($application->user->documents->citizenship_front)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($application->user->documents->citizenship_front)
                                                        <a href="{{ asset('files/' . $application->user->documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>नागरिकता पछाडि</td>
                                                <td>
                                                    @if($application->user->documents->citizenship_back)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($application->user->documents->citizenship_back)
                                                        <a href="{{ asset('files/' . $application->user->documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>पासपोर्ट साइज फोटो</td>
                                                <td>
                                                    @if($application->user->documents->passport_size_photo)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($application->user->documents->passport_size_photo)
                                                        <a href="{{ asset('files/' . $application->user->documents->passport_size_photo) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>शैक्षिक प्रमाणपत्र</td>
                                                <td>
                                                    @if($application->user->documents->academic_certificates)
                                                        <span class="badge bg-success">अपलोड गरिएको</span>
                                                    @else
                                                        <span class="badge bg-secondary">अपलोड गरिएको छैन</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($application->user->documents->academic_certificates)
                                                        <a href="{{ asset('files/' . $application->user->documents->academic_certificates) }}" target="_blank" class="btn btn-outline-primary btn-sm">
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
                            <div class="alert alert-warning">प्रोफाइल डाटा छैन।</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
