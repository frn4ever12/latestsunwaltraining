@extends('frontend.includes.main')

@section('content')

    <div aria-label="breadcrumb" style="border-bottom: 1px solid rgb(237, 237, 237);">
        <div class="container mb-0">
            <ol class="breadcrumb  p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-main"><i class="bi bi-house-door me-2"></i>गृह पृष्ठ</a></li>
                <li class="breadcrumb-item active">हाम्रो बारेमा</li>
            </ol>
        </div>
    </div>

    <div class="container py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($abouts as $about)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $about->title }}</b></h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit(strip_tags($about->description), 150, '...') !!}
                            </p>
                            <a href="{{ route('about-us', $about->id) }}" class="btn btn-main">थप पढ्नुहोस्</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
