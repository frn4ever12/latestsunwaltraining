<!DOCTYPE html>
<html lang="en">

<head>
   @include('admin.includes.top')
   @yield('head')
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300&display=swap" rel="stylesheet">
   <style>
       body {
           font-family: 'Noto Sans Devanagari', sans-serif;
           background-color: rgb(255, 255, 255);
       }

       .main-panel {
           background: #ffffff;
           min-height: 100vh;
       }

       /* Hide Kaiadmin default profile sections */
       .sidebar .user-profile,
       .navbar .navbar-nav .topbar-user,
       .main-header .navbar-header .navbar-nav .topbar-user {
           display: none !important;
       }

       /* Hide Kaiadmin header to prevent overlap */
       .main-header {
           display: none !important;
       }

       /* Ensure admin profile dropdown is visible */
       .admin-profile-corner {
           display: block !important;
           position: fixed;
           top: 20px;
           right: 20px;
           z-index: 99999;
       }

       /* Bootstrap 5 Profile Dropdown Styles */
       .admin-profile-corner .btn-profile {
           background: white;
           border: 1px solid #E5E7EB;
           border-radius: 8px;
           padding: 8px 16px;
           display: flex;
           align-items: center;
           gap: 10px;
           cursor: pointer;
           transition: all 0.3s ease;
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
       }

       .admin-profile-corner .btn-profile:hover {
           background: #F9FAFB;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
       }

       .admin-profile-corner .profile-avatar img {
           width: 32px;
           height: 32px;
           border-radius: 50%;
           object-fit: cover;
       }

       .admin-profile-corner .profile-name {
           font-weight: 500;
           color: #1F2937;
           font-size: 0.9rem;
       }

       .admin-profile-corner .dropdown-menu {
           margin-top: 8px;
           border: 1px solid #E5E7EB;
           border-radius: 8px;
           box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
           animation: dropdownSlide 0.2s ease-out;
           z-index: 99999;
           min-width: 200px;
       }

       @keyframes dropdownSlide {
           from {
               opacity: 0;
               transform: translateY(-10px);
           }
           to {
               opacity: 1;
               transform: translateY(0);
           }
       }

       .admin-profile-corner .dropdown-item {
           padding: 10px 16px;
           font-size: 0.9rem;
           color: #1F2937;
           transition: all 0.2s ease;
           display: flex;
           align-items: center;
           gap: 10px;
       }

       .admin-profile-corner .dropdown-item:hover {
           background: #F9FAFB;
           color: #16A34A;
       }

       .admin-profile-corner .dropdown-item i {
           font-size: 1rem;
           width: 20px;
           text-align: center;
       }

       .admin-profile-corner .dropdown-item.text-danger:hover {
           background: #FEF2F2;
           color: #EF4444;
       }

       /* Fix sidebar logo alignment */
       .sidebar .logo-header {
           padding: 20px;
           display: flex;
           align-items: center;
           justify-content: center;
       }

       .sidebar .logo-header a {
           display: flex;
           align-items: center;
           gap: 12px;
           text-decoration: none;
       }

       .sidebar .logo-header a img {
           width: 45px;
           height: 45px;
           object-fit: contain;
       }

       .sidebar .logo-header .text-white {
           font-size: 1.1rem;
           font-weight: 600;
           white-space: nowrap;
       }

       /* Fix main panel spacing */
       .main-panel {
           padding-top: 0;
       }

       .main-panel .container {
           padding: 24px;
       }

       .main-panel .page-inner {
           padding: 0;
       }

       /* ============================================
          ADMIN PROFILE CORNER DROPDOWN
          ============================================ */
       .admin-profile-corner {
           position: fixed;
           top: 15px;
           right: 30px;
           z-index: 99999;
       }

       .admin-profile-corner .dropdown-toggle {
           display: flex;
           align-items: center;
           gap: 10px;
           background: rgba(255, 255, 255, 0.95);
           backdrop-filter: blur(10px);
           border: 1px solid rgba(255, 255, 255, 0.3);
           border-radius: 12px;
           padding: 10px 18px;
           cursor: pointer;
           box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
           transition: all 0.3s ease;
           min-height: 50px;
       }

       .admin-profile-corner .dropdown-toggle:hover {
           background: white;
           box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
           transform: translateY(-2px);
       }

       .admin-profile-corner .profile-avatar {
           width: 40px;
           height: 40px;
           border-radius: 50%;
           overflow: hidden;
           background: linear-gradient(135deg, #10B981 0%, #059669 100%);
           flex-shrink: 0;
       }

       .admin-profile-corner .profile-avatar img {
           width: 100%;
           height: 100%;
           object-fit: cover;
       }

       .admin-profile-corner .profile-name {
           font-size: 0.9rem;
           font-weight: 600;
           color: #1F2937;
           line-height: 1.2;
       }

       .admin-profile-corner .dropdown-toggle i {
           font-size: 0.85rem;
           color: #6B7280;
           flex-shrink: 0;
       }

       .admin-profile-corner .dropdown-menu {
           position: absolute;
           right: 0;
           top: calc(100% + 10px);
           background: white;
           border: 1px solid #E5E7EB;
           border-radius: 12px;
           box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
           min-width: 220px;
           padding: 8px 0;
           z-index: 10001;
       }

       .admin-profile-corner .dropdown-item {
           padding: 12px 18px;
           font-size: 0.9rem;
           color: #1F2937;
           transition: all 0.3s ease;
           display: flex;
           align-items: center;
           gap: 10px;
       }

       .admin-profile-corner .dropdown-item:hover {
           background: #F9FAFB;
       }

       .admin-profile-corner .dropdown-item i {
           font-size: 1rem;
           width: 20px;
       }

       .admin-profile-corner .dropdown-divider {
           margin: 8px 0;
           border-color: #E5E7EB;
       }

       .admin-profile-corner .dropdown-item.text-danger {
           color: #EF4444;
       }

       .admin-profile-corner .dropdown-item.text-danger:hover {
           background: #FEF2F2;
       }

       /* Responsive Design */
       @media (max-width: 992px) {
           .admin-profile-corner {
               top: 10px;
               right: 15px;
           }

           .admin-profile-corner .dropdown-toggle {
               padding: 8px 14px;
               min-height: 45px;
           }

           .admin-profile-corner .profile-avatar {
               width: 35px;
               height: 35px;
           }

           .admin-profile-corner .profile-name {
               font-size: 0.85rem;
           }

           .main-panel {
               padding-top: 70px;
           }

           .main-panel .container {
               padding: 0 16px;
           }
       }

       @media (max-width: 768px) {
           .admin-profile-corner {
               top: 8px;
               right: 10px;
           }

           .admin-profile-corner .dropdown-toggle {
               padding: 6px 12px;
               min-height: 40px;
           }

           .admin-profile-corner .profile-name {
               display: none;
           }

           .admin-profile-corner .profile-avatar {
               width: 32px;
               height: 32px;
           }

           .main-panel {
               padding-top: 60px;
           }

           .main-panel .container {
               padding: 0 12px;
           }

           .main-panel .page-inner {
               padding: 16px 0;
           }
       }

       @media (max-width: 576px) {
           .sidebar .logo-header {
               padding: 15px;
           }

           .sidebar .logo-header a img {
               width: 40px;
               height: 40px;
           }

           .sidebar .logo-header .text-white {
               font-size: 1rem;
           }
       }
   </style>
</head>

<body>
    <div class="wrapper">
        @include('admin.includes.sidebar')

        <div class="main-panel">
            @include('admin.includes.header')

            <!-- Profile Dropdown in Corner -->
            @if(auth()->check())
            <div class="admin-profile-corner">
                <div class="dropdown">
                    <button class="dropdown-toggle btn-profile" type="button" id="profileDropdownBtn" aria-expanded="false">
                        <div class="profile-avatar">
                            <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="Profile">
                        </div>
                        <span class="profile-name">{{ Auth::user()->name_np ?? Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdownBtn" id="profileDropdownMenu">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person"></i> मेरो प्रोफाइल
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i> लग आउट
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endif

            <div class="container">
                <div class="mt-4 page-inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast Container -->
    <div class="toast-container-admin" id="toastContainerAdmin"></div>
    
    @include('admin.includes.bottom')
    @yield('scripts')
    <script>
        // Custom Profile Dropdown Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const profileDropdownBtn = document.getElementById('profileDropdownBtn');
            const profileDropdownMenu = document.getElementById('profileDropdownMenu');

            if (profileDropdownBtn && profileDropdownMenu) {
                profileDropdownBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    profileDropdownMenu.classList.toggle('show');
                    const isExpanded = profileDropdownBtn.getAttribute('aria-expanded') === 'true';
                    profileDropdownBtn.setAttribute('aria-expanded', !isExpanded);
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!profileDropdownBtn.contains(e.target) && !profileDropdownMenu.contains(e.target)) {
                        profileDropdownMenu.classList.remove('show');
                        profileDropdownBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Close dropdown on ESC key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && profileDropdownMenu.classList.contains('show')) {
                        profileDropdownMenu.classList.remove('show');
                        profileDropdownBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });

        // Toast Notification System for Admin
        function showToastAdmin(message, type = 'success') {
            const container = document.getElementById('toastContainerAdmin');
            const toast = document.createElement('div');
            toast.className = 'toast-admin';
            
            const icons = {
                success: 'fa-check-circle text-success',
                error: 'fa-times-circle text-danger',
                warning: 'fa-exclamation-circle text-warning',
                info: 'fa-info-circle text-primary'
            };
            
            const bgColors = {
                success: 'bg-success',
                error: 'bg-danger',
                warning: 'bg-warning',
                info: 'bg-primary'
            };
            
            toast.innerHTML = `
                <div class="toast-admin-content ${bgColors[type]}">
                    <i class="fas ${icons[type]} fa-2x"></i>
                    <div class="toast-admin-message">
                        <h6 class="mb-0 fw-bold text-white">${type.charAt(0).toUpperCase() + type.slice(1)}</h6>
                        <p class="mb-0 small text-white">${message}</p>
                    </div>
                    <button class="toast-admin-close" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(toast);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease forwards';
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        // Show success message on form submissions
        @if(session('success'))
            showToastAdmin('{{ session('success') }}', 'success');
        @endif

        // Show error message on form submissions
        @if(session('error'))
            showToastAdmin('{{ session('error') }}', 'error');
        @endif
    </script>
    
    <style>
        .toast-container-admin {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast-admin {
            animation: slideIn 0.3s ease;
        }

        .toast-admin-content {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            min-width: 300px;
            color: white;
        }

        .toast-admin-message {
            flex-grow: 1;
        }

        .toast-admin-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .toast-admin-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</body>

</html>
