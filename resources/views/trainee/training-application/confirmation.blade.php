@extends('trainee.includes.main')
@section('title', 'आवेदन पुष्टि')
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
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-check-circle-fill text-success"></i>
                आवेदन सफलतापूर्वक पेश गरियो
            </h2>
        </div>

        <div class="alert alert-success" style="border-radius: 8px;">
            <h5 class="alert-heading"><i class="bi bi-check-circle"></i> धन्यवाद!</h5>
            <p>तपाईंको आवेदन सफलतापूर्वक पेश गरिएको छ।</p>
            <div class="mt-3 p-3 bg-white rounded border">
                <p class="mb-1"><strong>आवेदन कोड:</strong></p>
                <h3 class="text-primary mb-0">{{ $application->application_no }}</h3>
            </div>
            <hr>
            <p class="mb-0">कृपया आवेदन स्थिति जाँच गर्नुहोस्। हामी तपाईंलाई अगाडि जानको लागि सूचना दिनेछौं।</p>
        </div>

        <div class="d-flex gap-2 mb-4">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="bi bi-printer"></i> प्रिन्ट गर्नुहोस्
            </button>
            <a href="{{ route('trainee.my-trainings.index') }}" class="btn btn-outline">
                <i class="bi bi-list"></i> मेरो आवेदनहरू हेर्नुहोस्
            </a>
            <a href="{{ route('trainee.training.index') }}" class="btn btn-outline">
                <i class="bi bi-arrow-left"></i> तालिम सूचीमा जानुहोस्
            </a>
        </div>

        <!-- Application Summary for Print -->
        <div id="application-summary" class="print-section">
            <div class="text-center mb-4">
                <h3>तालिम आवेदन प्रमाणपत्र</h3>
                <p class="text-muted">आवेदन नं.: {{ $application->application_no }}</p>
                <p class="text-muted">आवेदन मिति: {{ $application->created_at->format('Y-m-d') }}</p>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>तालिम विवरण</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>तालिमको नाम</th>
                            <td>{{ $training->name_np }}</td>
                        </tr>
                        <tr>
                            <th>सुरु मिति</th>
                            <td>{{ $training->start_miti_bs }}</td>
                        </tr>
                        <tr>
                            <th>स्थान</th>
                            <td>{{ $training->venue ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>आवेदक विवरण</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>नाम</th>
                            <td>{{ $profile->full_name_np ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>सम्पर्क नं.</th>
                            <td>{{ $profile->mobile_number ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>इमेल</th>
                            <td>{{ $profile->email ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mb-4">
                <h5>व्यक्तिगत विवरण</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>नाम (English)</th>
                        <td>{{ $profile->full_name_en ?? '' }}</td>
                        <th>नाम (नेपाली)</th>
                        <td>{{ $profile->full_name_np ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>लिङ्ग</th>
                        <td>{{ $profile->gender == 'male' ? 'पुरुष' : ($profile->gender == 'female' ? 'महिला' : 'अन्य') }}</td>
                        <th>जन्म मिति (बि.सं.)</th>
                        <td>{{ $profile->dob_bs ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>नागरिकता नं.</th>
                        <td>{{ $profile->citizenship_no ?? '' }}</td>
                        <th>रक्त समूह</th>
                        <td>{{ $profile->blood_group ?? '' }}</td>
                    </tr>
                </table>
            </div>

            <div class="mb-4">
                <h5>ठेगाना विवरण</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>प्रदेश</th>
                        <td>{{ $profile->permanentProvince->name ?? '' }}</td>
                        <th>जिल्ला</th>
                        <td>{{ $profile->permanentDistrict->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>गाउँपालिका/नगरपालिका</th>
                        <td>{{ $profile->permanentMunicipality->name ?? '' }}</td>
                        <th>वडा नं.</th>
                        <td>{{ $profile->permanent_ward_id ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>टोल/घर नं.</th>
                        <td colspan="3">{{ $profile->permanent_tole ?? '' }} / {{ $profile->permanent_house_no ?? '' }}</td>
                    </tr>
                </table>
            </div>

            @if($education && $education->count() > 0)
            <div class="mb-4">
                <h5>शैक्षिक विवरण</h5>
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
                        @foreach($education as $edu)
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
            @endif

            <div class="mb-4">
                <h5>सीप तथा अनुभव</h5>
                <p><strong>सीपहरू:</strong> 
                    @if($skills && $skills->count() > 0)
                        @foreach($skills as $skill)
                            <span class="badge bg-primary me-1">{{ $skill->skill_name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">कुनै सीप छैन।</span>
                    @endif
                </p>
                @if($experience && $experience->count() > 0)
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
                        @foreach($experience as $exp)
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
                @endif
            </div>

            <div class="text-center mt-5">
                <p class="text-muted">यो प्रमाणपत्र कम्प्युटर द्वारा उत्पन्न गरिएको हो।</p>
                <p class="text-muted">हस्ताक्षर आवश्यक छैन।</p>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            .print-section {
                display: block !important;
            }
            .glass-card {
                box-shadow: none !important;
                border: none !important;
            }
            .card-header {
                display: none !important;
            }
            .alert {
                display: none !important;
            }
            .d-flex {
                display: none !important;
            }
            body {
                background: white !important;
            }
        }
    </style>
@endsection
