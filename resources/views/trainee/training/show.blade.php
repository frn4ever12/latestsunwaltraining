@extends('trainee.includes.main')
@section('title', 'तालिम विवरण')
@section('page-title')
    तालिम विवरण
@endsection
@section('content')
    @php
        $profile = auth()->user()->profile;
    @endphp
    
    <!-- Profile Preview Section -->
    @if($profile)
    <div class="glass-card mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-person"></i> प्रोफाइल प्रिभ्यू</h4>
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
                    <h5 class="mt-2">{{ $profile->full_name_np ?? auth()->user()->name }}</h5>
                    <p class="text-muted">{{ $profile->mobile_number ?? auth()->user()->mobile_number ?? '' }}</p>
                </div>
                <div class="col-md-9">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> यो प्रोफाइल तालिम आवेदनको लागि प्रयोग गरिन्छ। कृपया सबै विवरण सही रहेको निश्चित गर्नुहोस्।
                    </div>
                    
                    <ul class="nav nav-tabs mb-3" id="profileTabs" role="tablist" style="border-bottom: none;">
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
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <!-- Personal Details -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <table class="table table-bordered">
                                <tr><th>नाम (English)</th><td>{{ $profile->full_name_en ?? '' }}</td></tr>
                                <tr><th>नाम (नेपाली)</th><td>{{ $profile->full_name_np ?? '' }}</td></tr>
                                <tr><th>लिङ्ग</th><td>{{ $profile->gender ?? '' }}</td></tr>
                                <tr><th>जन्म मिति (बि.सं.)</th><td>{{ $profile->dob_bs ?? '' }}</td></tr>
                                <tr><th>जन्म मिति (AD)</th><td>{{ $profile->dob_ad ?? '' }}</td></tr>
                                <tr><th>नागरिकता नं.</th><td>{{ $profile->citizenship_no ?? '' }}</td></tr>
                                <tr><th>मोबाइल नं.</th><td>{{ $profile->mobile_number ?? '' }}</td></tr>
                                <tr><th>इमेल</th><td>{{ $profile->email ?? auth()->user()->email }}</td></tr>
                            </table>
                        </div>

                        <!-- Address Details -->
                        <div class="tab-pane fade" id="address" role="tabpanel">
                            <h5 class="mb-3">स्थायी ठेगाना</h5>
                            <table class="table table-bordered">
                                <tr><th>प्रदेश</th><td>{{ $profile->permanentProvince->name ?? '' }}</td></tr>
                                <tr><th>जिल्ला</th><td>{{ $profile->permanentDistrict->name ?? '' }}</td></tr>
                                <tr><th>गाउँपालिका/नगरपालिका</th><td>{{ $profile->permanentMunicipality->name ?? '' }}</td></tr>
                                <tr><th>वडा नं.</th><td>{{ $profile->permanent_ward_id ?? '' }}</td></tr>
                                <tr><th>टोल</th><td>{{ $profile->permanent_tole ?? '' }}</td></tr>
                                <tr><th>घर नं.</th><td>{{ $profile->permanent_house_no ?? '' }}</td></tr>
                            </table>
                        </div>

                        <!-- Education Details -->
                        <div class="tab-pane fade" id="education" role="tabpanel">
                            @if($profile->education && $profile->education->count() > 0)
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
                            @else
                            <p class="text-muted">शिक्षा डाटा छैन।</p>
                            @endif
                        </div>

                        <!-- Skills and Experience -->
                        <div class="tab-pane fade" id="experience" role="tabpanel">
                            <h5 class="mb-3">सीपहरू</h5>
                            <p>{{ $profile->skills ?? 'N/A' }}</p>
                            
                            @if($profile->experience && $profile->experience->count() > 0)
                            <h5 class="mb-3 mt-4">कार्य अनुभव</h5>
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
                            @else
                            <p class="text-muted">अनुभव डाटा छैन।</p>
                            @endif
                        </div>

                        <!-- Documents -->
                        <div class="tab-pane fade" id="documents" role="tabpanel">
                            @if($profile->documents)
                            <table class="table table-bordered">
                                <tr>
                                    <th>नागरिकता अगाडि</th>
                                    <td>
                                        @if($profile->documents->citizenship_front)
                                            <a href="{{ asset('files/' . $profile->documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                            </a>
                                        @else
                                            <span class="text-muted">अपलोड गरिएको छैन</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>नागरिकता पछाडि</th>
                                    <td>
                                        @if($profile->documents->citizenship_back)
                                            <a href="{{ asset('files/' . $profile->documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                            </a>
                                        @else
                                            <span class="text-muted">अपलोड गरिएको छैन</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>पासपोर्ट साइज फोटो</th>
                                    <td>
                                        @if($profile->documents->passport_size_photo)
                                            <a href="{{ asset('files/' . $profile->documents->passport_size_photo) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                            </a>
                                        @else
                                            <span class="text-muted">अपलोड गरिएको छैन</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>शैक्षिक प्रमाणपत्र</th>
                                    <td>
                                        @if($profile->documents->academic_certificates)
                                            <a href="{{ asset('files/' . $profile->documents->academic_certificates) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-eye"></i> हेर्नुहोस्
                                            </a>
                                        @else
                                            <span class="text-muted">अपलोड गरिएको छैन</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            @else
                            <p class="text-muted">कागजात डाटा छैन।</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Training Details -->
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-book"></i>
                {{ $training->name_np }}
            </h2>
            <a href="{{ route('trainee.training.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> पछाडि जानुहोस्
            </a>
        </div>
        <div class="card-body">
            @if($training->banner)
                <div class="mb-4">
                    <img src="{{ asset('files/' . $training->banner) }}" alt="{{ $training->name_np }}" class="img-fluid rounded" style="max-height: 300px; width: 100%; object-fit: cover;">
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3">तालिमको बारेमा</h4>
                    <p>{!! $training->description ?? 'कुनै विवरण उपलब्ध छैन।' !!}</p>

                    @if($training->objectives)
                        <h5 class="mt-4">उद्देश्यहरू</h5>
                        <p>{!! $training->objectives !!}</p>
                    @endif

                    @if($training->eligibility)
                        <h5 class="mt-4">पात्रता</h5>
                        <p>{!! $training->eligibility !!}</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">तालिमको विवरण</h5>
                            <hr>
                            <p><strong>आयोजक:</strong> {{ $training->organizer ?? 'N/A' }}</p>
                            <p><strong>सुरु मिति:</strong> {{ $training->start_miti_bs }}</p>
                            <p><strong>अन्त्य मिति:</strong> {{ $training->end_miti_bs }}</p>
                            <p><strong>स्थान:</strong> {{ $training->venue ?? 'N/A' }}</p>
                            <p><strong>अन्तिम आवेदन मिति:</strong> {{ $training->application_deadline_bs ?? 'N/A' }}</p>
                            <p><strong>उपलब्ध सिट:</strong> {{ $training->available_seats ?? 'N/A' }}</p>
                            <p><strong>स्थिति:</strong>
                                @if($training->status == 'upcoming')
                                    <span class="badge bg-info">आगामी</span>
                                @elseif($training->status == 'active')
                                    <span class="badge bg-success">सक्रिय</span>
                                @elseif($training->status == 'completed')
                                    <span class="badge bg-warning">सम्पन्न</span>
                                @elseif($training->status == 'closed')
                                    <span class="badge bg-danger">बन्द</span>
                                @else
                                    <span class="badge bg-secondary">{{ $training->status }}</span>
                                @endif
                            </p>
                            <hr>
                            @if($application)
                                <button class="btn btn-success w-100" disabled>
                                    <i class="bi bi-check-circle"></i> आवेदन गरिएको
                                </button>
                                <div class="mt-2 text-center">
                                    <small class="text-muted">आवेदन कोड: {{ $application->application_no }}</small>
                                </div>
                            @elseif($training->status == 'active' || $training->status == 'upcoming')
                                <a href="{{ route('training-application.index', $training) }}" class="btn btn-primary w-100">
                                    <i class="bi bi-file-earmark-plus"></i> आवेदन गर्नुहोस्
                                </a>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="bi bi-file-earmark-plus"></i> आवेदन बन्द
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
