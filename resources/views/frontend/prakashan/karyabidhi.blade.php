@extends('frontend.includes.main')
@section('content')
<div aria-label="breadcrumb" style="border-bottom: 1px solid rgb(237, 237, 237);">
    <div class="container mb-0">
        <ol class="breadcrumb  p-2 mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-main"><i class="bi bi-house-door me-2"></i>गृह पृष्ठ</a>
            </li>
            <li class="breadcrumb-item active">कार्यविधिहरू</li>
        </ol>
    </div>
</div>
<div class="container my-3">
    <div class="card">
        <div class="card-header bg-white pt-3">
            <h5 class="fw-bold">कार्यविधिहरु</h5>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered  align-middle">
                    <thead>
                        <tr>
                            <th>क्र.सं.</th>
                            <th>नेपाली शीर्षक</th>
                            <th>सिर्जना मिति</th>
                            <th>कागजात</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>{{ \App\Helpers\NumberHelper::toNepaliNumber($loop->iteration) }}</td>
                                <td>{{ $data->title_np ?? '' }}</td>
                                <td>{{ $data->miti_bs ?? '' }}</td>
                                <td>
                                    @if (isset($data->document))
                                        <a target="_blank" href="{{ asset('files/' . $data->document) }}" class="btn btn-main btn-sm"><i
                                                class="fa fa-download me-2"></i> डाउनलोड</a>
                                </td>
                        @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">डाटा उपलब्ध छैन</td>

                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="pagination-container mt-4">
                    {{ $datas->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
