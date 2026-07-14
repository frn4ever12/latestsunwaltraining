@extends('trainee.includes.main')
@section('title', 'खुल्ला तालिमहरू')
@section('page-title')
    खुल्ला तालिमहरू
@endsection
@section('content')
    @php
        $profileCompletion = Auth::user()->profile_completion ?? 0;
    @endphp

    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-book"></i>
                खुल्ला तालिमहरू
            </h2>
        </div>
        @if($trainings->count() > 0)
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>सि.नं.</th>
                            <th>तालिमको नाम</th>
                            <th>आयोजक</th>
                            <th>सुरु मिति</th>
                            <th>अन्त्य मिति</th>
                            <th>स्थान</th>
                            <th>अन्तिम आवेदन मिति</th>
                            <th>उपलब्ध सिट</th>
                            <th>स्थिति</th>
                            <th>कार्य</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $training->name_np }}</strong>
                                    @if($training->banner)
                                        <br><small class="text-muted"><i class="bi bi-image"></i> ब्यानर छ</small>
                                    @endif
                                </td>
                                <td>{{ $training->organizer ?? 'N/A' }}</td>
                                <td>{{ $training->start_miti_bs }}</td>
                                <td>{{ $training->end_miti_bs }}</td>
                                <td>{{ $training->venue ?? 'N/A' }}</td>
                                <td>{{ $training->application_deadline_bs ?? 'N/A' }}</td>
                                <td>{{ $training->available_seats ?? 'N/A' }}</td>
                                <td>
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
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('trainee.training.show', $training->id) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-eye"></i> विवरण
                                        </a>
                                        @php
                                            $hasApplied = $training->trainingApplications->where('user_id', Auth::id())->isNotEmpty();
                                        @endphp
                                        @if($hasApplied)
                                            <button class="btn btn-success" disabled>
                                                <i class="bi bi-check-circle"></i> आवेदन गरिएको
                                            </button>
                                        @elseif($training->status == 'active' || $training->status == 'upcoming')
                                            <a href="{{ route('training-application.index', $training) }}" class="btn btn-primary">
                                                <i class="bi bi-file-earmark-plus"></i> आवेदन
                                            </a>
                                        @elseif($training->status == 'completed' || $training->status == 'closed')
                                            <button class="btn btn-secondary" disabled>
                                                <i class="bi bi-file-earmark-plus"></i> आवेदन
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै तालिम उपलब्ध छैन।</div>
        @endif
    </div>
@endsection
