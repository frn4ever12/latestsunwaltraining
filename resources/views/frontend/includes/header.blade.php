@include('frontend.includes.top-header')
<header class="bg-white pt-1">
    <div class="container">

        <!-- Logo and Details Section -->
        <div class="row mb-2 align-items-center">
            <!-- Left Side - Organization Info -->
            <div class="col-lg-7 col-md-7 col-sm-12">
                <a class="text-decoration-none" href="/">
                    <div class="row align-items-center">
                        <div class="col-3 col-sm-3 col-md-2 text-center my-2 my-md-0">
                            <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                                style="max-width: 75px; width: 100%;" alt="GOV Logo">
                        </div>
                        <div class="col-9 col-sm-9 col-md-10">
                            <p class="mb-1 fw-bold text-main">{{ get_detail()->palika_name ?? '' }}</p>
                            <p class="mb-1 text-danger">{{ get_detail()->palika_karyalaya ?? '' }}</p>
                            <p class="mb-1 text-danger small">
                                {{ get_detail()->address ?? '' }}, {{ get_detail()->district->name ?? '' }},
                                {{ get_detail()->province->name ?? '' }},
                                {{ get_detail()->country ?? 'नेपाल' }}
                            </p>
                            <p class="mb-0 fw-bold text-main fs-6">तालिम व्यवस्थापन प्रणाली</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right Side - Login and Logos -->
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="d-flex justify-content-end align-items-center">
                    <div>
                        @if (isset(get_detail()->logo))
                            <img src="{{ asset('files/' . get_detail()->logo) }}" class="img-fluid"
                                style="height: 10vh;" alt="Palika Logo">
                        @else
                            <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" class="img-fluid"
                                style="height: 10vh;" alt="Main Logo">
                        @endif
                    </div>
                    <div class="ms-4">
                        <img src="{{ asset('dist/img/flag/Flag_of_Nepal.gif') }}" class="img-fluid"
                            style="height: 10vh;" alt="Nepal Flag">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Responsive Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-main p-md-0 sticky-top" id="mainNavbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto justify-content-start gap-0 gap-md-4">
                <li class="nav-item">
                    <a class="nav-link text-white px-2 py-3" href="{{ route('home') }}" data-section="home">गृह पृष्ठ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white px-2 py-3" href="#" id="prakashanDropdown"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">सूचनाहरू
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="prakashanDropdown">
                        <li><a class="dropdown-item" href="{{ route('samachar.index') }}">समाचारहरू </a></li>
                        <li><a class="dropdown-item" href="{{ route('notice.index') }}">नोटिसहरू </a></li>
                        <li><a class="dropdown-item" href="{{ route('karyabidhi.index') }}">कार्यविधिहरू</a></li>
                        <li><a class="dropdown-item" href="{{ route('scheme.index') }}">स्कीमहरु </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-2 py-3" href="{{ route('training.index') }}" data-section="training">तालिमहरू</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-2 py-3" href="{{ route('gallery.index') }}" data-section="gallery">ग्यालेरी</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white px-2 py-3" href="#" id="aboutDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        हाम्रो बारेमा
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="{{ route('about.index') }}">हाम्रो बारेमा</a></li>
                        @foreach (\App\Models\AboutUs::orderBy('id', 'ASC')->select('title','id')->get() as $about)
                            <li><a class="dropdown-item" href="{{ route('about-us', $about->id) }}">{{ $about->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-2 py-3" href="{{ route('contact.index') }}" data-section="contact">सम्पर्क</a>
                </li>

            </ul>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center gap-3">
                    @auth
                        <a class="nav-link btn-nav rounded  text-main d-flex align-items-center"
                            style="padding: 7px 16px;" href="{{ route('dashboard') }}">
                            <i class="fas fa-desktop me-2"></i> ड्यासवोर्ड
                        </a>
                        <a class="nav-link btn-nav rounded  text-main d-flex align-items-center"
                            style="padding: 7px 16px;" href="#" id="logOutBtn">
                            <i class="fas fa-sign-out me-2"></i> लगआउट
                        </a>
                    @else
                        <a class="nav-link btn-nav rounded  text-main d-flex align-items-center"
                            style="padding: 7px 16px;" href="{{ route('login') }}">
                            <small><i class="fas fa-user me-2"></i> लगइन</small>
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Navbar Styles */
#mainNavbar {
    position: relative !important;
    z-index: 1000 !important;
}

#mainNavbar .nav-link {
    position: relative;
    transition: color 0.3s ease;
    cursor: pointer;
    pointer-events: auto !important;
}

#mainNavbar .nav-link:hover {
    color: #ffc107 !important;
}

#mainNavbar .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: #ffc107;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

#mainNavbar .nav-link:hover::after {
    width: 80%;
}

#mainNavbar .nav-link.active {
    color: #ffc107 !important;
}

#mainNavbar .nav-link.active::after {
    width: 80%;
}

/* Dropdown Styles */
#mainNavbar .dropdown-menu {
    border-radius: 8px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    z-index: 1001 !important;
}

#mainNavbar .dropdown-item {
    transition: background-color 0.2s ease;
    pointer-events: auto !important;
}

#mainNavbar .dropdown-item:hover {
    background-color: #0f61f0;
    color: white;
}

/* Mobile Menu */
@media (max-width: 991px) {
    #mainNavbar .navbar-collapse {
        background-color: #0f61f0;
        padding: 20px;
        border-radius: 0 0 16px 16px;
        z-index: 1001 !important;
    }
    
    #mainNavbar .nav-link {
        padding: 12px 16px !important;
        border-radius: 8px;
    }
    
    #mainNavbar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
    scroll-padding-top: 80px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu close on link click
    const navLinks = document.querySelectorAll('#navbarResponsive .nav-link');
    const navbarCollapse = document.getElementById('navbarResponsive');
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            // Close mobile menu if open
            if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
                navbarToggler.setAttribute('aria-expanded', 'false');
            }
        });
    });
    
    // Scroll Spy for active menu highlighting
    const sections = document.querySelectorAll('[id]');
    const navItems = document.querySelectorAll('#mainNavbar .nav-link[data-section]');
    
    function highlightActiveNav() {
        let scrollPosition = window.scrollY + 100;
        
        sections.forEach(function(section) {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navItems.forEach(function(navItem) {
                    navItem.classList.remove('active');
                    if (navItem.getAttribute('data-section') === sectionId) {
                        navItem.classList.add('active');
                    }
                });
            }
        });
    }
    
    // Highlight on scroll
    window.addEventListener('scroll', highlightActiveNav);
    
    // Initial highlight
    highlightActiveNav();
});
</script>

