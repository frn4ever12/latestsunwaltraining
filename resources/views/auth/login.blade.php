<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Municipality Training Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* ============================================
           ROOT VARIABLES & RESET
           ============================================ */
        :root {
            --primary-gradient: linear-gradient(135deg, #15803D 0%, #16A34A 100%);
            --secondary-gradient: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
            --glass-bg: rgba(255, 255, 255, 0.98);
            --glass-border: rgba(255, 255, 255, 0.3);
            --shadow-soft: 0 4px 16px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 24px rgba(0, 0, 0, 0.12);
            --shadow-hover: 0 12px 32px rgba(0, 0, 0, 0.15);
            --border-radius: 18px;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
            --success-color: #16A34A;
            --error-color: #EF4444;
            --warning-color: #F59E0B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Noto Sans Devanagari', system-ui, -apple-system, sans-serif;
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
           LEFT PANEL CONTENT
           ============================================ */
        .municipality-header {
            position: relative;
            z-index: 1;
        }

        .municipality-logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .municipality-logo i {
            font-size: 26px;
            color: white;
        }

        .municipality-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .portal-title {
            font-size: 0.8rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            margin: 15px 0;
        }

        .motivational-section {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 15px 0;
        }

        .motivational-heading {
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .motivational-description {
            font-size: 0.8rem;
            opacity: 0.85;
            line-height: 1.5;
        }

        .objectives-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            padding: 18px;
            position: relative;
            z-index: 1;
        }

        .objectives-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .objectives-title i {
            font-size: 1.1rem;
        }

        .objective-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.8rem;
        }

        .objective-item:last-child {
            border-bottom: none;
        }

        .objective-item i {
            color: #16A34A;
            font-size: 0.9rem;
        }

        .left-footer {
            position: relative;
            z-index: 1;
        }

        .security-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 10px 14px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .security-card i {
            font-size: 1.2rem;
            color: #16A34A;
        }

        .security-text {
            font-size: 0.75rem;
            opacity: 0.95;
        }

        .security-subtext {
            font-size: 0.7rem;
            opacity: 0.8;
        }

        .copyright {
            font-size: 0.7rem;
            opacity: 0.7;
        }

        /* ============================================
           RIGHT PANEL - GLASSMORPHISM CARD
           ============================================ */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-medium);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            box-shadow: 0 4px 16px rgba(22, 163, 74, 0.25);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.03); }
        }

        .header-icon i {
            font-size: 20px;
            color: white;
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .card-subtitle {
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* ============================================
           FORM STYLES
           ============================================ */
        .form-group {
            position: relative;
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
            display: block;
        }

        .required {
            color: var(--error-color);
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-size: 14px;
            transition: var(--transition-smooth);
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #16A34A;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        .form-control.is-valid {
            border-color: var(--success-color);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2316A34A' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") no-repeat right 12px center/14px;
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23EF4444'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5zM6 8.2a.3.3 0 000 .6.3.3 0 000-.6z'/%3e%3c/svg%3e") no-repeat right 12px center/14px;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1rem;
            z-index: 1;
        }

        .input-with-icon {
            padding-left: 42px;
        }

        .input-with-prefix {
            padding-left: 75px;
        }

        .input-prefix {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: #F3F4F6;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            z-index: 1;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            font-size: 1rem;
            transition: var(--transition-smooth);
            z-index: 1;
        }

        .password-toggle:hover {
            color: var(--text-primary);
        }

        .validation-message {
            font-size: 12px;
            margin-top: 4px;
            display: none;
        }

        .validation-message.show {
            display: block;
        }

        .validation-message.error {
            color: var(--error-color);
        }

        .validation-message.success {
            color: var(--success-color);
        }

        /* ============================================
           CHECKBOX & LINKS
           ============================================ */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .remember-checkbox input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #16A34A;
            cursor: pointer;
        }

        .remember-checkbox label {
            font-size: 13px;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 13px;
            color: #16A34A;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-smooth);
        }

        .forgot-link:hover {
            color: #15803D;
            text-decoration: underline;
        }

        /* ============================================
           BUTTON STYLES
           ============================================ */
        .btn-primary {
            background: var(--secondary-gradient);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 14px;
            color: white;
            width: 100%;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(22, 163, 74, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(22, 163, 74, 0.35);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary .spinner {
            display: none;
        }

        .btn-primary.loading .spinner {
            display: inline-block;
        }

        .btn-primary.loading .btn-text {
            display: none;
        }

        .btn-primary i {
            margin-left: 6px;
            transition: transform 0.3s ease;
        }

        .btn-primary:hover i {
            transform: translateX(3px);
        }

        /* ============================================
           DIVIDER
           ============================================ */
        .divider-section {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: #E5E7EB;
        }

        .divider-text {
            padding: 0 16px;
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* ============================================
           SUPPORT CARD
           ============================================ */
        .support-card {
            background: #F0FDF4;
            border: 1px solid #D1FAE5;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .support-icon {
            width: 40px;
            height: 40px;
            background: #16A34A;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .support-icon i {
            font-size: 1.2rem;
            color: white;
        }

        .support-content h6 {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 3px;
        }

        .support-content p {
            font-size: 12px;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .support-btn {
            background: white;
            border: 1px solid #16A34A;
            color: #16A34A;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .support-btn:hover {
            background: #16A34A;
            color: white;
        }

        /* ============================================
           BOTTOM LINKS
           ============================================ */
        .bottom-links {
            text-align: center;
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid #E5E7EB;
        }

        .bottom-links p {
            color: var(--text-secondary);
            font-size: 13px;
        }

        .bottom-links a {
            color: #16A34A;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .bottom-links a:hover {
            color: #15803D;
        }

        /* ============================================
           FEATURE CARDS
           ============================================ */
        .feature-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .feature-card {
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            transition: var(--transition-smooth);
        }

        .feature-card:hover {
            border-color: #16A34A;
            box-shadow: 0 3px 10px rgba(22, 163, 74, 0.12);
            transform: translateY(-1px);
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            background: #F0FDF4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
        }

        .feature-icon i {
            font-size: 1rem;
            color: #16A34A;
        }

        .feature-card h6 {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        /* ============================================
           RESPONSIVE DESIGN
           ============================================ */
        @media (max-width: 1024px) {
            .split-screen {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
                padding: 18px;
                min-height: auto;
            }

            .right-panel {
                width: 100%;
                padding: 18px 15px;
            }

            .glass-card {
                padding: 25px;
            }

            .motivational-heading {
                font-size: 1.1rem;
            }

            .objectives-card {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 28px;
            }

            .card-header {
                margin-bottom: 20px;
            }

            .feature-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .left-panel {
                padding: 15px;
            }

            .right-panel {
                padding: 15px 12px;
            }

            .glass-card {
                padding: 20px 16px;
            }

            .form-control {
                padding: 0 14px;
                font-size: 13px;
            }
        }

        /* ============================================
           ACCESSIBILITY
           ============================================ */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        *:focus-visible {
            outline: 2px solid #10B981;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="split-screen">
        <!-- LEFT PANEL -->
        <div class="left-panel">
            <div class="municipality-header">
                <div class="municipality-logo">
                    <i class="bi bi-building"></i>
                </div>
                <h1 class="municipality-name">सुनवल नगरपालिका</h1>
                <p class="portal-title">तालिम व्यवस्थापन प्रणाली</p>
            </div>

            <div class="divider"></div>

            <div class="motivational-section">
                <h2 class="motivational-heading">
                    सीप सिकौं,<br>
                    रोजगार बनौं,<br>
                    समृद्ध पालिका बनाऔं
                </h2>
                <p class="motivational-description">
                    पालिकाद्वारा सञ्चालन गरिने विभिन्न सीप विकास तालिममा सहभागी भई आफ्नो भविष्य उज्ज्वल बनाउनुहोस्।
                </p>
            </div>

            <div class="objectives-card">
                <h3 class="objectives-title">
                    <i class="bi bi-bullseye"></i>
                    हाम्रो उद्देश्य
                </h3>
                <div class="objective-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>गुणस्तरीय सीप विकास</span>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>रोजगार तथा स्वरोजगार</span>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>महिला तथा युवा सशक्तिकरण</span>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>सरकारी प्रमाणित तालिम</span>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>निःशुल्क आवेदन प्रक्रिया</span>
                </div>
            </div>

            <div class="left-footer">
                <div class="security-card">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <div class="security-text">तपाईंको जानकारी पूर्ण रूपमा सुरक्षित छ।</div>
                        <div class="security-subtext">SSL Secured | Privacy Protected</div>
                    </div>
                </div>
                <p class="copyright">© 2026 नगरपालिका तालिम पोर्टल। सर्वाधिकार सुरक्षित।</p>
            </div>
        </div>

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

                <form action="{{ route('login') }}" method="POST" id="loginForm" novalidate>
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-label" for="email">
                            इमेल <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" 
                                   class="form-control input-with-icon" 
                                   id="email" 
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="example@email.com"
                                   required
                                   aria-required="true"
                                   aria-describedby="email_error">
                            <div class="validation-message" id="email_error"></div>
                            @error('email')
                                <div class="validation-message error show">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="form-label" for="password">
                            पासवर्ड <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="bi bi-key input-icon"></i>
                            <input type="password" 
                                   class="form-control input-with-icon" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••"
                                   required
                                   aria-required="true"
                                   aria-describedby="password_error">
                            <button type="button" 
                                    class="password-toggle" 
                                    id="togglePassword"
                                    aria-label="Show password">
                                <i class="bi bi-eye"></i>
                            </button>
                            <div class="validation-message" id="password_error"></div>
                            @error('password')
                                <div class="validation-message error show">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-options">
                        <div class="remember-checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">मलाई सम्झिनुहोस्</label>
                        </div>
                        <a href="#" class="forgot-link">पासवर्ड बिर्सनुभयो?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span class="btn-text">लगइन गर्नुहोस् <i class="bi bi-arrow-right"></i></span>
                        <span class="spinner">
                            <i class="bi bi-arrow-repeat"></i> लोड हुँदै...
                        </span>
                    </button>

                    <!-- Bottom Links -->
                    <div class="bottom-links">
                        <p>खाता छैन? <a href="{{ route('register') }}">आवेदक दर्ता</a></p>
                    </div>
                </form>

                <!-- Feature Cards -->
                <div class="feature-cards">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h6>SSL सुरक्षित</h6>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-lock"></i>
                        </div>
                        <h6>१००% गोपनीय</h6>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h6>२४/७ सहयोग</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ============================================
        // PASSWORD TOGGLE
        // ============================================
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });

        // ============================================
        // FORM VALIDATION
        // ============================================
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');

        function validateField(input) {
            const value = input.value.trim();
            const errorDiv = document.getElementById(input.id + '_error');
            let isValid = true;
            let errorMessage = '';

            // Remove previous validation states
            input.classList.remove('is-valid', 'is-invalid');
            if (errorDiv) {
                errorDiv.classList.remove('show', 'error', 'success');
            }

            // Required field validation
            if (input.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'यो फिल्ड आवश्यक छ।';
            }

            // Email validation
            if (input.id === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    isValid = false;
                    errorMessage = 'कृपया मान्य इमेल ठेगाना प्रविष्ट गर्नुहोस्।';
                }
            }

            // Apply validation state
            if (value) {
                if (isValid) {
                    input.classList.add('is-valid');
                    if (errorDiv) {
                        errorDiv.textContent = '✓ मान्य';
                        errorDiv.classList.add('show', 'success');
                    }
                } else {
                    input.classList.add('is-invalid');
                    if (errorDiv) {
                        errorDiv.textContent = errorMessage;
                        errorDiv.classList.add('show', 'error');
                    }
                }
            }

            return isValid;
        }

        // Real-time validation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            input.addEventListener('input', function() {
                // Clear error state on input
                this.classList.remove('is-invalid');
                const errorDiv = document.getElementById(this.id + '_error');
                if (errorDiv) {
                    errorDiv.classList.remove('show', 'error');
                }
            });
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isFormValid = true;
            
            // Validate all required fields
            document.querySelectorAll('.form-control[required]').forEach(input => {
                if (!validateField(input)) {
                    isFormValid = false;
                }
            });

            if (isFormValid) {
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Submit form
                this.submit();
            }
        });

        // ============================================
        // KEYBOARD NAVIGATION
        // ============================================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Add modal closing logic here if needed
            }
        });
    </script>
</body>
</html>
