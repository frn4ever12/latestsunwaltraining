<!-- Latest Notices Section -->
<section class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">
                <i class="fas fa-bell text-primary me-2"></i>
                नवीनतम सूचनाहरू
            </h2>
            <a href="{{ route('notice.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                सबै हेर्नुहोस् <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @if(isset($notices) && $notices->count() > 0)
                @foreach($notices->take(6) as $notice)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="notice-card {{ $notice->is_urgent ? 'urgent' : ($notice->is_important ? 'important' : '') }}">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge 
                                    @if($notice->is_urgent) bg-danger 
                                    @elseif($notice->is_important) bg-warning 
                                    @else bg-primary @endif">
                                    @if($notice->is_urgent) जरुरी 
                                    @elseif($notice->is_important) महत्त्वपूर्ण 
                                    @else सामान्य @endif
                                </span>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($notice->created_at)->format('Y-m-d') }}
                                </small>
                            </div>
                            
                            <h5 class="fw-bold mb-2">{{ $notice->title }}</h5>
                            <p class="text-muted small mb-3">
                                {{ Str::limit($notice->description, 100) }}
                            </p>
                            
                            <div class="d-flex gap-2">
                                @if($notice->file)
                                    <a href="{{ asset('files/' . $notice->file) }}" download class="btn btn-sm btn-outline-primary flex-grow-1">
                                        <i class="fas fa-file-pdf me-1"></i> PDF डाउनलोड
                                    </a>
                                @endif
                                <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-sm btn-primary flex-grow-1">
                                    <i class="fas fa-eye me-1"></i> विवरण
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fas fa-bell-slash fa-4x text-muted mb-3"></i>
                    <p class="text-muted">हाल कुनै सूचना छैन।</p>
                </div>
            @endif
        </div>
    </div>
</section>
