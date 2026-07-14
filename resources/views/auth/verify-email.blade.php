@extends('frontend.includes.main')

@section('content')
    <div class="container py-5">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">

                        <div class="mb-4">
                            <i class="fas fa-envelope-circle-check fa-4x text-success"></i>
                        </div>

                        <h3 class="mb-3 fw-bold">ईमेल प्रमाणिकरण आवश्यक छ</h3>

                        <p class="text-muted">
                            तपाईंले साइन अप गर्नुभएकोमा धन्यवाद! सुरु गर्नु अघि, कृपया तपाईंको ईमेल प्रमाणित गर्न
                            हामीले पठाएको लिङ्कमा क्लिक गर्नुहोस्।
                            <br>
                        </p>
                        
                        <strong class="text-danger py-3">नोट: यदि इमेल इनबक्समा (Inbox) देखिएन भने कृपया स्प्याम (Spam) बक्स
                            जाँच गर्नुहोस्।</strong>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mt-4">
                                <i class="fas fa-check-circle me-2"></i>
                                नयाँ प्रमाणिकरण लिङ्क तपाईंको ईमेलमा पठाइएको छ।
                            </div>
                        @endif

                        <div class="d-flex justify-content-center gap-3 my-4 flex-wrap">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="fas fa-paper-plane me-1"></i> पुन: लिङ्क पठाउनुहोस्
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary px-4">
                                    <i class="fas fa-sign-out-alt me-1"></i> लगआउट गर्नुहोस्
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
