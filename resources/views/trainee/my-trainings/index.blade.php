@extends('trainee.includes.main')
@section('title', 'मेरो आवेदनहरू')
@section('page-title')
    मेरो आवेदनहरू
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-journal-bookmark"></i>
                मेरो आवेदनहरू
            </h2>
        </div>
        @if($applications->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>सि.नं.</th>
                            <th>आवेदन नं.</th>
                            <th>तालिमको नाम</th>
                            <th>सुरु मिति</th>
                            <th>आवेदन स्थिति</th>
                            <th>तालिम स्थिति</th>
                            <th>कार्य</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $application->application_no ?? 'N/A' }}</strong></td>
                                <td>{{ $application->training->name_np ?? 'N/A' }}</td>
                                <td>{{ $application->training->start_miti_bs ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $application->getStatusBadgeClass() }}">
                                        {{ $application->getStatusLabel() }}
                                    </span>
                                </td>
                                <td>
                                    @if($application->training->status == 'upcoming')
                                        <span class="badge bg-info">आगामी</span>
                                    @elseif($application->training->status == 'active')
                                        <span class="badge bg-success">सक्रिय</span>
                                    @elseif($application->training->status == 'completed')
                                        <span class="badge bg-warning">सम्पन्न</span>
                                    @elseif($application->training->status == 'closed')
                                        <span class="badge bg-danger">बन्द</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $application->training->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('trainee.training.show', $application->training->id) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-eye"></i> हेर्नुहोस्
                                        </a>
                                        @if(in_array($application->status, [\App\Models\TrainingApplication::STATUS_DRAFT, \App\Models\TrainingApplication::STATUS_SUBMITTED]))
                                            <a href="{{ route('training-application.edit', [$application->training->id, $application->id]) }}" class="btn btn-primary">
                                                <i class="bi bi-pencil"></i> सम्पादन
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">
                <i class="bi bi-info-circle"></i> तपाईंले अहिलेसम्म कुनै तालिममा आवेदन दिनुभएको छैन।
                <br>
                <a href="{{ route('trainee.training.index') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle"></i> नयाँ आवेदन दिनुहोस्
                </a>
            </div>
        @endif
    </div>
@endsection
