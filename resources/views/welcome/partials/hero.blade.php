<!-- Live Announcement Ticker -->
<div class="announcement-ticker mb-2 w-100" style="position: relative; z-index: 1;">
    <div class="d-flex align-items-center px-3 py-2">
        <span class="me-2 small"><i class="fas fa-bullhorn"></i> सूचना:</span>
        <div class="ticker-content flex-grow-1">
            @if(isset($notices) && $notices->count() > 0)
                @foreach($notices->take(5) as $notice)
                    <span class="mx-2 small">{{ $notice->title }}</span>
                @endforeach
            @else
                <span class="mx-2 small">नयाँ तालिमहरू आउने छन्। कृपया नियमित रूपमा हेर्नुहोस्।</span>
            @endif
        </div>
    </div>
</div>

<!-- Premium Hero Section -->
<section class="hero-section mb-3 w-100" style="position: relative; z-index: 1;">
    <div class="row align-items-center mx-0 py-3">
            <div class="col-lg-6 col-md-12 text-white mb-3 mb-lg-0 px-4" data-aos="fade-right">
                <h3 class="fw-bold mb-2">
                    {{ get_detail()->palika_name ?? 'नगरपालिका' }}
                </h3>
                <h5 class="mb-3">तालिम व्यवस्थापन प्रणाली</h5>
                <p class="small mb-3">
                    नागरिक सशक्तिकरण र सीप विकासको लागि गुणस्तरीय तालिम कार्यक्रमहरू
                </p>

                <!-- Search Box -->
                <div class="search-box mb-3">
                    <i class="fas fa-search text-muted"></i>
                    <input type="text" id="trainingSearch" placeholder="तालिम खोज्नुहोस्...">
                    <button onclick="searchTrainings()">खोज्नुहोस्</button>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <a href="{{ route('training.index') }}" class="btn btn-light btn-sm rounded-pill px-4 fw-bold">
                        <i class="fas fa-graduation-cap me-1"></i> तालिम हेर्नुहोस्
                    </a>
                    @auth
                        <a href="{{ route('training.index') }}" class="btn btn-outline-light btn-sm rounded-pill px-4 fw-bold">
                            <i class="fas fa-paper-plane me-1"></i> आवेदन गर्नुहोस्
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm rounded-pill px-4 fw-bold">
                            <i class="fas fa-sign-in-alt me-1"></i> लगइन गर्नुहोस्
                        </a>
                    @endif
                </div>

                <!-- PWA Install Button -->
                <button id="pwaInstallBtn" class="pwa-install-btn d-none" onclick="installPWA()">
                    <i class="fas fa-download"></i> एप इन्स्टल गर्नुहोस्
                </button>
            </div>

            <div class="col-lg-6 col-md-12 px-4" data-aos="fade-left">
                <!-- Banner Carousel -->
                <div id="bannerCarousel" class="carousel slide rounded-3 shadow" data-bs-ride="carousel" data-bs-interval="5000" style="height: 350px; overflow: hidden;">
                    <div class="carousel-indicators">
                        @if (\App\Models\Banner::count() > 0)
                            @foreach ($banners as $key => $banner)
                                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        @else
                            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        @endif
                    </div>

                    <div class="carousel-inner h-100">
                        @if (\App\Models\Banner::count() > 0)
                            @foreach (\App\Models\Banner::get() as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} h-100">
                                    <img src="{{ asset('files/' . $banner->image) }}"
                                        class="d-block w-100 h-100 object-fit-cover" data-bs-toggle="tooltip"
                                        data-bs-title="{{ $banner->title }}" alt="{{ $banner->title }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h6>{{ $banner->title }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active h-100">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Sunwal_Nagarpalika_Office.jpg/1200px-Sunwal_Nagarpalika_Office.jpg"
                                    class="d-block w-100 h-100 object-fit-cover"
                                    alt="Sunwal Nagarpalika"
                                    onerror="this.src='{{ asset('dist/img/logo/Government_Logo.png') }}'">
                                <div class="carousel-caption d-none d-md-block">
                                    <h6>सुनवल नगरपालिका</h6>
                                </div>
                            </div>
                        @endif
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true" style="width: 30px; height: 30px;"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true" style="width: 30px; height: 30px;"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Cards -->
<section class="mb-3">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="100">
                <div class="stats-card p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 opacity-75 small">कुल तालिम</p>
                            <h5 class="counter mb-0 fw-bold">{{ $stats['total_trainings'] ?? 0 }}</h5>
                        </div>
                        <i class="fas fa-graduation-cap icon" style="font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200">
                <div class="stats-card success p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 opacity-75 small">खुला तालिम</p>
                            <h5 class="counter mb-0 fw-bold">{{ $stats['upcoming_trainings'] ?? 0 }}</h5>
                        </div>
                        <i class="fas fa-door-open icon" style="font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="300">
                <div class="stats-card warning p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 opacity-75 small">आवेदन प्राप्त</p>
                            <h5 class="counter mb-0 fw-bold">{{ $stats['total_applications'] ?? 0 }}</h5>
                        </div>
                        <i class="fas fa-file-alt icon" style="font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                <div class="stats-card info p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 opacity-75 small">प्रमाणपत्र जारी</p>
                            <h5 class="counter mb-0 fw-bold">{{ $stats['total_certificates'] ?? 0 }}</h5>
                        </div>
                        <i class="fas fa-certificate icon" style="font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Stats Row -->
<section class="mb-3">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="premium-card dark text-center p-2">
                    <i class="fas fa-check-circle mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['approved_applications'] ?? 0 }}</h5>
                    <p class="mb-0 small">स्वीकृत</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                <div class="premium-card text-center p-2">
                    <i class="fas fa-times-circle mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['rejected_applications'] ?? 0 }}</h5>
                    <p class="mb-0 small">अस्वीकृत</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="premium-card success text-center p-2">
                    <i class="fas fa-flag-checkered mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['completed_trainings'] ?? 0 }}</h5>
                    <p class="mb-0 small">सम्पन्न</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                <div class="premium-card warning text-center p-2">
                    <i class="fas fa-chair mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['total_available_seats'] - $stats['total_applications'] ?? 0 }}</h5>
                    <p class="mb-0 small">खाली सिट</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="premium-card info text-center p-2">
                    <i class="fas fa-play-circle mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['active_trainings'] ?? 0 }}</h5>
                    <p class="mb-0 small">चलिरहेको</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <div class="premium-card dark text-center p-2">
                    <i class="fas fa-calendar-alt mb-1" style="font-size: 1.2rem;"></i>
                    <h5 class="counter mb-0 fw-bold">{{ $stats['upcoming_trainings'] ?? 0 }}</h5>
                    <p class="mb-0 small">आगामी</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Initialize CountUp animations
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    console.log('Counters found:', counters.length);
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        console.log('Counter target:', target);
        const countUp = new CountUp(counter, target, {
            duration: 2,
            useEasing: true,
            useGrouping: true
        });
        if (!countUp.error) {
            countUp.start();
        } else {
            console.log('CountUp error:', countUp.error);
            counter.textContent = target;
        }
    });
});

// Search functionality
function searchTrainings() {
    const searchTerm = document.getElementById('trainingSearch').value;
    if (searchTerm) {
        window.location.href = `{{ route('training.index') }}?search=${encodeURIComponent(searchTerm)}`;
    }
}

// PWA Install
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    const installBtn = document.getElementById('pwaInstallBtn');
    installBtn.classList.remove('d-none');
});

function installPWA() {
    if (deferredPrompt) {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('PWA installed');
            }
            deferredPrompt = null;
        });
    }
}
</script>
