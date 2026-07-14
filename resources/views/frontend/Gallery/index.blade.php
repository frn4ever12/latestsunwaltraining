@extends('frontend.includes.main')

@section('head')
    <style>
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
        }
    </style>
@endsection

@section('content')
    <div aria-label="breadcrumb" style="border-bottom: 1px solid rgb(237, 237, 237);">
        <div class="container mb-0">
            <ol class="breadcrumb  p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-main"><i class="bi bi-house-door me-2"></i>गृह पृष्ठ</a>
                </li>
                <li class="breadcrumb-item active">ग्यालेरी</li>
            </ol>
        </div>
    </div>

    <div class="container py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($galleries as $gallery)
                @if ($gallery->photos->isNotEmpty())
                    @php
                        $firstPhoto = $gallery->photos->first();
                    @endphp
                    <div class="col">
                        <div class="card border-0 shadow-sm position-relative overflow-hidden">
                            <a href="{{ route('gallery.show', $gallery->id) }}" class="text-decoration-none">
                                <div>
                                    <img src="{{ asset('files/' . $firstPhoto->photo) }}" alt="{{ $gallery->title }}"
                                        class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="py-1 fw-bold text-center m-0">{{ $gallery->title }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>


        <div class="pagination-container mt-4">
            {{ $galleries->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
