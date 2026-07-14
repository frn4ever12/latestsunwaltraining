<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trainee Dashboard - Municipality Training Portal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('head')
    <style>
        /* ============================================
           ROOT VARIABLES & RESET
           ============================================ */
        :root {
            --primary-gradient: linear-gradient(135deg, #0F766E 0%, #14532D 100%);
            --secondary-gradient: linear-gradient(135deg, #10B981 0%, #059669 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 12px 48px rgba(0, 0, 0, 0.15);
            --shadow-hover: 0 16px 64px rgba(0, 0, 0, 0.2);
            --border-radius: 24px;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
            --success-color: #10B981;
            --error-color: #EF4444;
            --warning-color: #F59E0B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            overflow-x: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ============================================
           LAYOUT
           ============================================ */
        .trainee-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 100%);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: var(--transition-smooth);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .sidebar-name,
        .sidebar.collapsed .sidebar-subtitle,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .sidebar-header {
            text-align: center;
            padding: 15px 0;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.3);
        }

        .sidebar-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .sidebar-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 3px;
        }

        .sidebar-subtitle {
            font-size: 0.7rem;
            color: #a8dadc;
            font-weight: 600;
        }

        .sidebar-nav {
            flex-grow: 1;
            overflow-y: auto;
            padding-right: 5px;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            color: #e8f4f8;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition-smooth);
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            color: #EF4444;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition-smooth);
            background: #fef2f2;
        }

        .logout-btn:hover {
            background: #fee2e2;
            transform: translateX(5px);
        }

        .main-content {
            flex-grow: 1;
            margin-left: 280px;
            padding: 20px;
            transition: var(--transition-smooth);
            background: #ffffff;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Dashboard Navbar */
        .dashboard-navbar {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px 20px;
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 100%);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .sidebar-toggle {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #ffffff;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-toggle:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.05);
        }

        .sidebar-toggle i {
            font-size: 1.2rem;
        }

        .dashboard-heading {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            flex-grow: 1;
        }

        /* Profile Dropdown in Corner */
        .dashboard-navbar .dropdown {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1001;
        }

        .dashboard-navbar .dropdown-toggle {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #ffffff;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 1002;
        }

        .dashboard-navbar .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .dashboard-navbar .profile-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dashboard-navbar .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dashboard-navbar .profile-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #ffffff;
        }

        .dashboard-navbar .dropdown-menu {
            position: absolute;
            left: 100%;
            top: 0;
            margin-left: 8px;
            min-width: 180px;
            max-width: 180px;
            background: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1001;
        }

        /* Breadcrumbs */
        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .breadcrumb-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .breadcrumb-link:hover {
            color: #ffffff;
        }

        .breadcrumb-separator {
            color: rgba(255, 255, 255, 0.5);
        }

        .breadcrumb-current {
            color: #ffffff;
            font-weight: 600;
        }

        /* ============================================
           GLASSMORPHISM CARD
           ============================================ */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-medium);
            padding: 24px;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--success-color);
        }

        /* ============================================
           STATS CARDS
           ============================================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stats-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: var(--shadow-soft);
            transition: var(--transition-smooth);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stats-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .stats-info p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin: 0;
        }

        /* ============================================
           TABLE STYLES
           ============================================ */
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: var(--secondary-gradient);
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            padding: 12px 16px;
        }

        .table tbody td {
            padding: 12px 16px;
            font-size: 0.9rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f9fafb;
        }

        /* ============================================
           BADGE STYLES
           ============================================ */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background: #f0fdf4;
            color: #166534;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background: #fef2f2;
            color: #991b1b;
        }

        .badge-info {
            background: #dbeafe;
            color: #1e40af;
        }

        /* ============================================
           BUTTON STYLES
           ============================================ */
        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition-smooth);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--secondary-gradient);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--success-color);
            color: var(--success-color);
        }

        .btn-outline:hover {
            background: var(--success-color);
            color: white;
        }

        /* ============================================
           MOBILE RESPONSIVE
           ============================================ */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--secondary-gradient);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            cursor: pointer;
            box-shadow: var(--shadow-soft);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .overlay.active {
            display: block;
        }

        /* ============================================
           PROFILE CORNER DROPDOWN
           ============================================ */
        .profile-corner {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 8px 16px;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: var(--transition-smooth);
        }

        .dropdown-toggle:hover {
            background: white;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background: var(--secondary-gradient);
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .dropdown-toggle i {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            padding: 8px 0;
        }

        .dropdown-item {
            padding: 10px 16px;
            font-size: 0.85rem;
            color: var(--text-primary);
            transition: var(--transition-smooth);
        }

        .dropdown-item:hover {
            background: #F9FAFB;
        }

        .dropdown-item i {
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .dropdown-divider {
            margin: 8px 0;
            border-color: #E5E7EB;
        }

        .dropdown-item.text-danger {
            color: var(--error-color);
        }

        .dropdown-item.text-danger:hover {
            background: #FEF2F2;
        }
    </style>
</head>
<body>
    <button class="mobile-toggle" id="mobileToggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="overlay" id="overlay"></div>

    <div class="trainee-layout">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="System Logo">
                </div>
                <h3 class="sidebar-name">तालिम पोर्टल</h3>
                <p class="sidebar-subtitle">{{ $municipalityName ?? 'नगरपालिका' }}</p>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('trainee.dashboard') }}" class="nav-link {{ request()->routeIs('trainee.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2"></i>
                        <span>ड्यासबोर्ड</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.training.index') }}" class="nav-link {{ request()->routeIs('trainee.training.*') ? 'active' : '' }}">
                        <i class="bi bi-book"></i>
                        <span>खुल्ला तालिम</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.my-trainings.index') }}" class="nav-link {{ request()->routeIs('trainee.my-trainings.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-bookmark"></i>
                        <span>मेरो तालिमहरू</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.attendance.index') }}" class="nav-link {{ request()->routeIs('trainee.attendance.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>उपस्थिति</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.assessment.index') }}" class="nav-link {{ request()->routeIs('trainee.assessment.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data"></i>
                        <span>मूल्यांकन</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.certificate.index') }}" class="nav-link {{ request()->routeIs('trainee.certificate.*') ? 'active' : '' }}">
                        <i class="bi bi-award"></i>
                        <span>प्रमाणपत्र</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.notifications.index') }}" class="nav-link {{ request()->routeIs('trainee.notifications.*') ? 'active' : '' }}">
                        <i class="bi bi-bell"></i>
                        <span>सूचनाहरू</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.profile.edit') }}" class="nav-link {{ request()->routeIs('trainee.profile.*') ? 'active' : '' }}">
                        <i class="bi bi-person"></i>
                        <span>प्रोफाइल</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('trainee.feedback.index') }}" class="nav-link {{ request()->routeIs('trainee.feedback.*') ? 'active' : '' }}">
                        <i class="bi bi-chat-dots"></i>
                        <span>प्रतिक्रिया</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <!-- Small Navbar -->
            <div class="dashboard-navbar">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                
                <!-- Breadcrumbs -->
                <div class="breadcrumbs">
                    <a href="{{ route('trainee.dashboard') }}" class="breadcrumb-link">
                        <i class="bi bi-house"></i>
                    </a>
                    <span class="breadcrumb-separator">/</span>
                    <span class="breadcrumb-current">@yield('page-title', 'ड्यासबोर्ड')</span>
                </div>
                
                <!-- Profile Dropdown -->
                <div class="dropdown dropend">
                    <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-avatar">
                            @if (isset(get_detail()->logo))
                                <img src="{{ asset('files/'.get_detail()->logo) }}" alt="Profile">
                            @else
                                <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="Profile">
                            @endif
                        </div>
                        <span class="profile-name">{{ Auth::user()->name_np ?? Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('trainee.profile.edit') }}">
                                <i class="bi bi-person"></i> मेरो प्रोफाइल
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('trainee.dashboard') }}">
                                <i class="bi bi-house"></i> गृह पृष्ठ
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="#" id="logOutBtn">
                                <i class="bi bi-box-arrow-right"></i> लग आउट
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    @yield('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.getElementById('mobileToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });

            // Sidebar collapse/expand functionality
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                    
                    // Change icon based on state
                    const icon = sidebarToggle.querySelector('i');
                    if (sidebar.classList.contains('collapsed')) {
                        icon.classList.remove('bi-list');
                        icon.classList.add('bi-chevron-right');
                    } else {
                        icon.classList.remove('bi-chevron-right');
                        icon.classList.add('bi-list');
                    }
                });
            }

            // Initialize Bootstrap dropdowns
            const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
            const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl));

            // Logout functionality
            const logOutBtn = document.getElementById('logOutBtn');
            if (logOutBtn) {
                logOutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            }
        });
    </script>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
