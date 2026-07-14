@extends('admin.includes.main')

@section('head')
    @include('admin.includes.datatables-css')
@endsection

@section('content')
    @php
        $profile = $application->user->profile ?? null;
    @endphp
    
    <div class="page-header">
        <h3 class="mb-3 fw-bold">आवेदन सूची</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">आवेदन विवरण</a>
            </li>
        </ul>
    </div>

    <div class="card mb-4">
        <div class="card-header ">
            <div class="row g-3 align-items-center">
                <div class="col-md-2 col-sm-12">
                    @if ($application->photo)
                        <img src="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(2), $application->photo) }}"
                            alt="Training Photo" class="img-fluid mb-3"
                            style="height: 120px;width: 120px; object-fit: cover;">
                    @else
                        <p>फोटो उपलब्ध छैन।</p>
                    @endif

                </div>
                <div class="col-md-8 col-sm-12">
                    <h6 class="fw-bold">तालीमको नाम: <span class="ps-3">{{ $application->training->name_np ?? '' }}</span>
                    </h6>
                    <h6 class="fw-bold">आवेदनको स्थिति: <span
                            class="ps-3
{{ $application->status == 'approved' ? 'text-success' : ($application->status == 'declined' ? 'text-danger' : 'text-warning') }}">
                            @if ($application->status == 'approved')
                                {{ 'स्वीकृत' }} <!-- Approved -->
                            @elseif($application->status == 'declined')
                                {{ 'निष्क्रिय' }} <!-- Declined -->
                            @else
                                {{ 'प्रोसेसिङ' }} <!-- Processing -->
                            @endif
                        </span></h6>
                    <h6 class="fw-bold">कैफियत: <span class="text-primary">{{ $application->remarks ?? '' }}</span></h6>
                </div>
                @can('manage_training')
                    @if ($application->status != 'approved')
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#StatusModal">
                                <i class="fa fa-plus"></i>&nbsp; थप कार्य
                            </button>
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card shadow-none border rounded-0 mb-4">
                <div class="card-header pt-3 bg-white ">
                    <h5 class="fw-bold">आवेदकको विवरण</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th>नाम (नेपाली) </th>
                                <td>{{ $profile->full_name_np ?? $application->fullname_np ?? '' }}</td>
                                <th>नाम (अंग्रेजी) </th>
                                <td>{{ $profile->full_name_en ?? $application->fullname_eng ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>लिङ्ग </th>
                                <td>{{ $profile->gender ?? '' }}</td>
                                <th>वैवाहिक स्थिति </th>
                                <td>{{ $profile->marital_status ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>जन्म मिति (बि.सं.) </th>
                                <td>{{ $profile->dob_bs ?? $application->dob_bs ?? '' }}</td>
                                <th>जन्म मिति (ई.सं.) </th>
                                <td>{{ $profile->dob_ad ?? $application->dob_ad ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>नागरिकता नं.</th>
                                <td>{{ $profile->citizenship_no ?? $application->citizenship_no ?? '' }}</td>
                                <th>राष्ट्रिय ID नं.</th>
                                <td>{{ $profile->national_id_no ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>पासपोर्ट नं.</th>
                                <td>{{ $profile->passport_no ?? '' }}</td>
                                <th>रक्त समूह</th>
                                <td>{{ $profile->blood_group ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>मोबाइल नं.</th>
                                <td>{{ $profile->mobile_number ?? $application->mobile_no ?? '' }}</td>
                                <th>वैकल्पिक मोबाइल नं.</th>
                                <td>{{ $profile->alternate_mobile_number ?? $application->contact_no ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>ईमेल </th>
                                <td>{{ $profile->email ?? $application->email ?? '' }}</td>
                                <th>जीवनसाथीको नाम</th>
                                <td>{{ $profile->spouse_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>पिताको नाम </th>
                                <td>{{ $profile->father_name ?? $application->father_name ?? '' }}</td>
                                <th>माताको नाम </th>
                                <td>{{ $profile->mother_name ?? $application->mother_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>हजुरबुको नाम </th>
                                <td>{{ $profile->grandfather_name ?? $application->grandfather_name ?? '' }}</td>
                                <th>ठेगाना </th>
                                <td>
                                    @if($profile)
                                        {{ $profile->permanent_tole ?? '' }}-
                                        {{ $profile->permanent_ward_id ?? '' }},
                                        {{ $profile->permanentMunicipality->name ?? '' }},
                                        {{ $profile->permanentDistrict->name ?? '' }},
                                        {{ $profile->permanentProvince->name ?? '' }}
                                    @else
                                        {{ $application->theganaDetail->asthyayi_tole_name ?? '' }}-
                                        {{ $application->theganaDetail->asthyayi_ward_id ?? '' }},
                                        {{ $application->theganaDetail->asthyayiDistrict->name ?? '' }},
                                        {{ $application->theganaDetail->asthyayiProvince->name ?? '' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>नागरिता फोटो (अगाडि)</th>
                                <td>
                                    @if($profile && $profile->documents && $profile->documents->citizenship_front)
                                        <a href="{{ asset('files/' . $profile->documents->citizenship_front) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                        </a>
                                    @elseif($application->nagrita_copy_front)
                                        <a href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(1), $application->nagrita_copy_front) }}"
                                            target="_blank"
                                            class="d-inline-flex align-items-center mb-2 text-decoration-none">
                                            <i class="fas fa-sticky-note me-2"></i> अगाडिको फोटो हेर्नुहोस्
                                        </a>
                                    @else
                                        <p>अगाडिको फोटो छैन।</p>
                                    @endif
                                </td>
                                <th>नागरिता फोटो (पछाडि)</th>
                                <td>
                                    @if($profile && $profile->documents && $profile->documents->citizenship_back)
                                        <a href="{{ asset('files/' . $profile->documents->citizenship_back) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                        </a>
                                    @elseif($application->nagrita_copy_back)
                                        <a href="{{ URL::temporarySignedRoute('application-file.show', now()->addMinutes(1), $application->nagrita_copy_back) }}"
                                            target="_blank"
                                            class="d-inline-flex align-items-center mb-2 text-decoration-none">
                                            <i class="fas fa-sticky-note me-2"></i> पछाडिको फोटो हेर्नुहोस्
                                        </a>
                                    @else
                                        <p>पछाडिको फोटो छैन।</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-none border rounded-0 mb-4">
                <div class="card-header">
                    <h5 class="fw-bold">शैक्षिक विवरण र प्रमाणपत्रहरू</h5>
                </div>

                <div class="card-body">
                    @if($application->user && $application->user->education && $application->user->education->count() > 0)
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
                                @foreach($application->user->education as $edu)
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
                    @elseif($application->educationDetails)
                        @include('admin.TrainingApplication.Education.table')
                    @else
                        <h6>डेटा उपलब्ध छैन</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none border rounded-0 mb-4">
                <div class="card-header">
                    <h5 class="fw-bold">अनुभव विवरण</h5>
                </div>

                <div class="card-body">
                    @if($application->user && $application->user->experience && $application->user->experience->count() > 0)
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
                                @foreach($application->user->experience as $exp)
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
                        @include('admin.TrainingApplication.Experience.table')
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-none border rounded-0 mb-4">
                <div class="card-header">
                    <h5 class="fw-bold">सीपहरू</h5>
                </div>

                <div class="card-body">
                    @if($profile && $profile->skills)
                        <p>{{ $profile->skills }}</p>
                    @elseif($application->user && $application->user->skills && $application->user->skills->count() > 0)
                        @foreach($application->user->skills as $skill)
                            <span class="badge bg-primary me-1">{{ $skill->skill_name ?? '' }}</span>
                        @endforeach
                    @else
                        <p class="text-muted">सीप डेटा उपलब्ध छैन</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('admin.TrainingApplication.model')
@endsection

@section('scripts')
    @include('admin.includes.sweet-alert-script')
@endsection
