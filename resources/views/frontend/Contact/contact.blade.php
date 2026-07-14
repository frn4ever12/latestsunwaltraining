@extends('frontend.includes.main')

@section('content')
    <div aria-label="breadcrumb" style="border-bottom: 1px solid rgb(237, 237, 237);">
        <div class="container mb-0">
            <ol class="breadcrumb  p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-main"><i class="bi bi-house-door me-2"></i>गृह पृष्ठ</a></li>
                <li class="breadcrumb-item active">सम्पर्क</li>
            </ol>
        </div>
    </div>

    <div class="container py-4">
        <div class="row g-4 align-items-stretch">
            <div class="col-md-7 col-sm-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="text-center text-main fw-bold mb-2">{{ get_detail()->palika_name??'' }}</h4>
                        <h5 class="text-center text-main fw-bold mb-2">तालिम व्यवस्थापन प्रणाली</h5>
                        <p class="text-center mb-2 small">
                            {{ get_detail()->address??'' }} ,{{ get_detail()->district->name??'' }} <br>
                            फोन : {{ get_detail()->contact_no ?? '' }} <br>
                            ईमेल : <a href="mailto:bpc.pokharametro@gmail.com">{{ get_detail()->email??'' }}</a>
                        </p>

                        <div class="alert alert-warning small" role="alert">
                            कृपया सबै जानकारी साँचो र स्पष्ट रुपमा भर्नुहोस्।
                        </div>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label">पुरा नाम</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label">ईमेल</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">फोन नम्बर</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">विषय</label>
                                <input type="text" name="subject"
                                    class="form-control @error('subject') is-invalid @enderror" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">सन्देश</label>
                                <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required></textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-main">पठाउनुहोस् <i class="fa fa-arrow-right ms-2"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="py-2 mb-0 fw-bold">नक्सा स्थान</h5>
                    </div>
                    <div class="card-body">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113134.01035906012!2d83.4002154624792!3d27.610953736263305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399684eb49a8f1cd%3A0xfb7edf463d27b301!2z4KSk4KS_4KSy4KWL4KSk4KWN4KSk4KSu4KS-!5e0!3m2!1sne!2snp!4v1744781818500!5m2!1sne!2snp"
                            style="border:0;width:100%; height: 100vh;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </iframe>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
@endsection
