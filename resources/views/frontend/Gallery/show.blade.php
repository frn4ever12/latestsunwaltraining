@extends('frontend.includes.main')

@section('content')
    <div class="container py-4">
        <div>
            <h2 class="fw-bold">{{ $gallery->title }}</h2>
            <div class="py-4 row g-3">
                @foreach ($gallery->photos as $photo)
                    <div class="mb-4 col-lg-3 col-md-4 col-sm-12">
                        <div class="gallery-item">
                            <a href="{{ asset('files/' . $photo->photo) }}" >
                                <img src="{{ asset('files/' . $photo->photo) }}" alt="Gallery Image" class="img-fluid" style="max-height: 200px;">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
