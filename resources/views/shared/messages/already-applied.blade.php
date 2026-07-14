@extends('admin.includes.main')
@section('content')
    <div class="card d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png" alt="Already Applied" class="img-fluid mb-4"
            style="max-width: 120px;">

        <h2 class="text-primary mb-3">पहिले नै आवेदन गरिएको!</h2>
        <p class="lead">तपाईंले यस तालिम कार्यक्रमको लागि पहिले नै आवेदन गर्नुभएको छ।</p>
        <p>तपाईं एउटै तालिमको लागि एक भन्दा बढी आवेदन गर्न सक्नुहुन्न।</p>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-primary me-2"><i class="fas fa-arrow-left me-2"></i> फर्कनुहोस्</a>
            <a href="{{ route('admin.training.index') }}" class="btn btn-danger">ड्यासबोर्डमा जानुहोस्</a>
        </div>
    </div>
@endsection
