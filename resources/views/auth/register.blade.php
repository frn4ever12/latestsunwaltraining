<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Registration - Municipality Training Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/v5/nepali.datepicker/css/nepali.datepicker.v5.0.6.min.css" rel="stylesheet" type="text/css"/>
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
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .municipality-logo i {
            font-size: 30px;
            color: white;
        }

        .municipality-name {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .portal-title {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .motivational-section {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 20px 0;
        }

        .motivational-heading {
            font-size: 1.4rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .motivational-description {
            font-size: 0.85rem;
            opacity: 0.85;
            line-height: 1.5;
        }

        .benefits-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .benefits-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .benefits-title i {
            font-size: 1.2rem;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.85rem;
        }

        .benefit-item:last-child {
            border-bottom: none;
        }

        .benefit-item i {
            color: #10B981;
            font-size: 1rem;
        }

        .left-footer {
            position: relative;
            z-index: 1;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            backdrop-filter: blur(10px);
        }

        .security-badge i {
            font-size: 1.1rem;
            color: #10B981;
        }

        .security-text {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .copyright {
            font-size: 0.75rem;
            opacity: 0.7;
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
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .card-subtitle {
            font-size: 0.75rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* ============================================
           STEP INDICATOR
           ============================================ */
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 2px;
            background: #E5E7EB;
            z-index: 0;
        }

        .step {
            position: relative;
            z-index: 1;
            text-align: center;
            flex: 1;
        }

        .step-number {
            width: 24px;
            height: 24px;
            background: white;
            border: 2px solid #E5E7EB;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 4px;
            font-weight: 600;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
            font-size: 0.7rem;
        }

        .step.active .step-number {
            background: var(--secondary-gradient);
            border-color: #10B981;
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .step.completed .step-number {
            background: #10B981;
            border-color: #10B981;
            color: white;
        }

        .step-label {
            font-size: 0.65rem;
            font-weight: 500;
            color: var(--text-secondary);
        }

        .step.active .step-label {
            color: #10B981;
            font-weight: 600;
        }

        /* ============================================
           FORM STYLES
           ============================================ */
        .form-section {
            margin-bottom: 8px;
        }

        .section-title {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .section-title::before {
            content: '';
            width: 2px;
            height: 14px;
            background: var(--secondary-gradient);
            border-radius: 2px;
        }

        .form-group {
            position: relative;
            margin-bottom: 8px;
        }

        .form-label {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 3px;
            display: block;
        }

        .required {
            color: var(--error-color);
        }

        .form-control {
            width: 100%;
            padding: 6px 10px;
            border: 2px solid #E5E7EB;
            border-radius: 6px;
            font-size: 0.8rem;
            transition: var(--transition-smooth);
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .form-control.is-valid {
            border-color: var(--success-color);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2310B981' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") no-repeat right 10px center/14px;
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23EF4444'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5zM6 8.2a.3.3 0 000 .6.3.3 0 000-.6z'/%3e%3c/svg%3e") no-repeat right 10px center/14px;
        }

        .form-select {
            width: 100%;
            padding: 6px 10px;
            border: 2px solid #E5E7EB;
            border-radius: 6px;
            font-size: 0.8rem;
            transition: var(--transition-smooth);
            background: white;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .validation-message {
            font-size: 0.75rem;
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
           PASSWORD STRENGTH METER
           ============================================ */
        .password-wrapper {
            position: relative;
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
        }

        .password-toggle:hover {
            color: var(--text-primary);
        }

        .strength-meter {
            margin-top: 2px;
            display: none;
        }

        .strength-bar {
            height: 2px;
            background: #E5E7EB;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 2px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: var(--transition-smooth);
            border-radius: 2px;
        }

        .strength-fill.weak {
            width: 25%;
            background: var(--error-color);
        }

        .strength-fill.fair {
            width: 50%;
            background: var(--warning-color);
        }

        .strength-fill.good {
            width: 75%;
            background: #3B82F6;
        }

        .strength-fill.strong {
            width: 100%;
            background: var(--success-color);
        }

        .strength-text {
            font-size: 0.65rem;
            font-weight: 500;
        }

        .strength-text.weak { color: var(--error-color); }
        .strength-text.fair { color: var(--warning-color); }
        .strength-text.good { color: #3B82F6; }
        .strength-text.strong { color: var(--success-color); }

        .password-rules {
            background: #F9FAFB;
            border-radius: 4px;
            padding: 4px;
            margin-top: 3px;
        }

        .rule-item {
            display: flex;
            align-items: center;
            gap: 3px;
            padding: 1px 0;
            font-size: 0.6rem;
            color: var(--text-secondary);
        }

        .rule-item i {
            font-size: 0.65rem;
            color: #E5E7EB;
            transition: var(--transition-smooth);
        }

        .rule-item.valid i {
            color: var(--success-color);
        }

        .rule-item.valid {
            color: var(--success-color);
        }

        /* ============================================
           ACCOUNT TYPE CARDS
           ============================================ */
        .account-type-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .account-type-card {
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            padding: 12px;
            cursor: pointer;
            transition: var(--transition-smooth);
            background: white;
            text-align: center;
        }

        .account-type-card:hover {
            border-color: #10B981;
            background: #F0FDF4;
            transform: translateY(-2px);
        }

        .account-type-card.selected {
            border-color: #10B981;
            background: #F0FDF4;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .account-type-card i {
            font-size: 1.5rem;
            color: #10B981;
            margin-bottom: 6px;
        }

        .account-type-card h6 {
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
            font-size: 0.85rem;
        }

        /* ============================================
           CHECKBOX STYLES
           ============================================ */
        .custom-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 16px;
        }

        .custom-checkbox input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #10B981;
            cursor: pointer;
            margin-top: 2px;
        }

        .checkbox-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .checkbox-label a {
            color: #10B981;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        /* ============================================
           BUTTON STYLES
           ============================================ */
        .btn-primary {
            background: var(--secondary-gradient);
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 0.8rem;
            color: white;
            width: 100%;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
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
            transform: translateX(4px);
        }

        /* ============================================
           BOTTOM LINKS
           ============================================ */
        .bottom-links {
            text-align: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #E5E7EB;
        }

        .bottom-links p {
            color: var(--text-secondary);
            font-size: 0.7rem;
        }

        .bottom-links a {
            color: #10B981;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .bottom-links a:hover {
            color: #059669;
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
                padding: 20px;
                min-height: auto;
            }

            .right-panel {
                width: 100%;
                padding: 20px 15px;
            }

            .glass-card {
                padding: 20px;
            }

            .motivational-heading {
                font-size: 1.2rem;
            }

            .benefits-card {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 1.3rem;
            }

            .card-header {
                margin-bottom: 20px;
            }

            .step-indicator {
                margin-bottom: 20px;
            }

            .step-label {
                font-size: 0.7rem;
            }

            .account-type-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .left-panel {
                padding: 15px;
            }

            .right-panel {
                padding: 15px 10px;
            }

            .glass-card {
                padding: 15px 12px;
            }

            .form-control,
            .form-select {
                padding: 8px 12px;
                font-size: 0.8rem;
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

            <div class="motivational-section">
                <h2 class="motivational-heading">
                    सीप सिकौं,<br>
                    रोजगार बनौं,<br>
                    समृद्ध पालिका बनाऔं
                </h2>
                <p class="motivational-description">
                    नगरपालिकाले प्रदान गर्ने निःशुल्क तालिममा सहभागी भई आफ्नो भविष्य उज्यालो बनाउनुहोस्।
                </p>
            </div>

            <div class="benefits-card">
                <h3 class="benefits-title">
                    <i class="bi bi-lightbulb"></i>
                    किन सहभागी हुनुहुन्छ?
                </h3>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>निःशुल्क सीप विकास तालिम</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>सरकारी प्रमाणित तालिम</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>रोजगारको अवसर</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>स्व-रोजगार समर्थन</span>
                </div>
                <div class="benefit-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>डिजिटल प्रमाणपत्र</span>
                </div>
            </div>

            <div class="left-footer">
                <div class="security-badge">
                    <i class="bi bi-shield-check"></i>
                    <span class="security-text">तपाईंको जानकारी पूर्ण सुरक्षित छ।</span>
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

                <form action="{{ route('register') }}" method="POST" id="registrationForm" novalidate>
                    @csrf

                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">
                                        नाम (अंग्रेजी) <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           placeholder="Name"
                                           required
                                           aria-required="true"
                                           aria-describedby="name_error">
                                    <div class="validation-message" id="name_error"></div>
                                    @error('name')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name_np">
                                        नाम (नेपाली) <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="name_np" 
                                           name="name_np" 
                                           value="{{ old('name_np') }}"
                                           placeholder="नाम"
                                           required
                                           aria-required="true"
                                           aria-describedby="name_np_error">
                                    <div class="validation-message" id="name_np_error"></div>
                                    @error('name_np')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="gender">
                                        लिङ्ग <span class="required">*</span>
                                    </label>
                                    <select class="form-select" 
                                            id="gender" 
                                            name="gender"
                                            required
                                            aria-required="true"
                                            aria-describedby="gender_error">
                                        <option value="">-- छनौट गर्नुहोस् --</option>
                                        <option value="male">पुरुष</option>
                                        <option value="female">महिला</option>
                                        <option value="other">अन्य</option>
                                    </select>
                                    <div class="validation-message" id="gender_error"></div>
                                    @error('gender')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="dob_bs">
                                        जन्म मिति (बि.सं.) <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="dob_bs" 
                                           name="dob_bs" 
                                           value="{{ old('dob_bs') }}"
                                           placeholder="२०८१/०१/०१"
                                           required
                                           aria-required="true"
                                           aria-describedby="dob_bs_error">
                                    <div class="validation-message" id="dob_bs_error"></div>
                                    @error('dob_bs')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="dob_ad">
                                        जन्म मिति (ई.सं.)
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="dob_ad" 
                                           name="dob_ad" 
                                           value="{{ old('dob_ad') }}"
                                           placeholder="YYYY-MM-DD"
                                           readonly
                                           aria-describedby="dob_ad_error">
                                    <div class="validation-message" id="dob_ad_error"></div>
                                    @error('dob_ad')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="contact_no">
                                        सम्पर्क नम्बर <span class="required">*</span>
                                    </label>
                                    <input type="tel" 
                                           class="form-control" 
                                           id="contact_no" 
                                           name="contact_no" 
                                           value="{{ old('contact_no') }}"
                                           placeholder="Phone number"
                                           required
                                           aria-required="true"
                                           aria-describedby="contact_no_error">
                                    <div class="validation-message" id="contact_no_error"></div>
                                    @error('contact_no')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Hidden required fields -->
                            <input type="hidden" name="account_type" value="trainee">
                            <input type="hidden" name="otp_method" value="email">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        ईमेल <span class="required">*</span>
                                    </label>
                                    <input type="email" 
                                           class="form-control" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="yourname@example.com"
                                           required
                                           aria-required="true"
                                           aria-describedby="email_error">
                                    <div class="validation-message" id="email_error"></div>
                                    @error('email')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">
                                        पासवर्ड <span class="required">*</span>
                                    </label>
                                    <div class="password-wrapper">
                                        <input type="password" 
                                               class="form-control" 
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
                                    </div>
                                    @error('password')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password_confirmation">
                                        पासवर्ड पुष्टि <span class="required">*</span>
                                    </label>
                                    <div class="password-wrapper">
                                        <input type="password" 
                                               class="form-control" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               placeholder="••••••••"
                                               required
                                               aria-required="true"
                                               aria-describedby="password_confirmation_error">
                                        <button type="button" 
                                                class="password-toggle" 
                                                id="toggleConfirmPassword"
                                                aria-label="Show password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    <div class="validation-message" id="password_confirmation_error"></div>
                                    @error('password_confirmation')
                                        <div class="validation-message error show">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    <!-- Terms and Conditions -->
                    <div class="form-group">
                        <label class="form-label">
                            <input type="checkbox" 
                                   id="consent" 
                                   name="consent" 
                                   value="1" 
                                   required
                                   aria-required="true">
                            म यो तालिम व्यवस्थापन प्रणालीको नियम र सर्तहरू स्वीकार गर्छु। <span class="required">*</span>
                        </label>
                        <div class="validation-message" id="consent_error"></div>
                        @error('consent')
                            <div class="validation-message error show">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span class="btn-text">जारी राख्न दर्ता गर्नुहोस् ! <i class="bi bi-arrow-right"></i></span>
                        <span class="spinner">
                            <i class="bi bi-arrow-repeat"></i> लोड हुँदै...
                        </span>
                    </button>

                    <!-- Bottom Links -->
                    <div class="bottom-links">
                        <p>पहिले नै खाता छ? <a href="{{ route('login') }}">लगइन गर्नुहोस्</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // ============================================
        // ACCOUNT TYPE SELECTION
        // ============================================
        document.querySelectorAll('.account-type-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.account-type-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                const value = this.dataset.value;
                this.querySelector('input[type="radio"]').checked = true;
            });
        });

        // ============================================
        // PASSWORD TOGGLE
        // ============================================
        function setupPasswordToggle(toggleId, inputId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            
            toggle.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        }

        setupPasswordToggle('togglePassword', 'password');
        setupPasswordToggle('toggleConfirmPassword', 'password_confirmation');

        // ============================================
        // FORM VALIDATION
        // ============================================
        const form = document.getElementById('registrationForm');
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
            if (input.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    isValid = false;
                    errorMessage = 'कृपया मान्य इमेल ठेगाना प्रविष्ट गर्नुहोस्।';
                }
            }

            // Password confirmation validation
            if (input.id === 'password_confirmation' && value) {
                const password = document.getElementById('password').value;
                if (value !== password) {
                    isValid = false;
                    errorMessage = 'पासवर्हरू मिलेनन्।';
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
            let isFormValid = true;
            
            // Validate all required fields
            document.querySelectorAll('.form-control[required]').forEach(input => {
                if (!validateField(input)) {
                    isFormValid = false;
                }
            });

            // Validate terms checkbox
            if (!isFormValid) {
                e.preventDefault();
            } else {
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });

        // ============================================
        // KEYBOARD NAVIGATION
        // ============================================
        document.addEventListener('keydown', function(e) {
            // Escape key to close modals (if any)
            if (e.key === 'Escape') {
                // Add modal closing logic here if needed
            }
        });

        // ============================================
        // ENGLISH TO NEPALI TRANSLITERATION
        // ============================================
        const nepaliNameInput = document.getElementById('name_np');
        let transliterationTimeout;
        
        nepaliNameInput.addEventListener('input', function(e) {
            clearTimeout(transliterationTimeout);
            
            const englishText = this.value;
            if (!englishText || englishText.length < 2) return;
            
            transliterationTimeout = setTimeout(() => {
                transliterateToNepali(englishText);
            }, 300);
        });
        
        async function transliterateToNepali(text) {
            try {
                const response = await fetch('https://inputtools.google.com/request?itc=ne-t-i0-und&num=5&cp=0&cs=1&ie=UTF-8&oe=UTF-8&app=demopage', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `text=${encodeURIComponent(text)}`
                });
                
                const data = await response.json();
                
                if (data && data[1] && data[1][0] && data[1][0][1]) {
                    // Get the first suggestion (most accurate)
                    const nepaliText = data[1][0][1][0];
                    nepaliNameInput.value = nepaliText;
                    nepaliNameInput.setSelectionRange(nepaliText.length, nepaliText.length);
                }
            } catch (error) {
                console.error('Transliteration error:', error);
            }
        }

        // ============================================
        // MANUAL NEPALI TO ENGLISH DATE CONVERSION
        // ============================================
        function bsToAd(bsYear, bsMonth, bsDay) {
            // Simple BS to AD conversion (approximate)
            // This is a basic conversion - for accurate conversion, use a proper library
            const bsMonths = [0, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 30];
            const adMonths = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            
            // BS year offset from AD (approximately 56 years and 8.5 months)
            const bsYearOffset = 56;
            const bsMonthOffset = 8;
            const bsDayOffset = 15;
            
            // Convert to AD
            let adYear = bsYear - bsYearOffset;
            let adMonth = bsMonth - bsMonthOffset;
            let adDay = bsDay - bsDayOffset;
            
            // Adjust for negative values
            if (adDay <= 0) {
                adDay += 30;
                adMonth--;
            }
            if (adMonth <= 0) {
                adMonth += 12;
                adYear--;
            }
            
            // Check for leap year
            const isLeapYear = (adYear % 4 === 0 && adYear % 100 !== 0) || (adYear % 400 === 0);
            if (isLeapYear) {
                adMonths[2] = 29;
            }
            
            // Adjust if day exceeds month days
            if (adDay > adMonths[adMonth]) {
                adDay -= adMonths[adMonth];
                adMonth++;
                if (adMonth > 12) {
                    adMonth = 1;
                    adYear++;
                }
            }
            
            return {
                year: adYear,
                month: adMonth,
                day: adDay
            };
        };

        // ============================================
        // NEPALI DATEPICKER INITIALIZATION & VALIDATION
        // ============================================
    </script>
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/v5/nepali.datepicker/js/nepali.datepicker.v5.0.6.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        // Simple BS to AD conversion function
        function bsToAdSimple(bsYear, bsMonth, bsDay) {
            // Approximate BS to AD conversion
            var adYear = bsYear - 56;
            var adMonth = bsMonth - 8;
            var adDay = bsDay - 15;
            
            if (adDay <= 0) {
                adDay += 30;
                adMonth--;
            }
            if (adMonth <= 0) {
                adMonth += 12;
                adYear--;
            }
            
            return {
                year: adYear,
                month: adMonth,
                day: adDay
            };
        }
        
        // Phone number validation
        function validatePhoneNumber(phone) {
            // Remove all non-numeric characters
            const numericPhone = phone.replace(/\D/g, '');
            
            // Check if exactly 10 digits
            if (numericPhone.length === 10) {
                return { valid: true, message: '' };
            } else {
                return { valid: false, message: 'फोन नम्बर १० अंकको हुनुपर्छ।' };
            }
        }
        
        // English to Nepali transliteration mapping
        const englishToNepaliMap = {
            'a': 'अ', 'aa': 'आ', 'i': 'इ', 'ii': 'ई', 'u': 'उ', 'uu': 'ऊ',
            'e': 'ए', 'ai': 'ऐ', 'o': 'ओ', 'au': 'औ',
            'k': 'क', 'kh': 'ख', 'g': 'ग', 'gh': 'घ', 'ng': 'ङ',
            'ch': 'च', 'chh': 'छ', 'j': 'ज', 'jh': 'झ', 'ny': 'ञ',
            't': 'त', 'th': 'थ', 'd': 'द', 'dh': 'ध', 'n': 'न',
            'p': 'प', 'ph': 'फ', 'b': 'ब', 'bh': 'भ', 'm': 'म',
            'y': 'य', 'r': 'र', 'l': 'ल', 'v': 'व', 'sh': 'श',
            's': 'स', 'h': 'ह',
            // Common first names
            'sanjay': 'सञ्जय', 'ram': 'राम', 'krishna': 'कृष्ण', 'hari': 'हरि',
            'shyam': 'श्याम', 'sita': 'सीता', 'gita': 'गीता', 'rita': 'रीता',
            'nita': 'नीता', 'sunita': 'सुनिता', 'anita': 'अनिता', 'bijay': 'विजय',
            'raj': 'राज', 'rajesh': 'राजेश', 'mahesh': 'महेश', 'suresh': 'सुरेश',
            'ramesh': 'रमेश', 'dinesh': 'दिनेश', 'naresh': 'नरेश', 'ganesh': 'गणेश',
            'sunil': 'सुनिल', 'anil': 'अनिल', 'binod': 'विनोद', 'kumar': 'कुमार',
            'deepak': 'दीपक', 'sandeep': 'सन्दीप', 'narendra': 'नरेन्द्र', 'bikash': 'विकास',
            'bishal': 'विशाल', 'abhishek': 'अभिषेक', 'prakash': 'प्रकाश', 'subash': 'सुवास',
            'saroj': 'सरोज', 'narayan': 'नारायण', 'gopal': 'गोपाल', 'mukesh': 'मुकेश',
            'sushil': 'सुशील', 'ashok': 'अशोक', 'rabin': 'रविन', 'sabin': 'सविन',
            'kailash': 'कैलाश', 'bishnu': 'विष्णु', 'laxmi': 'लक्ष्मी', 'durga': 'दुर्गा',
            'pawan': 'पवन', 'nabin': 'नविन', 'arjun': 'अर्जुन', 'yubraj': 'युवराज',
            'buddhi': 'बुद्धि', 'chandra': 'चन्द्र', 'dev': 'देव', 'maya': 'माया',
            'kanchan': 'काञ्चन', 'srijana': 'सृजना', 'kabita': 'कविता', 'sangita': 'सङ्गीता',
            'rekha': 'रेखा', 'sushma': 'सुष्मा', 'babita': 'बबिता', 'savita': 'सविता',
            'kavita': 'कविता', 'punita': 'पुनिता', 'nirmala': 'निर्मला', 'sita': 'सीता',
            'damodar': 'दामोदर', 'shankar': 'शंकर', 'shiva': 'शिव', 'vishnu': 'विष्णु',
            'brahma': 'ब्रह्मा', 'indra': 'इन्द्र', 'agni': 'अग्नि', 'varun': 'वरुण',
            'yama': 'यम', 'kuber': 'कुबेर', 'ganesha': 'गणेश', 'kartik': 'कार्तिक',
            'hanuman': 'हनुमान', 'lakshman': 'लक्ष्मण', 'bharat': 'भरत', 'satrughna': 'शत्रुघ्न',
            // Common last names
            'dahal': 'दाहाल', 'sharma': 'शर്മा', 'thapa': 'थापा', 'karki': 'कार्की',
            'adkari': 'अधिकारी', 'poudel': 'पौडेल', 'gautam': 'गौतम', 'rai': 'राई',
            'limbu': 'लिम्बू', 'tamang': 'तामाङ', 'gurung': 'गुरुङ', 'magar': 'मगर',
            'sherpa': 'शेर्पा', 'newar': 'नेवार', 'joshi': 'जोशी', 'acharya': 'आचार्य',
            'pant': 'पन्त', 'bhatta': 'भट्ट', 'khanal': 'खनाल', 'basnet': 'बस्नेत',
            'khatiwada': 'खतिवडा', 'bista': 'बिष्ट', 'kattel': 'कट्टेल', 'luitel': 'लुइटेल',
            'amgai': 'अम्गाई', 'niraula': 'निरौला', 'regmi': 'रेग्मी', 'dhakal': 'ढकाल',
            'kandel': 'कन्डेल', 'maharjan': 'महर्जन', 'shakya': 'शाक्य', 'tuladhar': 'तुलाधर',
            'manandhar': 'मानन्धर', 'moktan': 'मोक्तान', 'raijure': 'राईजुरे', 'yakthumba': 'याख्थुम्बा'
        };
        
        function transliterateToNepali(englishText) {
            let nepaliText = englishText.toLowerCase();
            
            // Check for full name patterns first
            const fullNameMap = {
                'sanjay dahal': 'सञ्जय दाहाल',
                'hari sharma': 'हरि शर्मा',
                'ram bahadur': 'राम बहादुर',
                'hari bahadur': 'हरि बहादुर',
                'shyam bahadur': 'श्याम बहादुर',
                'krishna bahadur': 'कृष्ण बहादुर'
            };
            
            if (fullNameMap[nepaliText]) {
                return fullNameMap[nepaliText];
            }
            
            // Split into words and transliterate each word
            const words = nepaliText.split(' ');
            const nepaliWords = words.map(word => {
                // Check for common name patterns
                if (englishToNepaliMap[word]) {
                    return englishToNepaliMap[word];
                }
                
                // Improved character-based transliteration with matra handling
                const consonantMap = {
                    'k': 'क', 'kh': 'ख', 'g': 'ग', 'gh': 'घ', 'ng': 'ङ',
                    'ch': 'च', 'chh': 'छ', 'j': 'ज', 'jh': 'झ', 'ny': 'ञ',
                    't': 'त', 'th': 'थ', 'd': 'द', 'dh': 'ध', 'n': 'न',
                    'p': 'प', 'ph': 'फ', 'b': 'ब', 'bh': 'भ', 'm': 'म',
                    'y': 'य', 'r': 'र', 'l': 'ल', 'v': 'व', 'sh': 'श',
                    's': 'स', 'h': 'ह'
                };
                
                const vowelMap = {
                    'a': '', 'aa': 'ा', 'i': 'ि', 'ii': 'ी', 'u': 'ु', 'uu': 'ू',
                    'e': 'े', 'ai': 'ै', 'o': 'ो', 'au': 'ौ'
                };
                
                let result = '';
                let i = 0;
                
                while (i < word.length) {
                    // Check for consonant combinations first
                    let matched = false;
                    
                    // Check for two-letter consonants
                    if (i < word.length - 1) {
                        const twoChar = word.substring(i, i + 2);
                        if (consonantMap[twoChar]) {
                            result += consonantMap[twoChar];
                            i += 2;
                            matched = true;
                        }
                    }
                    
                    // Check for single consonant
                    if (!matched && consonantMap[word[i]]) {
                        result += consonantMap[word[i]];
                        i++;
                        matched = true;
                    }
                    
                    // If not a consonant, check for vowels
                    if (!matched) {
                        if (i < word.length - 1) {
                            const twoChar = word.substring(i, i + 2);
                            if (vowelMap[twoChar]) {
                                result += vowelMap[twoChar];
                                i += 2;
                                matched = true;
                            }
                        }
                        
                        if (!matched && vowelMap[word[i]]) {
                            result += vowelMap[word[i]];
                            i++;
                            matched = true;
                        }
                    }
                    
                    // If no match, keep original character
                    if (!matched) {
                        result += word[i];
                        i++;
                    }
                }
                
                return result;
            });
            
            return nepaliWords.join(' ');
        }
        
        window.onload = function() {
            var mainInput = document.getElementById("dob_bs");
            var dobAdInput = document.getElementById("dob_ad");
            var nameInput = document.getElementById("name");
            var nameNpInput = document.getElementById("name_np");
            var phoneInput = document.getElementById("contact_no");
            var phoneError = document.getElementById("contact_no_error");
            
            if (mainInput) {
                // Initialize Nepali datepicker
                mainInput.NepaliDatePicker();
                
                // Function to convert BS to AD
                function convertBsToAd() {
                    var bsDate = mainInput.value;
                    console.log('BS Date:', bsDate); // Debug log
                    
                    if (bsDate && bsDate.length >= 10) {
                        try {
                            // Handle both / and - separators
                            var separator = bsDate.includes('/') ? '/' : '-';
                            var bsParts = bsDate.split(separator);
                            console.log('BS Parts:', bsParts); // Debug log
                            
                            if (bsParts.length === 3) {
                                var bsYear = parseInt(bsParts[0]);
                                var bsMonth = parseInt(bsParts[1]);
                                var bsDay = parseInt(bsParts[2]);
                                
                                console.log('Year:', bsYear, 'Month:', bsMonth, 'Day:', bsDay); // Debug log
                                
                                var adDate = bsToAdSimple(bsYear, bsMonth, bsDay);
                                console.log('AD Date:', adDate); // Debug log
                                
                                if (adDate && adDate.year) {
                                    var adDateStr = adDate.year + '-' + String(adDate.month).padStart(2, '0') + '-' + String(adDate.day).padStart(2, '0');
                                    dobAdInput.value = adDateStr;
                                    console.log('AD Date String:', adDateStr); // Debug log
                                }
                            }
                        } catch (error) {
                            console.error('Date conversion error:', error);
                        }
                    }
                }
                
                // Store previous value to detect changes
                var previousValue = mainInput.value;
                
                // Use setInterval to check for value changes (for datepicker compatibility)
                setInterval(function() {
                    if (mainInput.value !== previousValue) {
                        console.log('Value changed from', previousValue, 'to', mainInput.value); // Debug log
                        previousValue = mainInput.value;
                        convertBsToAd();
                    }
                }, 100); // Check every 100ms (more frequent)
                
                // Add event listener for BS to AD conversion on manual input
                mainInput.addEventListener('input', function() {
                    convertBsToAd();
                });
                
                // Add event listener for BS to AD conversion on change (datepicker selection)
                mainInput.addEventListener('change', function() {
                    convertBsToAd();
                });
                
                // Add event listener for BS to AD conversion on blur
                mainInput.addEventListener('blur', function() {
                    convertBsToAd();
                });
                
                // Also try to hook into click events on the datepicker
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.nepali-datepicker') || e.target.closest('#nepali_datepicker')) {
                        setTimeout(function() {
                            convertBsToAd();
                        }, 100);
                    }
                });
            }
            
            // Phone number validation
            if (phoneInput && phoneError) {
                phoneInput.addEventListener('input', function() {
                    // Allow only numeric digits
                    this.value = this.value.replace(/\D/g, '');
                    
                    var validation = validatePhoneNumber(this.value);
                    if (!validation.valid && this.value.length > 0) {
                        phoneError.textContent = validation.message;
                        phoneError.classList.add('show', 'error');
                        phoneInput.classList.add('is-invalid');
                        phoneInput.classList.remove('is-valid');
                    } else if (validation.valid) {
                        phoneError.textContent = '';
                        phoneError.classList.remove('show', 'error');
                        phoneInput.classList.remove('is-invalid');
                        phoneInput.classList.add('is-valid');
                    } else {
                        phoneError.textContent = '';
                        phoneError.classList.remove('show', 'error');
                        phoneInput.classList.remove('is-invalid', 'is-valid');
                    }
                });
            }
            
            // English to Nepali name transliteration
            if (nameInput && nameNpInput) {
                nameInput.addEventListener('input', function() {
                    var englishName = this.value.trim();
                    if (englishName) {
                        var nepaliName = transliterateToNepali(englishName);
                        nameNpInput.value = nepaliName;
                    } else {
                        nameNpInput.value = '';
                    }
                });
            }
        };
    </script>
</body>
</html>
