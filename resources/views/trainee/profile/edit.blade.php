@extends('trainee.includes.main')
@section('title', 'मेरो प्रोफाइल')
@section('head')
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/v5/nepali.datepicker/css/nepali.datepicker.v5.0.6.min.css" rel="stylesheet" type="text/css"/>
    <style>
        /* No modal CSS needed anymore */
    </style>
@endsection
@section('page-title')
    मेरो प्रोफाइल
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-person"></i>
                मेरो प्रोफाइल
            </h2>
        </div>

        <!-- Profile Completion Progress Bar -->
        @php
            $profileCompletion = Auth::user()->profile_completion ?? 0;
        @endphp

        <div class="mb-4">
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
            <div class="mt-2">
                @if($profileCompletion >= 100)
                    <span class="badge bg-success">
                        <i class="bi bi-check-circle-fill"></i> प्रोफाइल पूरा भयो
                    </span>
                @else
                    <span class="badge bg-warning">
                        <i class="bi bi-exclamation-circle-fill"></i> प्रोफाइल अपूर्ण - कृपया पूरा गर्नुहोस्
                    </span>
                @endif
            </div>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist" style="border-bottom: none;">
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
                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" style="background-color: #ffc107; color: black; border-color: #ffc107;">
                    <i class="bi bi-file-earmark"></i> कागजातहरू
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab" style="background-color: #6f42c1; color: white; border-color: #6f42c1;">
                    <i class="bi bi-tools"></i> सीप र अनुभव
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview" type="button" role="tab" style="background-color: #dc3545; color: white; border-color: #dc3545;">
                    <i class="bi bi-eye"></i> फाइल पूर्वावलोकन
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="profileTabsContent">
            <!-- Tab 1: Personal Information -->
            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                <h5 class="mb-3 fw-bold">व्यक्तिगत विवरण</h5>
                
                <!-- Personal Information Display -->
                @if(Auth::user()->profile && Auth::user()->profile->full_name_en)
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
                                                @if(Auth::user()->profile->passport_photo)
                                                    <img src="{{ asset('storage/' . Auth::user()->profile->passport_photo) }}" 
                                                         alt="Profile Photo" 
                                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                                @else
                                                    <div style="width: 60px; height: 60px; background-color: #e0e0e0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                        <i class="bi bi-person" style="font-size: 24px; color: #999;"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ Auth::user()->profile->full_name_en }}</td>
                                            <td>{{ Auth::user()->profile->full_name_np }}</td>
                                            <td>{{ Auth::user()->profile->dob_bs }}</td>
                                            <td>{{ Auth::user()->profile->dob_ad }}</td>
                                            <td>{{ Auth::user()->profile->citizenship_no }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="showPersonalForm()">
                                                    <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस्
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2 mb-4">
                        <button type="button" class="btn btn-outline-primary" onclick="nextTab('address')">
                            <i class="bi bi-arrow-right"></i> अर्को
                        </button>
                    </div>
                @else
                    <div class="alert alert-info mb-4">कुनै व्यक्तिगत विवरण छैन। नयाँ थप्नुहोस्।</div>
                @endif

                <!-- Personal Information Form -->
                <div id="personalForm" style="{{ Auth::user()->profile && Auth::user()->profile->full_name_en ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('trainee.profile.personal.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <h5 class="mb-3 fw-bold">व्यक्तिगत विवरण</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="full_name_en" class="form-label">पूरा नाम (English) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name_en" name="full_name_en" 
                                   value="{{ Auth::user()->profile->full_name_en ?? Auth::user()->name ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="full_name_np" class="form-label">पूरा नाम (नेपाली) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name_np" name="full_name_np" 
                                   value="{{ Auth::user()->profile->full_name_np ?? Auth::user()->name_np ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">लिङ्ग <span class="text-danger">*</span></label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">--कृपया छान्नुहोस्--</option>
                                <option value="male" {{ (Auth::user()->profile->gender ?? Auth::user()->gender ?? '') == 'male' ? 'selected' : '' }}>पुरुष</option>
                                <option value="female" {{ (Auth::user()->profile->gender ?? Auth::user()->gender ?? '') == 'female' ? 'selected' : '' }}>महिला</option>
                                <option value="other" {{ (Auth::user()->profile->gender ?? Auth::user()->gender ?? '') == 'other' ? 'selected' : '' }}>अन्य</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dob_bs" class="form-label">जन्म मिति (बि.सं.) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="dob_bs" name="dob_bs" 
                                   value="{{ Auth::user()->profile->dob_bs ?? Auth::user()->dob_bs ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob_ad" class="form-label">जन्म मिति (AD) <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob_ad" name="dob_ad" 
                                   value="{{ Auth::user()->profile->dob_ad ?? Auth::user()->dob_ad ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="citizenship_no" class="form-label">नागरिकता नं. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="citizenship_no" name="citizenship_no" 
                                   value="{{ Auth::user()->profile->citizenship_no ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="national_id_no" class="form-label">राष्ट्रिय ID नं. (Optional)</label>
                            <input type="text" class="form-control" id="national_id_no" name="national_id_no" 
                                   value="{{ Auth::user()->profile->national_id_no ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="passport_no" class="form-label">पासपोर्ट नं. (Optional)</label>
                            <input type="text" class="form-control" id="passport_no" name="passport_no" 
                                   value="{{ Auth::user()->profile->passport_no ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status" class="form-label">वैवाहिक स्थिति</label>
                            <select class="form-control" id="marital_status" name="marital_status">
                                <option value="">--कृपया छान्नुहोस्--</option>
                                <option value="single" {{ (Auth::user()->profile->marital_status ?? '') == 'single' ? 'selected' : '' }}>अविवाहित</option>
                                <option value="married" {{ (Auth::user()->profile->marital_status ?? '') == 'married' ? 'selected' : '' }}>विवाहित</option>
                                <option value="divorced" {{ (Auth::user()->profile->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>सम्बन्ध विच्छेद</option>
                                <option value="widowed" {{ (Auth::user()->profile->marital_status ?? '') == 'widowed' ? 'selected' : '' }}>विधवा/विधुर</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="blood_group" class="form-label">रगत समूह</label>
                            <select class="form-control" id="blood_group" name="blood_group">
                                <option value="">--कृपया छान्नुहोस्--</option>
                                <option value="A+" {{ (Auth::user()->profile->blood_group ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ (Auth::user()->profile->blood_group ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ (Auth::user()->profile->blood_group ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ (Auth::user()->profile->blood_group ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ (Auth::user()->profile->blood_group ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ (Auth::user()->profile->blood_group ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ (Auth::user()->profile->blood_group ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ (Auth::user()->profile->blood_group ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile_number" class="form-label">मोबाइल नं. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" 
                                   value="{{ Auth::user()->profile->mobile_number ?? Auth::user()->contact_no ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="alternative_mobile" class="form-label">वैकल्पिक मोबाइल नं.</label>
                            <input type="text" class="form-control" id="alternative_mobile" name="alternative_mobile" 
                                   value="{{ Auth::user()->profile->alternative_mobile ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">इमेल <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ Auth::user()->profile->email ?? Auth::user()->email }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="father_name" class="form-label">पिताको नाम <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="father_name" name="father_name" 
                                   value="{{ Auth::user()->profile->father_name ?? Auth::user()->father_name ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mother_name" class="form-label">माताको नाम <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" 
                                   value="{{ Auth::user()->profile->mother_name ?? Auth::user()->mother_name ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="grandfather_name" class="form-label">हजुरबुको नाम <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="grandfather_name" name="grandfather_name" 
                                   value="{{ Auth::user()->profile->grandfather_name ?? Auth::user()->grandfather_name ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="spouse_name" class="form-label">जीवनसाथीको नाम (Optional)</label>
                            <input type="text" class="form-control" id="spouse_name" name="spouse_name" 
                                   value="{{ Auth::user()->profile->spouse_name ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="passport_photo" class="form-label">पासपोर्ट साइज फोटो <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="passport_photo" name="passport_photo" accept="image/*">
                            @if(Auth::user()->profile && Auth::user()->profile->passport_photo)
                                <a href="{{ asset('storage/' . Auth::user()->profile->passport_photo) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                        <button type="submit" name="next_tab" value="address" class="btn btn-outline-primary">सुरक्षित गर्नुहोस् र अर्को</button>
                    </div>
                    </form>
                </div>
            </div>

            <!-- Tab 2: Address Information -->
            <div class="tab-pane fade" id="address" role="tabpanel">
                <h5 class="mb-3 fw-bold">स्थायी ठेगाना</h5>
                
                <!-- Permanent Address Display -->
                @if(Auth::user()->profile && Auth::user()->profile->permanent_province_id)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>प्रदेश</th>
                                            <th>जिल्ला</th>
                                            <th>नगरपालिका/गाउँपालिका</th>
                                            <th>वडा नं.</th>
                                            <th>टोल</th>
                                            <th>घर नं.</th>
                                            <th>कार्य</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Auth::user()->profile->province->name ?? 'N/A' }}</td>
                                            <td>{{ Auth::user()->profile->district->name ?? 'N/A' }}</td>
                                            <td>{{ Auth::user()->profile->municipality->name ?? 'N/A' }}</td>
                                            <td>{{ Auth::user()->profile->permanent_ward_id ?? 'N/A' }}</td>
                                            <td>{{ Auth::user()->profile->permanent_tole ?? 'N/A' }}</td>
                                            <td>{{ Auth::user()->profile->permanent_house_no ?? 'N/A' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="showAddressForm()">
                                                    <i class="bi bi-pencil"></i> सम्पादन गर्नुहोस्
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2 mb-4">
                        <button type="button" class="btn btn-primary" onclick="prevTab('personal')">
                            <i class="bi bi-arrow-left"></i> अघि
                        </button>
                        <button type="button" class="btn btn-outline-primary" onclick="nextTab('education')">
                            <i class="bi bi-arrow-right"></i> अर्को
                        </button>
                    </div>
                @else
                    <div class="alert alert-info mb-4">कुनै ठेगाना विवरण छैन। नयाँ थप्नुहोस्।</div>
                @endif

                <!-- Address Form -->
                <div id="addressForm" style="{{ Auth::user()->profile && Auth::user()->profile->permanent_province_id ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('trainee.profile.address.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <h6 class="mb-3">स्थायी ठेगाना</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="permanent_province_id" class="form-label">प्रदेश <span class="text-danger">*</span></label>
                                <select class="form-control" id="permanent_province_id" name="permanent_province_id" required onchange="loadDistricts('permanent')">
                                    <option value="">--कृपया छान्नुहोस्--</option>
                                    @foreach(\App\Models\Province::all() as $province)
                                        <option value="{{ $province->id }}" {{ (Auth::user()->profile->permanent_province_id ?? '') == $province->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="permanent_district_id" class="form-label">जिल्ला <span class="text-danger">*</span></label>
                                <select class="form-control" id="permanent_district_id" name="permanent_district_id" required onchange="loadMunicipalities('permanent')">
                                    <option value="">--कृपया छान्नुहोस्--</option>
                                    @if(Auth::user()->profile && Auth::user()->profile->permanent_district_id)
                                        @foreach(\App\Models\District::where('province_id', Auth::user()->profile->permanent_province_id)->get() as $district)
                                            <option value="{{ $district->id }}" {{ (Auth::user()->profile->permanent_district_id ?? '') == $district->id ? 'selected' : '' }}>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="permanent_municipality_id" class="form-label">नगरपालिका/गाउँपालिका <span class="text-danger">*</span></label>
                                <select class="form-control" id="permanent_municipality_id" name="permanent_municipality_id" required>
                                    <option value="">--कृपया छान्नुहोस्--</option>
                                    @if(Auth::user()->profile && Auth::user()->profile->permanent_municipality_id)
                                        @foreach(\App\Models\SthaniyaTaha::where('district_id', Auth::user()->profile->permanent_district_id)->get() as $area)
                                            <option value="{{ $area->id }}" {{ (Auth::user()->profile->permanent_municipality_id ?? '') == $area->id ? 'selected' : '' }}>
                                                {{ $area->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="permanent_ward_id" class="form-label">वडा नं. <span class="text-danger">*</span></label>
                                <select class="form-control" id="permanent_ward_id" name="permanent_ward_id" required>
                                    <option value="">--कृपया छान्नुहोस्--</option>
                                    @for($i=1; $i<=20; $i++)
                                        <option value="{{ $i }}" {{ (Auth::user()->profile->permanent_ward_id ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="permanent_tole" class="form-label">टोल</label>
                                <input type="text" class="form-control" id="permanent_tole" name="permanent_tole" 
                                       value="{{ Auth::user()->profile->permanent_tole ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label for="permanent_house_no" class="form-label">घर नं.</label>
                                <input type="text" class="form-control" id="permanent_house_no" name="permanent_house_no" 
                                       value="{{ Auth::user()->profile->permanent_house_no ?? '' }}">
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="temp_same_as_permanent" name="temp_same_as_permanent" 
                                   {{ (Auth::user()->profile->temp_same_as_permanent ?? false) ? 'checked' : '' }}
                                   onchange="toggleTemporaryAddress(this)">
                            <label class="form-check-label" for="temp_same_as_permanent">
                                अस्थायी ठेगाना स्थायी ठेगाना जस्तै छ
                            </label>
                        </div>

                        <div id="temporaryAddressSection" style="{{ (Auth::user()->profile->temp_same_as_permanent ?? false) ? 'display:none;' : '' }}">
                            <h6 class="mb-3">अस्थायी ठेगाना</h6>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="temp_province_id" class="form-label">प्रदेश</label>
                                    <select class="form-control" id="temp_province_id" name="temp_province_id" onchange="loadDistricts('temp')">
                                        <option value="">--कृपया छान्नुहोस्--</option>
                                        @foreach(\App\Models\Province::all() as $province)
                                            <option value="{{ $province->id }}" {{ (Auth::user()->profile->temp_province_id ?? '') == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="temp_district_id" class="form-label">जिल्ला</label>
                                    <select class="form-control" id="temp_district_id" name="temp_district_id" onchange="loadMunicipalities('temp')">
                                        <option value="">--कृपया छान्नुहोस्--</option>
                                        @if(Auth::user()->profile && Auth::user()->profile->temp_district_id)
                                            @foreach(\App\Models\District::where('province_id', Auth::user()->profile->temp_province_id)->get() as $district)
                                                <option value="{{ $district->id }}" {{ (Auth::user()->profile->temp_district_id ?? '') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="temp_municipality_id" class="form-label">नगरपालिका/गाउँपालिका</label>
                                    <select class="form-control" id="temp_municipality_id" name="temp_municipality_id">
                                        <option value="">--कृपया छान्नुहोस्--</option>
                                        @if(Auth::user()->profile && Auth::user()->profile->temp_municipality_id)
                                            @foreach(\App\Models\SthaniyaTaha::where('district_id', Auth::user()->profile->temp_district_id)->get() as $area)
                                                <option value="{{ $area->id }}" {{ (Auth::user()->profile->temp_municipality_id ?? '') == $area->id ? 'selected' : '' }}>
                                                    {{ $area->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="temp_ward_id" class="form-label">वडा नं.</label>
                                    <select class="form-control" id="temp_ward_id" name="temp_ward_id">
                                        <option value="">--कृपया छान्नुहोस्--</option>
                                        @for($i=1; $i<=20; $i++)
                                            <option value="{{ $i }}" {{ (Auth::user()->profile->temp_ward_id ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="temp_tole" class="form-label">टोल</label>
                                    <input type="text" class="form-control" id="temp_tole" name="temp_tole" 
                                           value="{{ Auth::user()->profile->temp_tole ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="temp_house_no" class="form-label">घर नं.</label>
                                    <input type="text" class="form-control" id="temp_house_no" name="temp_house_no" 
                                           value="{{ Auth::user()->profile->temp_house_no ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                            <button type="submit" name="next_tab" value="education" class="btn btn-outline-primary">सुरक्षित गर्नुहोस् र अर्को</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tab 3: Education -->
            <div class="tab-pane fade" id="education" role="tabpanel">
                <h5 class="mb-3 fw-bold">शिक्षा</h5>
                
                <!-- Education List View -->
                @if(Auth::user()->education()->count() > 0)
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>शिक्षा स्तर</th>
                                    <th>विषय/स्ट्रिम</th>
                                    <th>बोर्ड/विश्वविद्यालय</th>
                                    <th>संस्थाको नाम</th>
                                    <th>उत्तीर्ण वर्ष</th>
                                    <th>GPA/प्रतिशत</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->education as $edu)
                                    <tr>
                                        <td>{{ $edu->educationLevel->name_np ?? 'N/A' }}</td>
                                        <td>{{ $edu->faculty_stream ?? 'N/A' }}</td>
                                        <td>{{ $edu->board_university ?? 'N/A' }}</td>
                                        <td>{{ $edu->institution_name ?? 'N/A' }}</td>
                                        <td>{{ $edu->passed_year ?? 'N/A' }}</td>
                                        <td>{{ $edu->gpa_percentage ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                @if($edu->certificate_upload)
                                                    <a href="{{ asset('storage/' . $edu->certificate_upload) }}" target="_blank" class="btn btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                @endif
                                                <button type="button" class="btn btn-outline-warning" onclick="editEducation({{ $edu->id }})">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteEducation({{ $edu->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="button" class="btn btn-primary mb-3" onclick="addEducation()">
                        <i class="bi bi-plus"></i> नयाँ शिक्षा थप्नुहोस्
                    </button>
                @else
                    <div class="alert alert-info mb-4">कुनै शिक्षा विवरण छैन। नयाँ थप्नुहोस्।</div>
                @endif

                <!-- Education Form -->
                <div id="educationForm" style="{{ Auth::user()->education()->count() > 0 ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('trainee.profile.education.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" id="education_id" name="education_id" value="">
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">शिक्षा स्तर <span class="text-danger">*</span></label>
                                        <select class="form-control" name="education_level_id" required>
                                            <option value="">--कृपया छान्नुहोस्--</option>
                                            @foreach(\App\Models\EducationLevel::all() as $level)
                                                <option value="{{ $level->id }}">{{ $level->name_np }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">विषय/स्ट्रिम</label>
                                        <input type="text" class="form-control" name="faculty_stream">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">बोर्ड/विश्वविद्यालय</label>
                                        <input type="text" class="form-control" name="board_university">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">संस्थाको नाम</label>
                                        <input type="text" class="form-control" name="institution_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">उत्तीर्ण वर्ष</label>
                                        <input type="text" class="form-control" name="passed_year">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">GPA/प्रतिशत</label>
                                        <input type="text" class="form-control" name="gpa_percentage">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">प्रमाणपत्र अपलोड</label>
                                        <input type="file" class="form-control" name="certificate_upload">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                            <button type="submit" name="next_tab" value="documents" class="btn btn-outline-primary">सुरक्षित गर्नुहोस् र अर्को</button>
                        </div>
                    </form>
                </div>

                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-primary" onclick="prevTab('address')">
                        <i class="bi bi-arrow-left"></i> अघि
                    </button>
                    <button type="button" class="btn btn-outline-primary" onclick="nextTab('documents')">
                        <i class="bi bi-arrow-right"></i> अर्को
                    </button>
                </div>
            </div>

            <!-- Tab 4: Documents -->
            <div class="tab-pane fade" id="documents" role="tabpanel">
                <form method="POST" action="{{ route('trainee.profile.documents.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <h5 class="mb-3 fw-bold">कागजात अपलोड</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="citizenship_front" class="form-label">नागरिकता अगाडि <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="citizenship_front" name="citizenship_front" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->citizenship_front)
                                <a href="{{ asset('storage/' . Auth::user()->documents->citizenship_front) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="citizenship_back" class="form-label">नागरिकता पछाडि <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="citizenship_back" name="citizenship_back" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->citizenship_back)
                                <a href="{{ asset('storage/' . Auth::user()->documents->citizenship_back) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="passport_size_photo" class="form-label">पासपोर्ट साइज फोटो <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="passport_size_photo" name="passport_size_photo" accept="image/*">
                            @if(Auth::user()->documents && Auth::user()->documents->passport_size_photo)
                                <a href="{{ asset('storage/' . Auth::user()->documents->passport_size_photo) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="academic_certificates" class="form-label">शैक्षिक प्रमाणपत्रहरू <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="academic_certificates" name="academic_certificates" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->academic_certificates)
                                <a href="{{ asset('storage/' . Auth::user()->documents->academic_certificates) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="experience_certificate" class="form-label">अनुभव प्रमाणपत्र (Optional)</label>
                            <input type="file" class="form-control" id="experience_certificate" name="experience_certificate" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->experience_certificate)
                                <a href="{{ asset('storage/' . Auth::user()->documents->experience_certificate) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="recommendation_letter" class="form-label">सिफारिस पत्र (Optional)</label>
                            <input type="file" class="form-control" id="recommendation_letter" name="recommendation_letter" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->recommendation_letter)
                                <a href="{{ asset('storage/' . Auth::user()->documents->recommendation_letter) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="disability_card" class="form-label">अपाङ्गता कार्ड (Optional)</label>
                            <input type="file" class="form-control" id="disability_card" name="disability_card" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->disability_card)
                                <a href="{{ asset('storage/' . Auth::user()->documents->disability_card) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inclusion_certificate" class="form-label">समावेशन प्रमाणपत्र (Optional)</label>
                            <input type="file" class="form-control" id="inclusion_certificate" name="inclusion_certificate" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->inclusion_certificate)
                                <a href="{{ asset('storage/' . Auth::user()->documents->inclusion_certificate) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="other_documents" class="form-label">अन्य सहायक कागजातहरू (Optional)</label>
                            <input type="file" class="form-control" id="other_documents" name="other_documents" accept=".jpg,.png,.pdf">
                            @if(Auth::user()->documents && Auth::user()->documents->other_documents)
                                <a href="{{ asset('storage/' . Auth::user()->documents->other_documents) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                    <i class="bi bi-eye"></i> पूर्वलोकन
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                        <button type="submit" name="next_tab" value="skills" class="btn btn-outline-primary">सुरक्षित गर्नुहोस् र अर्को</button>
                    </div>
                </form>
            </div>

            <!-- Tab 5: Skills & Experience -->
            <div class="tab-pane fade" id="skills" role="tabpanel">
                <h5 class="mb-3 fw-bold">अनुभव</h5>
                
                <!-- Experience List View -->
                @if(Auth::user()->experience()->count() > 0)
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>संस्थाको नाम</th>
                                    <th>पद</th>
                                    <th>देखि मिति</th>
                                    <th>सम्म मिति</th>
                                    <th>अनुभव प्रकार</th>
                                    <th>विवरण</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->experience as $exp)
                                    <tr>
                                        <td>{{ $exp->organization_name ?? 'N/A' }}</td>
                                        <td>{{ $exp->position ?? 'N/A' }}</td>
                                        <td>{{ $exp->from_date ?? 'N/A' }}</td>
                                        <td>{{ $exp->to_date ?? 'N/A' }}</td>
                                        <td>{{ $exp->experience_type ?? 'N/A' }}</td>
                                        <td>{{ $exp->description ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-warning" onclick="editExperience({{ $exp->id }})">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteExperience({{ $exp->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="button" class="btn btn-primary mb-3" onclick="addExperience()">
                        <i class="bi bi-plus"></i> नयाँ अनुभव थप्नुहोस्
                    </button>
                @else
                    <div class="alert alert-info mb-4">कुनै अनुभव विवरण छैन। नयाँ थप्नुहोस्।</div>
                @endif

                <!-- Experience Form -->
                <div id="experienceForm" style="{{ Auth::user()->experience()->count() > 0 ? 'display:none;' : 'display:block;' }}">
                    <form method="POST" action="{{ route('trainee.profile.experience.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" id="experience_id" name="experience_id" value="">
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">संस्थाको नाम</label>
                                        <input type="text" class="form-control" name="organization_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">पद</label>
                                        <input type="text" class="form-control" name="position">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">देखि मिति</label>
                                        <input type="date" class="form-control" name="from_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">सम्म मिति</label>
                                        <input type="date" class="form-control" name="to_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">अनुभव प्रकार</label>
                                        <input type="text" class="form-control" name="experience_type">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">विवरण</label>
                                        <textarea class="form-control" name="description" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस्</button>
                        </div>
                    </form>
                </div>

                <h5 class="mb-3 fw-bold mt-4">सीपहरू</h5>
                
                <div class="mb-4">
                    <label class="form-label">सीपहरू छान्नुहोस् (बहु छनोट)</label>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Computer Basic" id="skill1" 
                                       {{ Auth::user()->skills()->where('skill_name', 'Computer Basic')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill1">Computer Basic</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="MS Office" id="skill2"
                                       {{ Auth::user()->skills()->where('skill_name', 'MS Office')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill2">MS Office</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Graphic Design" id="skill3"
                                       {{ Auth::user()->skills()->where('skill_name', 'Graphic Design')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill3">Graphic Design</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Accounting" id="skill4"
                                       {{ Auth::user()->skills()->where('skill_name', 'Accounting')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill4">Accounting</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Agriculture" id="skill5"
                                       {{ Auth::user()->skills()->where('skill_name', 'Agriculture')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill5">Agriculture</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Electrician" id="skill6"
                                       {{ Auth::user()->skills()->where('skill_name', 'Electrician')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill6">Electrician</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Plumbing" id="skill7"
                                       {{ Auth::user()->skills()->where('skill_name', 'Plumbing')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill7">Plumbing</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Tailoring" id="skill8"
                                       {{ Auth::user()->skills()->where('skill_name', 'Tailoring')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill8">Tailoring</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Driving" id="skill9"
                                       {{ Auth::user()->skills()->where('skill_name', 'Driving')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill9">Driving</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input skill-checkbox" type="checkbox" value="Communication" id="skill10"
                                       {{ Auth::user()->skills()->where('skill_name', 'Communication')->exists() ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill10">Communication</label>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('trainee.profile.skills.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <input type="hidden" name="skills" id="skillsInput" value="">
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary" onclick="collectSkills(event)">सुरक्षित गर्नुहोस्</button>
                    </div>
                </form>
            </div>

            <!-- Tab 6: Preview -->
            <div class="tab-pane fade" id="preview" role="tabpanel">
                @php
                    $user = Auth::user();
                    $profile = $user->profile;
                    $education = $user->education;
                    $documents = $user->documents;
                    $skills = $user->skills;
                    $experience = $user->experience;
                @endphp

                <div class="d-flex justify-content-between align-items-center mb-4 no-print">
                    <h5 class="mb-0 fw-bold">फाइल पूर्वावलोकन</h5>
                    <div class="d-flex gap-2">
                        <button onclick="window.print()" class="btn btn-outline-primary">
                            <i class="bi bi-printer"></i> प्रिन्ट गर्नुहोस्
                        </button>
                        <a href="{{ route('trainee.training.index') }}" class="btn btn-primary">
                            <i class="bi bi-file-earmark-plus"></i> तालिम आवेदन गर्नुहोस्
                        </a>
                    </div>
                </div>

                <!-- Profile Photo Section -->
                <div class="row mb-4">
                    <div class="col-md-3 text-center">
                        <div class="profile-photo-container">
                            @if($profile && $profile?->passport_photo)
                                <img src="{{ asset('storage/' . $profile?->passport_photo) }}" 
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
                        <h5 class="mt-2">{{ $profile?->full_name_np ?? $user->name }}</h5>
                        <p class="text-muted">{{ $profile?->mobile_number ?? $user->email }}</p>
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
                            <p class="form-control-plaintext">{{ $profile?->full_name_en ?? $user->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">नाम (नेपाली)</label>
                            <p class="form-control-plaintext">{{ $profile?->full_name_np ?? $user->name_np ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">लिङ्ग</label>
                            <p class="form-control-plaintext">
                                {{ $user->gender == 'male' ? 'पुरुष' : ($user->gender == 'female' ? 'महिला' : 'अन्य') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">जन्म मिति (बि.सं.)</label>
                            <p class="form-control-plaintext">{{ $user->dob_bs ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">जन्म मिति (AD)</label>
                            <p class="form-control-plaintext">{{ $user->dob_ad ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">नागरिकता नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->citizenship_no ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">राष्ट्रिय ID नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->national_id_no ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">पासपोर्ट नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->passport_no ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">वैवाहिक स्थिति</label>
                            <p class="form-control-plaintext">
                                {{ $profile?->marital_status == 'single' ? 'अविवाहित' : 
                                   ($profile?->marital_status == 'married' ? 'विवाहित' : 
                                   ($profile?->marital_status == 'divorced' ? 'सम्बन्ध विच्छेद' : 
                                   ($profile?->marital_status == 'widowed' ? 'विधवा/विधुर' : 'N/A'))) }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">रक्त समूह</label>
                            <p class="form-control-plaintext">{{ $profile?->blood_group ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">मोबाइल नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->mobile_number ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">वैकल्पिक मोबाइल नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->alternative_mobile ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">इमेल</label>
                            <p class="form-control-plaintext">{{ $profile?->email ?? $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">पिताको नाम</label>
                            <p class="form-control-plaintext">{{ $profile?->father_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">माताको नाम</label>
                            <p class="form-control-plaintext">{{ $profile?->mother_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">हजुरबुको नाम</label>
                            <p class="form-control-plaintext">{{ $profile?->grandfather_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">जीवनसाथीको नाम</label>
                            <p class="form-control-plaintext">{{ $profile?->spouse_name ?? 'N/A' }}</p>
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
                            <p class="form-control-plaintext">{{ $profile?->permanentProvince->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">जिल्ला</label>
                            <p class="form-control-plaintext">{{ $profile?->permanentDistrict->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">गाउँपालिका/नगरपालिका</label>
                            <p class="form-control-plaintext">{{ $profile?->permanentMunicipality->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">वडा नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->permanent_ward_id ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">टोल</label>
                            <p class="form-control-plaintext">{{ $profile?->permanent_tole ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">घर नं.</label>
                            <p class="form-control-plaintext">{{ $profile?->permanent_house_no ?? 'N/A' }}</p>
                        </div>
                    </div>

                    @if($profile && !$profile?->temp_same_as_permanent)
                        <h5 class="mb-2">अस्थायी ठेगाना</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">प्रदेश</label>
                                <p class="form-control-plaintext">{{ $profile?->tempProvince->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">जिल्ला</label>
                                <p class="form-control-plaintext">{{ $profile?->tempDistrict->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">गाउँपालिका/नगरपालिका</label>
                                <p class="form-control-plaintext">{{ $profile?->tempMunicipality->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">वडा नं.</label>
                                <p class="form-control-plaintext">{{ $profile?->temp_ward_id ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">टोल</label>
                                <p class="form-control-plaintext">{{ $profile?->temp_tole ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">घर नं.</label>
                                <p class="form-control-plaintext">{{ $profile?->temp_house_no ?? 'N/A' }}</p>
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
                                    <a href="{{ asset('storage/' . $documents->citizenship_front) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                    </a>
                                    <img src="{{ asset('storage/' . $documents->citizenship_front) }}" 
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
                                    <a href="{{ asset('storage/' . $documents->citizenship_back) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                    </a>
                                    <img src="{{ asset('storage/' . $documents->citizenship_back) }}" 
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
                                    <a href="{{ asset('storage/' . $documents->passport_size_photo) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                    </a>
                                    <img src="{{ asset('storage/' . $documents->passport_size_photo) }}" 
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
                                    <a href="{{ asset('storage/' . $documents->academic_certificates) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i> हेर्नुहोस्
                                    </a>
                                    <img src="{{ asset('storage/' . $documents->academic_certificates) }}" 
                                         class="img-thumbnail mt-2" 
                                         style="max-width: 200px; max-height: 200px;">
                                @else
                                    <span class="text-muted">अपलोड गरिएको छैन</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        function nextTab(tabId) {
            // Validate current tab before moving to next
            if (!validateCurrentTab(tabId)) {
                return;
            }
            if (tabId && tabId.trim() !== '') {
                const tabElement = document.querySelector('#' + tabId + '-tab');
                if (tabElement) {
                    tabElement.click();
                }
            }
        }

        function validateCurrentTab(nextTabId) {
            const currentTab = document.querySelector('.tab-pane.active');
            const currentTabId = currentTab ? currentTab.id : '';
            
            let hasData = false;
            let errorMessage = '';
            
            switch(currentTabId) {
                case 'personal':
                    // Check if personal data exists
                    hasData = {{ Auth::user()->profile && Auth::user()->profile->full_name_en ? 'true' : 'false' }};
                    errorMessage = 'कृपया व्यक्तिगत विवरण भर्नुहोस् अघि अगाडि बढ्नुहोस्।';
                    break;
                case 'address':
                    // Check if address data exists
                    hasData = {{ Auth::user()->profile && Auth::user()->profile->permanent_province_id ? 'true' : 'false' }};
                    errorMessage = 'कृपया ठेगाना विवरण भर्नुहोस् अघि अगाडि बढ्नुहोस्।';
                    break;
                case 'education':
                    // Check if education data exists
                    hasData = {{ Auth::user()->education()->count() > 0 ? 'true' : 'false' }};
                    errorMessage = 'कृपया शैक्षिक विवरण भर्नुहोस् अघि अगाडि बढ्नुहोस्।';
                    break;
                case 'documents':
                    // Check if documents exist
                    hasData = {{ Auth::user()->documents ? 'true' : 'false' }};
                    errorMessage = 'कृपया कागजातहरू अपलोड गर्नुहोस् अघि अगाडि बढ्नुहोस्।';
                    break;
                case 'skills':
                    // Skills and experience are optional, always allow
                    hasData = true;
                    break;
                default:
                    hasData = true;
            }
            
            if (!hasData) {
                alert(errorMessage);
                return false;
            }
            
            return true;
        }

        function collectSkills(event) {
            event.preventDefault();
            const checkboxes = document.querySelectorAll('.skill-checkbox:checked');
            const skills = Array.from(checkboxes).map(cb => cb.value);
            document.getElementById('skillsInput').value = JSON.stringify(skills);
            event.target.closest('form').submit();
        }

        function toggleTemporaryAddress(checkbox) {
            const section = document.getElementById('temporaryAddressSection');
            if (checkbox.checked) {
                section.style.display = 'none';
            } else {
                section.style.display = 'block';
            }
        }

        function addEducationRecord() {
            const container = document.getElementById('educationRecords');
            const newRecord = document.createElement('div');
            newRecord.className = 'card mb-3 education-record';
            newRecord.innerHTML = `
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">शिक्षा स्तर</label>
                            <select class="form-control" name="education_level_id[]">
                                <option value="">--कृपया छान्नुहोस्--</option>
                                @foreach(\App\Models\EducationLevel::all() as $level)
                                    <option value="{{ $level->id }}">{{ $level->name_np }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">विषय/स्ट्रिम</label>
                            <input type="text" class="form-control" name="faculty_stream[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">बोर्ड/विश्वविद्यालय</label>
                            <input type="text" class="form-control" name="board_university[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">संस्थाको नाम</label>
                            <input type="text" class="form-control" name="institution_name[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">उत्तीर्ण वर्ष</label>
                            <input type="text" class="form-control" name="passed_year[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">GPA/प्रतिशत</label>
                            <input type="text" class="form-control" name="gpa_percentage[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">प्रमाणपत्र अपलोड</label>
                            <input type="file" class="form-control" name="certificate_upload[]">
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newRecord);
        }

        function addEducation() {
            // Clear form fields for new education
            document.getElementById('education_id').value = '';
            document.querySelector('[name="education_level_id"]').value = '';
            document.querySelector('[name="faculty_stream"]').value = '';
            document.querySelector('[name="board_university"]').value = '';
            document.querySelector('[name="institution_name"]').value = '';
            document.querySelector('[name="passed_year"]').value = '';
            document.querySelector('[name="gpa_percentage"]').value = '';
            document.querySelector('[name="certificate_upload"]').value = '';
            
            // Show form
            document.getElementById('educationForm').style.display = 'block';
        }

        function editEducation(id) {
            // Fetch education data and populate form
            fetch(`/trainee/profile/education/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('education_id').value = data.id;
                    document.querySelector('[name="education_level_id"]').value = data.education_level_id;
                    document.querySelector('[name="faculty_stream"]').value = data.faculty_stream || '';
                    document.querySelector('[name="board_university"]').value = data.board_university || '';
                    document.querySelector('[name="institution_name"]').value = data.institution_name || '';
                    document.querySelector('[name="passed_year"]').value = data.passed_year || '';
                    document.querySelector('[name="gpa_percentage"]').value = data.gpa_percentage || '';
                    
                    // Show form
                    document.getElementById('educationForm').style.display = 'block';
                });
        }

        function deleteEducation(id) {
            if (confirm('के तपाईं निश्चित हुनुहुन्छ कि तपाईं यो शिक्षा विवरण मेटाउन चाहनुहुन्छ?')) {
                fetch(`/trainee/profile/education/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'मेटाउन सकिएन');
                    }
                });
            }
        }

        function addExperience() {
            // Clear form fields for new experience
            document.getElementById('experience_id').value = '';
            document.querySelector('[name="organization_name"]').value = '';
            document.querySelector('[name="position"]').value = '';
            document.querySelector('[name="from_date"]').value = '';
            document.querySelector('[name="to_date"]').value = '';
            document.querySelector('[name="experience_type"]').value = '';
            document.querySelector('[name="description"]').value = '';
            
            // Show form
            document.getElementById('experienceForm').style.display = 'block';
        }

        function editExperience(id) {
            // Fetch experience data and populate form
            fetch(`/trainee/profile/experience/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('experience_id').value = data.id;
                    document.querySelector('[name="organization_name"]').value = data.organization_name || '';
                    document.querySelector('[name="position"]').value = data.position || '';
                    document.querySelector('[name="from_date"]').value = data.from_date || '';
                    document.querySelector('[name="to_date"]').value = data.to_date || '';
                    document.querySelector('[name="experience_type"]').value = data.experience_type || '';
                    document.querySelector('[name="description"]').value = data.description || '';
                    
                    // Show form
                    document.getElementById('experienceForm').style.display = 'block';
                });
        }

        function deleteExperience(id) {
            if (confirm('के तपाईं निश्चित हुनुहुन्छ कि तपाईं यो अनुभव विवरण मेटाउन चाहनुहुन्छ?')) {
                fetch(`/trainee/profile/experience/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'मेटाउन सकिएन');
                    }
                });
            }
        }

        function addExperienceRecord() {
            const container = document.getElementById('experienceRecords');
            const newRecord = document.createElement('div');
            newRecord.className = 'card mb-3 experience-record';
            newRecord.innerHTML = `
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">संस्थाको नाम</label>
                            <input type="text" class="form-control" name="organization_name[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">पद</label>
                            <input type="text" class="form-control" name="position[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">देखि मिति</label>
                            <input type="date" class="form-control" name="from_date[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">सम्म मिति</label>
                            <input type="date" class="form-control" name="to_date[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">अनुभव प्रकार</label>
                            <input type="text" class="form-control" name="experience_type[]">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">विवरण</label>
                            <textarea class="form-control" name="description[]" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newRecord);
        }

        function loadDistricts(type) {
            const provinceId = document.getElementById(type + '_province_id').value;
            const districtSelect = document.getElementById(type + '_district_id');
            
            if (!provinceId) {
                districtSelect.innerHTML = '<option value="">--कृपया छान्नुहोस्--</option>';
                return;
            }
            
            fetch(`/trainee/api/districts/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    districtSelect.innerHTML = '<option value="">--कृपया छान्नुहोस्--</option>';
                    data.forEach(district => {
                        districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
                    });
                });
        }

        function loadMunicipalities(type) {
            const districtId = document.getElementById(type + '_district_id').value;
            const municipalitySelect = document.getElementById(type + '_municipality_id');
            
            if (!districtId) {
                municipalitySelect.innerHTML = '<option value="">--कृपया छान्नुहोस्--</option>';
                return;
            }
            
            fetch(`/trainee/api/municipalities/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    municipalitySelect.innerHTML = '<option value="">--कृपया छान्नुहोस्--</option>';
                    data.forEach(municipality => {
                        municipalitySelect.innerHTML += `<option value="${municipality.id}">${municipality.name}</option>`;
                    });
                });
        }

        function nextTab(tabName) {
            const tabButton = document.querySelector(`[data-bs-target="#${tabName}"]`);
            if (tabButton) {
                tabButton.click();
            }
        }

        function prevTab(tabName) {
            const tabButton = document.querySelector(`[data-bs-target="#${tabName}"]`);
            if (tabButton) {
                tabButton.click();
            }
        }

        function showAddressForm() {
            document.getElementById('addressForm').style.display = 'block';
        }

        function showPersonalForm() {
            document.getElementById('personalForm').style.display = 'block';
        }

        // Handle tab parameter from URL
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');
            if (tab) {
                const tabButton = document.querySelector(`[data-bs-target="#${tab}"]`);
                if (tabButton) {
                    tabButton.click();
                }
            }

            // Simple BS to AD conversion function
            function bsToAdSimple(bsYear, bsMonth, bsDay) {
                // Approximate BS to AD conversion
                var adYear = bsYear - 56;
                var adMonth = bsMonth - 8;
                var adDay = bsDay - 15;
                
                if (adDay <= 0) {
                    adDay += 30;
                    adMonth--;
                }
                if (adMonth <= 0) {
                    adMonth += 12;
                    adYear--;
                }
                
                return {
                    year: adYear,
                    month: adMonth,
                    day: adDay
                };
            }

            // Initialize Nepali datepicker
            var mainInput = document.getElementById("dob_bs");
            var dobAdInput = document.getElementById("dob_ad");
            
            if (mainInput) {
                // Initialize Nepali datepicker
                mainInput.NepaliDatePicker();
                
                // Add event listener for BS to AD conversion
                mainInput.addEventListener('input', function() {
                    var bsDate = mainInput.value;
                    if (bsDate && bsDate.length >= 10) {
                        try {
                            var bsParts = bsDate.split('-');
                            if (bsParts.length === 3) {
                                var bsYear = parseInt(bsParts[0]);
                                var bsMonth = parseInt(bsParts[1]);
                                var bsDay = parseInt(bsParts[2]);
                                
                                var adDate = bsToAdSimple(bsYear, bsMonth, bsDay);
                                if (adDate && adDate.year) {
                                    var adDateStr = adDate.year + '-' + String(adDate.month).padStart(2, '0') + '-' + String(adDate.day).padStart(2, '0');
                                    dobAdInput.value = adDateStr;
                                }
                            }
                        } catch (error) {
                            console.error('Date conversion error:', error);
                        }
                    }
                });
            }
        });
    </script>
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/v5/nepali.datepicker/js/nepali.datepicker.v5.0.6.min.js" type="text/javascript"></script>
@endsection
