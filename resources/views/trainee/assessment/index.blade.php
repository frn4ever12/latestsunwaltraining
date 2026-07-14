@extends('trainee.includes.main')
@section('title', 'मूल्यांकन')
@section('page-title')
    मूल्यांकन
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-clipboard-data"></i>
                मूल्यांकन
            </h2>
        </div>
        @if($assessments->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>सि.नं.</th>
                            <th>तालिम</th>
                            <th>Pre-Test</th>
                            <th>Post-Test</th>
                            <th>Practical</th>
                            <th>Final Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assessments as $assessment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assessment->training->name_np ?? '' }}</td>
                                <td>{{ $assessment->pre_test_score ?? '-' }}</td>
                                <td>{{ $assessment->post_test_score ?? '-' }}</td>
                                <td>{{ $assessment->practical_score ?? '-' }}</td>
                                <td>
                                    @if($assessment->final_result == 'pass')
                                        <span class="badge badge-success">उत्तीर्ण</span>
                                    @elseif($assessment->final_result == 'fail')
                                        <span class="badge badge-danger">अनुत्तीर्ण</span>
                                    @else
                                        <span class="badge badge-info">{{ $assessment->final_result ?? '-' }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै मूल्यांकन डेटा उपलब्ध छैन।</div>
        @endif
    </div>
@endsection
