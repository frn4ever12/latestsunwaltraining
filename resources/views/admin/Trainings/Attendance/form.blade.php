@extends('admin.includes.main')
@section('content')
    <div class="page-header">
        <div class="mb-3">
            <h3 class="fw-bold">तालीम हाजिरी विवरण</h3>
        </div>
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
                <a href="{{ route('admin.training.show', $training->id) }}">तालीम विवरण</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">तालीम हाजिरी विवरण</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.attendance.store', $training->id) }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>क्र.सं.</th>
                                <th>आवेदकको नाम</th>
                                @foreach ($dates as $d)
                                    <th>{{ \App\Helpers\NumberHelper::toNepaliDay($d['day']) }}
                                        <small>{{ \App\Helpers\NumberHelper::toNepaliNumber($d['date']) }}</small>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicants as $index => $applicant)
                                <tr>
                                    <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                    <td>{{ $applicant->fullname_np }}</td>

                                    @foreach ($dates as $d)
                                        <td>
                                            <input type="hidden"
                                            name="attendance[{{ $applicant->id }}][{{ $d['date'] }}]" value="0">
                                      
                                            <input type="checkbox"
                                            name="attendance[{{ $applicant->id }}][{{ $d['date'] }}]"
                                            value="1"
                                            @if (old("attendance.{$applicant->id}.{$d['date']}") === '1' ||
                                                 ($attendanceData[$applicant->id][$d['date']] ?? null) == 1) checked @endif>
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>&nbsp;
                        {{ isset($attendance->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                    </button>
                    <a href="{{ route('admin.training.show',$training->id) }}" class="btn btn-danger"><i class="fa fa-arrow-left me-2"></i>
                        फर्किनुहोस् </a>
                </div>
            </form>
        </div>
    </div>
@endsection
