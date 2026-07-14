@extends('admin.includes.main')
@section('head')
    @include('admin.includes.datatables-css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="mb-3 fw-bold">आवेदक सूची</h3>
        <ul class="mb-3 breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.applicants.index') }}">आवेदक सूची</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">दर्ता भएका आवेदकहरू</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable-responsive" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>नाम</th>
                                    <th>ईमेल</th>
                                    <th>सम्पर्क नम्बर</th>
                                    <th>लिङ्ग</th>
                                    <th>स्थिति</th>
                                    <th>दर्ता मिति</th>
                                    <th>कार्यहरू</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applicants as $applicant)
                                    <tr>
                                        <td>
                                            <strong>{{ $applicant->name_np ?? $applicant->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $applicant->name }}</small>
                                        </td>
                                        <td>{{ $applicant->email }}</td>
                                        <td>{{ $applicant->contact_no ?? 'N/A' }}</td>
                                        <td>
                                            @if($applicant->gender == 'male') पुरुष
                                            @elseif($applicant->gender == 'female') महिला
                                            @else अन्य
                                            @endif
                                        </td>
                                        <td>
                                            @if($applicant->approval_status == 'pending')
                                                <span class="badge bg-warning">पेन्डिङ</span>
                                            @elseif($applicant->approval_status == 'approved')
                                                <span class="badge bg-success">स्वीकृत</span>
                                            @elseif($applicant->approval_status == 'rejected')
                                                <span class="badge bg-danger">अस्वीकृत</span>
                                            @else
                                                <span class="badge bg-secondary">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $applicant->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if($applicant->approval_status == 'pending')
                                                <form action="{{ route('admin.users.approve', $applicant->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('के तपाईं यो आवेदकलाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.users.reject', $applicant->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('के तपाईं यो आवेदकलाई अस्वीकार गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @elseif($applicant->approval_status == 'rejected')
                                                <form action="{{ route('admin.users.approve', $applicant->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('के तपाईं यो आवेदकलाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.users.destroy', $applicant->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('के तपाईं यो आवेदकलाई मेटाउन चाहनुहुन्छ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                            <p class="text-muted">कुनै आवेदक दर्ता भएको छैन।</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.includes.datatables-scripts')
    @include('admin.includes.sweet-alert-script')
@endsection
