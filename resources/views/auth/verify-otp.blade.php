<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP सत्यापन - Municipality Training Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
           CENTERED LAYOUT
           ============================================ */
        .split-screen {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .left-panel {
            display: none;
        }

        .right-panel {
            width: 100%;
            max-width: 650px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: transparent;
        }

        /* ============================================
           MUNICIPALITY HEADER
           ============================================ */
        .municipality-header-top {
            text-align: center;
            margin-bottom: 15px;
        }

        .municipality-logo-top {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            box-shadow: 0 4px 16px rgba(22, 163, 74, 0.25);
            padding: 5px;
        }

        .municipality-logo-top img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .municipality-name-top {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 3px;
        }

        .system-name-top {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--success-color);
        }

        /* ============================================
           RIGHT PANEL - GLASSMORPHISM CARD
           ============================================ */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-medium);
            padding: 20px;
            max-width: 650px;
            width: 100%;
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
            text-align: center;
            margin-bottom: 12px;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .header-icon i {
            font-size: 20px;
            color: white;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 3px;
        }

        .card-subtitle {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* ============================================
           FORM STYLES
           ============================================ */
        .form-section {
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            font-size: 0.9rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            transition: var(--transition-smooth);
            background: #f9fafb;
        }

        .form-control:focus {
            outline: none;
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            background: white;
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
            background: #fef2f2;
        }

        .form-control.is-valid {
            border-color: var(--success-color);
            background: #f0fdf4;
        }

        .otp-input {
            text-align: center;
            font-size: 1.5rem;
            letter-spacing: 0.5em;
            font-weight: 600;
        }

        /* ============================================
           BUTTON STYLES
           ============================================ */
        .btn-primary {
            background: var(--secondary-gradient);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-primary.loading {
            pointer-events: none;
        }

        .btn-primary.loading .btn-text {
            opacity: 0;
        }

        .btn-primary.loading .spinner {
            opacity: 1;
        }

        .btn-text {
            transition: opacity 0.3s;
        }

        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.9rem;
        }

        /* ============================================
           ALERT STYLES
           ============================================ */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            border: none;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-left: 4px solid #10B981;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left: 4px solid #EF4444;
        }

        /* ============================================
           BOTTOM LINKS
           ============================================ */
        .bottom-links {
            text-align: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .bottom-links p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 0;
        }

        .bottom-links a {
            color: #10B981;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .bottom-links a:hover {
            color: #059669;
            text-decoration: underline;
        }

        .resend-link {
            display: inline-block;
            margin-top: 10px;
            font-size: 0.85rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .resend-link:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="split-screen">
        <!-- RIGHT PANEL -->
        <div class="right-panel">
            <div class="glass-card">
                <!-- Municipality Header -->
                <div class="municipality-header-top">
                    <div class="municipality-logo-top">
                        <img src="{{ asset('dist/img/logo/Government_Logo.png') }}" alt="Municipality Logo">
                    </div>
                    <h1 class="municipality-name-top">सुनवल नगरपालिका</h1>
                    <p class="system-name-top">तालिम व्यवस्थापन प्रणाली</p>
                </div>

                <div class="card-header">
                    <div class="header-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h2 class="card-title">OTP</h2>
                    <p class="card-subtitle">कृपया तपाईंको इमेलमा पठाइएको कोड प्रविष्ट गर्नुहोस्</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('verify.otp') }}" method="POST" id="otpForm">
                    @csrf
                    <div class="form-section">
                        <div class="form-group">
                            <label class="form-label" for="otp">
                                OTP कोड <span class="required">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control otp-input" 
                                   id="otp" 
                                   name="otp" 
                                   maxlength="6" 
                                   placeholder="000000"
                                   required
                                   aria-required="true">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                        <span class="btn-text">सत्यापन गर्नुहोस् <i class="bi bi-arrow-right"></i></span>
                        <span class="spinner">
                            <i class="bi bi-arrow-repeat"></i> लोड हुँदै...
                        </span>
                    </button>

                    <!-- Resend OTP -->
                    <div class="text-center mt-3">
                        <form action="{{ route('resend.otp') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link resend-link">
                                <i class="bi bi-arrow-clockwise"></i> OTP पुन: पठाउनुहोस्
                            </button>
                        </form>
                    </div>

                    <!-- Bottom Links -->
                    <div class="bottom-links">
                        <p>दर्ता गर्नुहोस् <a href="{{ route('register') }}">यहाँ क्लिक गर्नुहोस्</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpForm = document.getElementById('otpForm');
            const submitBtn = document.getElementById('submitBtn');
            const otpInput = document.getElementById('otp');

            // Form submission
            otpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate OTP
                const otp = otpInput.value.trim();
                if (!otp || otp.length !== 6) {
                    alert('कृपया ६-अंकीय OTP कोड प्रविष्ट गर्नुहोस्।');
                    return;
                }

                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Submit form
                this.submit();
            });

            // Auto-focus OTP input
            otpInput.focus();

            // Allow only numbers
            otpInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
</body>
</html>
