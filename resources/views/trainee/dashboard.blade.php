@extends('trainee.includes.main')

@section('head')
@endsection

@section('page-title')
    ड्यासबोर्ड
@endsection

@section('content')
    @php
        $organization = \App\Models\Organization::first();
        $municipalityName = $organization ? $organization->name_np ?? 'नगरपालिका' : 'नगरपालिका';
    @endphp

    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- आवेदनको अवस्था -->
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #f94144, #f3722c);">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stats-info">
                <h3>{{ \App\Models\TrainingApplication::where('user_id', Auth::id())->count() ?? 0 }}</h3>
                <p>मेरो कुल आवेदन</p>
            </div>
        </div>

        <!-- नयाँ तालिमहरू -->
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #059e7a, #28cba7);">
                <i class="bi bi-book"></i>
            </div>
            <div class="stats-info">
                <h3>{{ \App\Models\Training::where('status', 'upcoming')->count() ?? 0 }}</h3>
                <p>नयाँ तालिमहरू</p>
            </div>
        </div>

        <!-- सूचना -->
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #2569f1, #0e4ecf);">
                <i class="bi bi-bell"></i>
            </div>
            <div class="stats-info">
                <h3>{{ Auth::user()->unreadNotifications->count() ?? 0 }}</h3>
                <p>सूचनाहरू</p>
            </div>
        </div>

        <!-- प्रोफाइल पूरा भएको प्रतिशत -->
        @if($profileCompletion < 100)
        <div class="stats-card">
            <div class="stats-icon" style="background: linear-gradient(135deg, #fad70b, #fdc305);">
                <i class="bi bi-person"></i>
            </div>
            <div class="stats-info">
                <h3>{{ $profileCompletion ?? 0 }}%</h3>
                <p>प्रोफाइल पूरा भएको</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Tables Grid -->
    <div class="stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
        <!-- आवेदनको अवस्था -->
        <div class="glass-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-file-earmark-text"></i>
                    आवेदनको अवस्था
                </h3>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>तालिम</th>
                            <th>स्थिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $applications = \App\Models\TrainingApplication::where('user_id', Auth::id())
                                ->with('training')
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        @if($applications->count() > 0)
                            @foreach($applications as $app)
                                <tr>
                                    <td>{{ $app->training->name_np ?? '-' }}</td>
                                    <td>
                                        @if($app->status == 'pending')
                                            <span class="badge badge-warning">पेन्डिङ</span>
                                        @elseif($app->status == 'approved')
                                            <span class="badge badge-success">स्वीकृत</span>
                                        @elseif($app->status == 'rejected')
                                            <span class="badge badge-danger">अस्वीकृत</span>
                                        @else
                                            <span class="badge badge-info">{{ $app->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center">कुनै आवेदन छैन</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- नयाँ तालिमहरू सूची -->
        <div class="glass-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-book"></i>
                    नयाँ तालिमहरू
                </h3>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>तालिम</th>
                            <th>सुरु मिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $newTrainings = \App\Models\Training::where('status', 'upcoming')
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        @if($newTrainings->count() > 0)
                            @foreach($newTrainings as $training)
                                <tr>
                                    <td>{{ $training->name_np }}</td>
                                    <td>{{ $training->start_miti_bs }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center">कुनै तालिम छैन</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- सूचनाहरू सूची -->
        <div class="glass-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="bi bi-bell"></i>
                    सूचनाहरू
                </h3>
            </div>
            @php
                $notifications = Auth::user()->unreadNotifications()->take(5)->get();
            @endphp
            @if($notifications->count() > 0)
                <div class="list-group">
                    @foreach($notifications as $notification)
                        <div class="list-group-item" style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px; margin-bottom: 10px;">
                            <h6 class="mb-1 fw-bold">{{ $notification->data['title'] ?? 'सूचना' }}</h6>
                            <p class="mb-1 small text-muted">{{ $notification->data['message'] ?? '' }}</p>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै सूचना छैन</div>
            @endif
        </div>
    </div>
@endsection
