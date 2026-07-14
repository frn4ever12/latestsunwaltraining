<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nepal Municipality Training Management Portal - Training Details">
    <title>{{ $training->name_np ?? 'तालिम विवरण' }} | सुनवल नगरपालिका</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #15803D;
            --secondary-color: #16A34A;
            --background: #F8FAFC;
            --text-primary: #1a1a1a;
            --text-secondary: #4a5568;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.16);
            --radius: 18px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', 'Noto Sans Devanagari', system-ui, -apple-system, sans-serif;
            background: var(--background);
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* ============================================
           HEADER STYLES
           ============================================ */
        .main-header {
            background: white;
            padding: 15px 0;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .main-header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-md);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 5px;
        }

        .brand-text h1 {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 10px;
            color: #4a5568;
            margin: 0;
            line-height: 1.3;
        }

        .main-nav {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .lang-switch {
            display: flex;
            gap: 5px;
        }

        .lang-btn {
            width: 35px;
            height: 35px;
            border: 1px solid var(--border-color);
            background: white;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .lang-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .btn-header {
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-login {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-login:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
        }

        .btn-register:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .menu-flag img {
            width: 40px;
            height: auto;
            margin-left: 10px;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-primary);
        }

        @media (max-width: 992px) {
            .main-nav {
                display: none;
            }
            .mobile-menu-btn {
                display: block;
            }
        }

        /* ============================================
           FOOTER STYLES
           ============================================ */
        .main-footer {
            background: #1a1a1a;
            color: white;
            padding: 60px 0 20px;
        }

        .footer-heading {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 14px;
            color: #9ca3af;
        }

        .footer-contact-item i {
            color: var(--primary-color);
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
        }

        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ============================================
           HERO SECTION
           ============================================ */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 15px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            padding: 10px 0;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 3px 10px;
            border-radius: 12px;
            color: white;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .hero-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .hero-description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 12px;
            margin-bottom: 12px;
            max-width: 400px;
        }

        .hero-stats {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .hero-stat {
            display: flex;
            align-items: center;
            gap: 4px;
            color: white;
            font-size: 11px;
        }

        .hero-stat i {
            color: #FFD700;
            font-size: 12px;
        }

        .hero-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 6px 14px;
            border-radius: 18px;
            font-weight: 600;
            font-size: 12px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-hero-primary {
            background: white;
            color: var(--primary-color);
        }

        .btn-hero-primary:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .hero-image-container {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
        }

        .countdown-card {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: white;
            padding: 10px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            min-width: 120px;
        }

        .countdown-title {
            font-size: 10px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .countdown-timer {
            font-size: 14px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .status-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: 600;
            margin-top: 4px;
        }

        .status-open {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-closed {
            background: #fee2e2;
            color: #dc2626;
        }

        /* ============================================
           HIGHLIGHTS SECTION
           ============================================ */
        .highlights-section {
            padding: 20px 0;
            background: white;
        }

        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
        }

        .highlight-card {
            background: var(--background);
            padding: 12px;
            border-radius: var(--radius);
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .highlight-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .highlight-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            color: white;
            font-size: 14px;
        }

        .highlight-label {
            font-size: 10px;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .highlight-value {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ============================================
           ABOUT SECTION
           ============================================ */
        .about-section {
            padding: 25px 0;
            background: var(--background);
        }

        .about-card {
            background: white;
            padding: 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .about-list {
            list-style: none;
            padding: 0;
        }

        .about-list li {
            padding: 6px 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
        }

        .about-list li i {
            color: var(--primary-color);
            font-size: 14px;
        }

        .about-illustration {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: var(--radius);
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 50px;
        }

        /* ============================================
           STICKY SIDEBAR
           ============================================ */
        .sticky-sidebar {
            position: sticky;
            top: 60px;
            background: white;
            padding: 15px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
        }

        .sidebar-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .sidebar-item:last-child {
            border-bottom: none;
        }

        .sidebar-label {
            color: var(--text-secondary);
            font-size: 11px;
        }

        .sidebar-value {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 12px;
        }

        .btn-apply-large {
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 13px;
            font-weight: 700;
            margin-top: 10px;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-apply-large:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ============================================
           CURRICULUM SECTION
           ============================================ */
        .curriculum-section {
            padding: 25px 0;
            background: white;
        }

        .accordion-item {
            background: var(--background);
            border: none;
            border-radius: var(--radius);
            margin-bottom: 8px;
            overflow: hidden;
        }

        .accordion-button {
            background: white;
            border: none;
            padding: 10px 15px;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 12px;
        }

        .accordion-button:not(.collapsed) {
            background: var(--primary-color);
            color: white;
        }

        .accordion-body {
            padding: 12px;
            font-size: 12px;
        }

        /* ============================================
           ELIGIBILITY SECTION
           ============================================ */
        .eligibility-section {
            padding: 25px 0;
            background: var(--background);
        }

        .checklist-card {
            background: white;
            padding: 12px;
            border-radius: var(--radius);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow-sm);
        }

        .checklist-icon {
            width: 26px;
            height: 26px;
            background: #dcfce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 12px;
        }

        /* ============================================
           DOCUMENTS SECTION
           ============================================ */
        .documents-section {
            padding: 25px 0;
            background: white;
        }

        .document-card {
            background: var(--background);
            padding: 15px;
            border-radius: var(--radius);
            text-align: center;
            transition: var(--transition);
        }

        .document-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .document-icon {
            font-size: 24px;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .document-card h5 {
            font-size: 12px;
            margin: 0;
        }

        /* ============================================
           TIMELINE SECTION
           ============================================ */
        .timeline-section {
            padding: 25px 0;
            background: var(--background);
        }

        .timeline {
            position: relative;
            padding-left: 18px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--primary-color);
        }

        .timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -22px;
            top: 0;
            width: 8px;
            height: 8px;
            background: var(--primary-color);
            border-radius: 50%;
            border: 2px solid white;
        }

        .timeline-date {
            font-size: 11px;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .timeline-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ============================================
           TRAINER SECTION
           ============================================ */
        .trainer-section {
            padding: 25px 0;
            background: white;
        }

        .trainer-card {
            background: var(--background);
            padding: 20px;
            border-radius: var(--radius);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .trainer-photo {
            width: 80px;
            height: 80px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
        }

        /* ============================================
           LOCATION SECTION
           ============================================ */
        .location-section {
            padding: 25px 0;
            background: var(--background);
        }

        .map-container {
            height: 220px;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        /* ============================================
           GALLERY SECTION
           ============================================ */
        .gallery-section {
            padding: 25px 0;
            background: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius);
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* ============================================
           FAQ SECTION
           ============================================ */
        .faq-section {
            padding: 25px 0;
            background: white;
        }

        /* ============================================
           CTA SECTION
           ============================================ */
        .cta-section {
            padding: 35px 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            text-align: center;
        }

        .cta-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        .cta-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .cta-stat {
            text-align: center;
        }

        .cta-stat-number {
            font-size: 22px;
            font-weight: 700;
            color: white;
        }

        .cta-stat-label {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 28px;
            }

            .hero-content {
                padding: 40px 0;
            }

            .hero-stats {
                flex-direction: column;
                gap: 15px;
            }

            .trainer-card {
                flex-direction: column;
                text-align: center;
            }

            .cta-stats {
                flex-direction: column;
                gap: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- STICKY HEADER -->
    <header class="main-header" id="mainHeader">
        <div class="container-custom">
            <div class="d-flex align-items-center justify-content-between">
                <div class="header-brand">
                    <div class="brand-logo">
                        <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="Municipality Logo">
                    </div>
                    <div class="brand-text">
                        <h1>सुनवल नगरपालिका</h1>
                        <p>नवलपरासी (बर्दघाट सुस्ता पूर्व)</p>
                        <p>तालिम व्यवस्थापन प्रणाली</p>
                    </div>
                </div>

                <nav class="main-nav" id="mainNav">
                    <a href="{{ route('home') }}" class="nav-link">गृह</a>
                    <a href="{{ route('about.index') }}" class="nav-link">बारेमा</a>
                    <a href="{{ route('training.index') }}" class="nav-link active">तालिम</a>
                    <a href="{{ route('samachar.index') }}" class="nav-link">समाचार</a>
                    <a href="{{ route('notice.index') }}" class="nav-link">सूचना</a>
                    <a href="{{ route('contact.index') }}" class="nav-link">सम्पर्क</a>
                </nav>

                <div class="header-actions">
                    <div class="lang-switch">
                        <button class="lang-btn active">ने</button>
                        <button class="lang-btn">En</button>
                    </div>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-header btn-login">ड्यासबोर्ड</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-header btn-login">लगइन</a>
                        <a href="{{ route('register') }}" class="btn-header btn-register">दर्ता</a>
                    @endauth
                    <div class="menu-flag">
                        <img src="https://giwmscdnone.gov.np/static/grapejs/img/Nepal-flag.gif" alt="Nepal Flag">
                    </div>
                </div>

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container-custom">
            <div class="row hero-content align-items-center">
                <div class="col-lg-7">
                    <span class="hero-badge">
                        <i class="bi bi-book me-2"></i>
                        {{ $training->category->name_np ?? 'तालिम' }}
                    </span>
                    <h1 class="hero-title">{{ $training->name_np ?? 'तालिम' }}</h1>
                    <p class="hero-description">
                        {{ Str::limit(strip_tags($training->description ?? ''), 200) }}
                    </p>
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <i class="bi bi-star-fill"></i>
                            <span>4.8 (125 समीक्षा)</span>
                        </div>
                        <div class="hero-stat">
                            <i class="bi bi-people"></i>
                            <span>{{ $training->training_applications_count ?? 0 }} आवेदक</span>
                        </div>
                        <div class="hero-stat">
                            <i class="bi bi-clock"></i>
                            <span>
                                @if($training->start_miti_bs && $training->end_miti_bs)
                                    {{ \Carbon\Carbon::parse($training->start_miti_bs)->diffInDays(\Carbon\Carbon::parse($training->end_miti_bs)) }} दिन
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        @if (auth()->check() && auth()->user()->hasAppliedToTraining($training->id))
                            <a href="{{ route('admin.application.index') }}" class="btn-hero btn-hero-primary">
                                <i class="bi bi-check-circle me-2"></i>आवेदन दिइसक्नुभएको छ
                            </a>
                        @else
                            @if ($training->status === 'upcoming' && $training->training_applications_count < $training->available_seats)
                                <a href="{{ route('training-application.index', $training->id) }}" class="btn-hero btn-hero-primary">
                                    <i class="bi bi-send me-2"></i>आवेदन दिनुहोस्
                                </a>
                            @else
                                <button class="btn-hero btn-hero-secondary" disabled>
                                    <i class="bi bi-x-circle me-2"></i>सिट भरिएको छ
                                </button>
                            @endif
                        @endif
                        @if ($training->document)
                            <a href="{{ asset('files/' . $training->document) }}" target="_blank" class="btn-hero btn-hero-secondary">
                                <i class="bi bi-download me-2"></i>ब्रोशर डाउनलोड
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-container">
                        <img src="{{ asset('dist/img/training.png') }}" alt="Training" class="hero-image">
                        <div class="countdown-card">
                            <div class="countdown-title">आवेदन समाप्ति</div>
                            <div class="countdown-timer">
                                {{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_deadline_miti_bs ?? 'N/A') }}
                            </div>
                            <span class="status-badge {{ $training->status === 'upcoming' ? 'status-open' : 'status-closed' }}">
                                {{ $training->status === 'upcoming' ? 'खुला छ' : 'बन्द छ' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HIGHLIGHTS SECTION -->
    <section class="highlights-section">
        <div class="container-custom">
            <div class="highlights-grid">
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-folder"></i>
                    </div>
                    <div class="highlight-label">श्रेणी</div>
                    <div class="highlight-value">{{ $training->category->name_np ?? '-' }}</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div class="highlight-label">अवधि</div>
                    <div class="highlight-value">
                        @if($training->start_miti_bs && $training->end_miti_bs)
                            {{ \Carbon\Carbon::parse($training->start_miti_bs)->diffInDays(\Carbon\Carbon::parse($training->end_miti_bs)) }} दिन
                        @else
                            N/A
                        @endif
                    </div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>
                    <div class="highlight-label">स्तर</div>
                    <div class="highlight-value">मध्यम</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-translate"></i>
                    </div>
                    <div class="highlight-label">भाषा</div>
                    <div class="highlight-value">नेपाली</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <div class="highlight-label">मोड</div>
                    <div class="highlight-value">अनलाइन</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="highlight-label">प्रमाणपत्र</div>
                    <div class="highlight-value">उपलब्ध</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-cash"></i>
                    </div>
                    <div class="highlight-label">शुल्क</div>
                    <div class="highlight-value">{{ $training->training_cost ?? 'निःशुल्क' }}</div>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="highlight-label">रोजगारी समर्थन</div>
                    <div class="highlight-value">उपलब्ध</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-card">
                        <h2 class="section-title">तालिमको बारेमा</h2>
                        <ul class="about-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>यो तालिमले तपाईंलाई व्यावसायिक सीपहरू सिकाउँछ</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>व्यावहारिक अनुभव प्राप्पति</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>प्रमाणपत्र प्रदान</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>रोजगारीको अवसमर्थन</span>
                            </li>
                        </ul>
                        <div style="margin-top: 30px;">
                            <h4 style="margin-bottom: 15px;">तालिमको विवरण</h4>
                            <div style="color: var(--text-secondary); white-space: pre-line;">
                                {!! $training->description ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-illustration">
                        <i class="bi bi-laptop"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT WITH SIDEBAR -->
    <section style="padding: 80px 0; background: var(--background);">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-8">
                    <!-- CURRICULUM SECTION -->
                    <div class="about-card" style="margin-bottom: 40px;">
                        <h2 class="section-title">पाठ्यक्रम</h2>
                        <div class="accordion" id="curriculumAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#module1">
                                        <i class="bi bi-book me-2"></i>मोड्युल १: परिचय
                                    </button>
                                </h2>
                                <div id="module1" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        <p>तालिमको मूल अवधारणा र महत्त्व</p>
                                        <ul>
                                            <li>परिचय</li>
                                            <li>उद्देश्यहरू</li>
                                            <li>अपेक्षित परिणामहरू</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                                        <i class="bi bi-book me-2"></i>मोड्युल २: मूल सिपहरू
                                    </button>
                                </h2>
                                <div id="module2" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        <p>आधारभूत सिपहरू विकास</p>
                                        <ul>
                                            <li>सिप पहिचान</li>
                                            <li>विकास रणनीति</li>
                                            <li>अभ्यास</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module3">
                                        <i class="bi bi-book me-2"></i>मोड्युल ३: व्यावहारिक अनुभव
                                    </button>
                                </h2>
                                <div id="module3" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        <p>व्यावहारिक परियोजनाहरू</p>
                                        <ul>
                                            <li>केस अध्ययन</li>
                                            <li>समूह कार्य</li>
                                            <li>प्रस्तुतिकरण</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ELIGIBILITY SECTION -->
                    <div class="about-card" style="margin-bottom: 40px;">
                        <h2 class="section-title">पात्रता</h2>
                        <div class="checklist-card">
                            <div class="checklist-icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <div>
                                <strong>न्यूनतम उमेर</strong>
                                <p style="margin: 0; color: var(--text-secondary);">१८ वर्ष</p>
                            </div>
                        </div>
                        <div class="checklist-card">
                            <div class="checklist-icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <div>
                                <strong>शिक्षा</strong>
                                <p style="margin: 0; color: var(--text-secondary);">SLC/SEE उत्तीर्ण</p>
                            </div>
                        </div>
                        <div class="checklist-card">
                            <div class="checklist-icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <div>
                                <strong>नगरपालिका निवासी</strong>
                                <p style="margin: 0; color: var(--text-secondary);">सुनवल नगरपालिका</p>
                            </div>
                        </div>
                    </div>

                    <!-- DOCUMENTS SECTION -->
                    <div class="about-card" style="margin-bottom: 40px;">
                        <h2 class="section-title">आवश्यक कागजातहरू</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="document-card">
                                    <div class="document-icon">
                                        <i class="bi bi-person-badge"></i>
                                    </div>
                                    <h5>नागरिकता</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="document-card">
                                    <div class="document-icon">
                                        <i class="bi bi-image"></i>
                                    </div>
                                    <h5>तस्बीर</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="document-card">
                                    <div class="document-icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <h5>शैक्षिक प्रमाणपत्र</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIMELINE SECTION -->
                    <div class="about-card">
                        <h2 class="section-title">तालिम समयरेखा</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-date">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_start_miti_bs ?? 'N/A') }}</div>
                                <div class="timeline-title">आवेदन सुरु</div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-date">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_deadline_miti_bs ?? 'N/A') }}</div>
                                <div class="timeline-title">आवेदन समाप्ति</div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-date">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->start_miti_bs ?? 'N/A') }}</div>
                                <div class="timeline-title">तालिम सुरु</div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-date">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->end_miti_bs ?? 'N/A') }}</div>
                                <div class="timeline-title">तालिम समाप्ति</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- STICKY SIDEBAR -->
                    <div class="sticky-sidebar">
                        <h3 style="margin-bottom: 25px;">तालिम सारांश</h3>
                        <div class="sidebar-item">
                            <span class="sidebar-label">अवधि</span>
                            <span class="sidebar-value">
                                @if($training->start_miti_bs && $training->end_miti_bs)
                                    {{ \Carbon\Carbon::parse($training->start_miti_bs)->diffInDays(\Carbon\Carbon::parse($training->end_miti_bs)) }} दिन
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">श्रेणी</span>
                            <span class="sidebar-value">{{ $training->category->name_np ?? '-' }}</span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">स्थान</span>
                            <span class="sidebar-value">तिलोत्तमा नगरपालिका</span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">बाँकी सिट</span>
                            <span class="sidebar-value">{{ $training->available_seats - ($training->training_applications_count ?? 0) }}</span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">शुल्क</span>
                            <span class="sidebar-value">{{ $training->training_cost ?? 'निःशुल्क' }}</span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">समाप्ति मिति</span>
                            <span class="sidebar-value">{{ \App\Helpers\NumberHelper::toNepaliNumber($training->application_deadline_miti_bs) }}</span>
                        </div>
                        <div class="sidebar-item">
                            <span class="sidebar-label">स्थिति</span>
                            <span class="sidebar-value" style="color: {{ $training->status === 'upcoming' ? '#16a34a' : '#dc2626' }};">
                                {{ $training->status === 'upcoming' ? 'खुला छ' : 'बन्द छ' }}
                            </span>
                        </div>
                        @if (auth()->check() && auth()->user()->hasAppliedToTraining($training->id))
                            <a href="{{ route('admin.application.index') }}" class="btn-apply-large">
                                <i class="bi bi-check-circle me-2"></i>आवेदन दिइसक्नुभएको छ
                            </a>
                        @else
                            @if ($training->status === 'upcoming' && $training->training_applications_count < $training->available_seats)
                                <a href="{{ route('training-application.index', $training->id) }}" class="btn-apply-large">
                                    <i class="bi bi-send me-2"></i>आवेदन दिनुहोस्
                                </a>
                            @else
                                <button class="btn-apply-large" disabled style="background: #9ca3af;">
                                    <i class="bi bi-x-circle me-2"></i>सिट भरिएको छ
                                </button>
                            @endif
                        @endif
                        @if ($training->document)
                            <a href="{{ asset('files/' . $training->document) }}" target="_blank" class="btn-apply-large" style="background: white; color: var(--primary-color); border: 2px solid var(--primary-color); margin-top: 15px;">
                                <i class="bi bi-download me-2"></i>PDF डाउनलोड
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRAINER SECTION -->
    <section class="trainer-section">
        <div class="container-custom">
            <h2 class="section-title text-center" style="margin-bottom: 40px;">प्रशिक्षक प्रोफाइल</h2>
            <div class="trainer-card">
                <div class="trainer-photo">
                    <i class="bi bi-person"></i>
                </div>
                <div>
                    <h3 style="margin-bottom: 10px;">{{ $training->trainer_name_np ?? 'प्रशिक्षक' }}</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 15px;">वरिष्ठ प्रशिक्षक</p>
                    <p style="color: var(--text-secondary);">
                        यो प्रशिक्षकले विभिन्न तालिमहरू दिइसकेका छन् र उनीहरूसँग धेरै वर्षको अनुभव छ।
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LOCATION SECTION -->
    <section class="location-section">
        <div class="container-custom">
            <h2 class="section-title" style="margin-bottom: 40px;">स्थान</h2>
            <div class="map-container">
                {!! $training->training_location !!}
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="gallery-section">
        <div class="container-custom">
            <h2 class="section-title text-center" style="margin-bottom: 40px;">तालिम ग्यालरी</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ asset('dist/img/training.png') }}" alt="Training 1">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('dist/img/training.png') }}" alt="Training 2">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('dist/img/training.png') }}" alt="Training 3">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('dist/img/training.png') }}" alt="Training 4">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <div class="container-custom">
            <h2 class="section-title text-center" style="margin-bottom: 40px;">बारम्बार सोधिने प्रश्नहरू</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            तालिममा भाग लिन के आवश्यक छ?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            तालिममा भाग लिन न्यूनतम १८ वर्षको उमेर, SLC/SEE उत्तीर्ण, र नगरपालिकाको निवासी हुनुपर्छ।
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            तालिम निःशुल्क छ?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            हो, यो तालिम निःशुल्क छ। तालिम सम्पूर्ण खर्च नगरपालिकाले वहन गर्नेछ।
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            प्रमाणपत्र प्राप्त हुन्छ?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            हो, तालिम सफलतापूर्वक पूरा गरेपछि प्रमाणपत्र प्रदान गरिनेछ।
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container-custom">
            <h1 class="cta-title">सीप सिकौं, भविष्य बनाऔं</h1>
            <div class="cta-stats">
                <div class="cta-stat">
                    <div class="cta-stat-number">2500+</div>
                    <div class="cta-stat-label">आवेदकहरू</div>
                </div>
                <div class="cta-stat">
                    <div class="cta-stat-number">100+</div>
                    <div class="cta-stat-label">तालिमहरू</div>
                </div>
                <div class="cta-stat">
                    <div class="cta-stat-number">95%</div>
                    <div class="cta-stat-label">सफलता दर</div>
                </div>
            </div>
            @if (auth()->check() && auth()->user()->hasAppliedToTraining($training->id))
                <a href="{{ route('admin.application.index') }}" class="btn-hero btn-hero-primary" style="font-size: 20px; padding: 18px 48px;">
                    <i class="bi bi-check-circle me-2"></i>आवेदन दिइसक्नुभएको छ
                </a>
            @else
                @if ($training->status === 'upcoming' && $training->training_applications_count < $training->available_seats)
                    <a href="{{ route('training-application.index', $training->id) }}" class="btn-hero btn-hero-primary" style="font-size: 20px; padding: 18px 48px;">
                        <i class="bi bi-send me-2"></i>आवेदन दिनुहोस्
                    </a>
                @else
                    <button class="btn-hero btn-hero-secondary" disabled style="font-size: 20px; padding: 18px 48px;">
                        <i class="bi bi-x-circle me-2"></i>सिट भरिएको छ
                    </button>
                @endif
            @endif
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-heading">सुनवल नगरपालिका</div>
                    <p style="color: #9ca3af; font-size: 14px; line-height: 1.6;">
                        सुनवल नगरपालिकाले नागरिकहरूलाई गुणस्तरीय सेवा प्रदान गर्न र सीप विकास तालिमहरू सञ्चालन गर्न प्रतिबद्ध छ।
                    </p>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">द्रुत सम्पर्क</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">गृह पृष्ठ</a></li>
                        <li><a href="{{ route('about.index') }}">हाम्रो बारेमा</a></li>
                        <li><a href="{{ route('training.index') }}">तालिमहरू</a></li>
                        <li><a href="{{ route('contact.index') }}">सम्पर्क</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">सेवाहरू</h5>
                    <ul class="footer-links">
                        <li><a href="#">तालिम आवेदन</a></li>
                        <li><a href="#">प्रमाणपत्र</a></li>
                        <li><a href="#">सूचना</a></li>
                        <li><a href="#">समाचार</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">महत्त्वपूर्ण</h5>
                    <ul class="footer-links">
                        <li><a href="#">गोपनीयता नीति</a></li>
                        <li><a href="#">सेवा सर्तहरू</a></li>
                        <li><a href="#">प्रयोग सर्तहरू</a></li>
                        <li><a href="#">सर्तहरू</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="footer-heading">सम्पर्क</h5>
                    <div class="footer-contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>सुनवल नगरपालिका</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-telephone"></i>
                        <span>+९७७-०१-४xxxxxxx</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="bi bi-envelope"></i>
                        <span>info@sunwal.gov.np</span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© २०२६ सुनवल नगरपालिका। सर्वाधिकार सुरक्षित।</p>
            </div>
        </div>
    </footer>

    <script>
        // Sticky Header
        const header = document.getElementById('mainHeader');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');

        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-list');
            icon.classList.toggle('bi-x');
        });

        // Language Switch
        const langBtns = document.querySelectorAll('.lang-btn');
        langBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                langBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
