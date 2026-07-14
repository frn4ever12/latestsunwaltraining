@extends('admin.includes.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs" id="userApprovalTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
                                <i class="fas fa-clock me-2"></i>पेन्डिङ ({{ $pendingUsers->total() }})
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">
                                <i class="fas fa-check-circle me-2"></i>स्वीकृत ({{ $approvedUsers->total() }})
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">
                                <i class="fas fa-times-circle me-2"></i>अस्वीकृत ({{ $rejectedUsers->total() }})
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="tab-content" id="userApprovalTabContent">
                        <!-- Pending Users -->
                        <div class="tab-pane fade show active" id="pending" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>नाम</th>
                                            <th>ईमेल</th>
                                            <th>सम्पर्क नम्बर</th>
                                            <th>लिङ्ग</th>
                                            <th>दर्ता मिति</th>
                                            <th>कार्यहरू</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pendingUsers as $user)
                                            <tr>
                                                <td>
                                                    <strong>{{ $user->name_np ?? $user->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $user->name }}</small>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact_no ?? 'N/A' }}</td>
                                                <td>
                                                    @if($user->gender == 'male') पुरुष
                                                    @elseif($user->gender == 'female') महिला
                                                    @else अन्य
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.users.approve', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                            <i class="fas fa-check"></i> स्वीकृत गर्नुहोस्
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.users.reject', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई अस्वीकार गर्न चाहनुहुन्छ?')">
                                                            <i class="fas fa-times"></i> अस्वीकार गर्नुहोस्
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-4">
                                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted">कुनै पेन्डिङ प्रयोगकर्ता छैन।</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $pendingUsers->links() }}
                        </div>

                        <!-- Approved Users -->
                        <div class="tab-pane fade" id="approved" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>नाम</th>
                                            <th>ईमेल</th>
                                            <th>सम्पर्क नम्बर</th>
                                            <th>लिङ्ग</th>
                                            <th>स्वीकृत मिति</th>
                                            <th>कार्यहरू</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($approvedUsers as $user)
                                            <tr>
                                                <td>
                                                    <strong>{{ $user->name_np ?? $user->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $user->name }}</small>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact_no ?? 'N/A' }}</td>
                                                <td>
                                                    @if($user->gender == 'male') पुरुष
                                                    @elseif($user->gender == 'female') महिला
                                                    @else अन्य
                                                    @endif
                                                </td>
                                                <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई मेटाउन चाहनुहुन्छ?')">
                                                            <i class="fas fa-trash"></i> मेटाउनुहोस्
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-4">
                                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted">कुनै स्वीकृत प्रयोगकर्ता छैन।</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $approvedUsers->links() }}
                        </div>

                        <!-- Rejected Users -->
                        <div class="tab-pane fade" id="rejected" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>नाम</th>
                                            <th>ईमेल</th>
                                            <th>सम्पर्क नम्बर</th>
                                            <th>लिङ्ग</th>
                                            <th>अस्वीकार मिति</th>
                                            <th>कार्यहरू</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($rejectedUsers as $user)
                                            <tr>
                                                <td>
                                                    <strong>{{ $user->name_np ?? $user->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $user->name }}</small>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact_no ?? 'N/A' }}</td>
                                                <td>
                                                    @if($user->gender == 'male') पुरुष
                                                    @elseif($user->gender == 'female') महिला
                                                    @else अन्य
                                                    @endif
                                                </td>
                                                <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <form action="{{ route('admin.users.approve', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई स्वीकृत गर्न चाहनुहुन्छ?')">
                                                            <i class="fas fa-check"></i> स्वीकृत गर्नुहोस्
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('के तपाईं यो प्रयोगकर्तालाई मेटाउन चाहनुहुन्छ?')">
                                                            <i class="fas fa-trash"></i> मेटाउनुहोस्
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-4">
                                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted">कुनै अस्वीकार प्रयोगकर्ता छैन।</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $rejectedUsers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
