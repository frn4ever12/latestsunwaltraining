@extends('trainee.includes.main')
@section('title', 'दैनिक उपस्थिति')
@section('page-title')
    दैनिक उपस्थिति
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-calendar-check"></i>
                दैनिक उपस्थिति
            </h2>
        </div>
        @if($attendances->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>सि.नं.</th>
                            <th>तालिम</th>
                            <th>मिति</th>
                            <th>उपस्थिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->training->name_np ?? '' }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>
                                    @if($attendance->status == 'present')
                                        <span class="badge badge-success">उपस्थित</span>
                                    @elseif($attendance->status == 'absent')
                                        <span class="badge badge-danger">अनुपस्थित</span>
                                    @else
                                        <span class="badge badge-info">{{ $attendance->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै उपस्थिति डेटा उपलब्ध छैन।</div>
        @endif
    </div>
@endsection
