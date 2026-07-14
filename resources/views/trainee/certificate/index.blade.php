@extends('trainee.includes.main')
@section('title', 'प्रमाणपत्रहरू')
@section('page-title')
    प्रमाणपत्रहरू
@endsection
@section('content')
    <div class="glass-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="bi bi-award"></i>
                प्रमाणपत्रहरू
            </h2>
        </div>
        @if($certificates->count() > 0)
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>सि.नं.</th>
                            <th>तालिम</th>
                            <th>सम्पन्न मिति</th>
                            <th>क्रियाकलाप</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $certificate->training->name_np }}</td>
                                <td>{{ $certificate->updated_at }}</td>
                                <td>
                                    <a href="{{ route('trainee.certificate.download', $certificate->id) }}" class="btn btn-primary">
                                        <i class="bi bi-download"></i> डाउनलोड
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" style="border-radius: 8px;">कुनै प्रमाणपत्र उपलब्ध छैन।</div>
        @endif
    </div>
@endsection
