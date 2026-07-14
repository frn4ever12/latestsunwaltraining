<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nepal Municipality Training Management Portal - Skill Development and Employment Training">
    <title>तालिम व्यवस्थापन प्रणाली | सुनवल नगरपालिका</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* ============================================
           ROOT VARIABLES
           ============================================ */
        :root {
            --primary-color: #15803D;
            --secondary-color: #16A34A;
            --background: #F8FAFC;
            --white: #FFFFFF;
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
            --border-color: #E5E7EB;
            --shadow-soft: 0 4px 16px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 24px rgba(0, 0, 0, 0.12);
            --shadow-hover: 0 12px 32px rgba(0, 0, 0, 0.15);
            --border-radius: 18px;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: 'Poppins', 'Noto Sans Devanagari', system-ui, -apple-system, sans-serif;
            background: var(--background);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ============================================
           NOTICE BAR
           ============================================ */
        .notice-bar {
            background: var(--primary-color);
            color: white;
            padding: 10px 0;
            overflow: hidden;
        }

        .notice-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
            padding-right: 20px;
            border-right: 1px solid rgba(255, 255, 255, 0.3);
        }

        .notice-label i {
            font-size: 18px;
        }

        .notice-ticker {
            flex: 1;
            overflow: hidden;
            padding-left: 20px;
        }

        .notice-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            white-space: nowrap;
        }

        .notice-type {
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .notice-text {
            flex: 1;
        }

        .notice-date {
            opacity: 0.8;
            font-size: 12px;
        }

        /* ============================================
           SECTION 1: STICKY HEADER
           ============================================ */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--white);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
            transition: var(--transition-smooth);
        }

        .main-header.scrolled {
            padding: 8px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 60px;
            height: 60px;
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
        }

        .brand-text h1 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 11px;
            color: #4a5568;
            margin: 0;
            line-height: 1.3;
        }

        .menu-flag img {
            width: 35px;
            height: auto;
            margin-left: 12px;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 8px;
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background: #F0FDF4;
        }

        .nav-link.active {
            color: var(--primary-color);
            background: #F0FDF4;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 200px;
            padding: 8px 16px 8px 40px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 14px;
        }

        .lang-switch {
            display: flex;
            gap: 4px;
        }

        .lang-btn {
            padding: 6px 12px;
            border: 1px solid var(--border-color);
            background: white;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .lang-btn:hover,
        .lang-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .btn-header {
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .btn-login {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .btn-login:hover {
            background: #F0FDF4;
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-register:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--text-primary);
            cursor: pointer;
        }

        /* ============================================
           SECTION 2: HERO SECTION
           ============================================ */
        .hero-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #F0FDF4 0%, #FFFFFF 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 60%;
            height: 200%;
            background: radial-gradient(circle, rgba(22, 163, 74, 0.05) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-30px, 30px) rotate(180deg); }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #F0FDF4;
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero-badge i {
            font-size: 16px;
        }

        .hero-heading {
            font-size: 48px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .hero-description {
            font-size: 16px;
            color: var(--text-secondary);
            margin-bottom: 30px;
            max-width: 500px;
        }

        .hero-cta {
            display: flex;
            gap: 12px;
        }

        .btn-hero-primary {
            background: var(--primary-color);
            color: white;
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.25);
        }

        .btn-hero-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(21, 128, 61, 0.35);
        }

        .btn-hero-secondary {
            background: white;
            color: var(--primary-color);
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: 2px solid var(--primary-color);
            transition: var(--transition-smooth);
        }

        .btn-hero-secondary:hover {
            background: #F0FDF4;
            transform: translateY(-2px);
        }

        .hero-illustration {
            position: relative;
        }

        .hero-banner-img {
            width: 100%;
            max-width: 550px;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: var(--shadow-medium);
        }

        .floating-shape {
            position: absolute;
            background: rgba(22, 163, 74, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            top: 10%;
            left: -5%;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            bottom: 15%;
            right: -5%;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 40px;
            height: 40px;
            top: 50%;
            right: 10%;
            animation-delay: 4s;
        }

        /* ============================================
           SECTION 3: FEATURE STRIP
           ============================================ */
        .feature-strip {
            padding: 40px 0;
            background: white;
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .feature-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 24px;
            text-align: center;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-color);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: #F0FDF4;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
        }

        .feature-icon i {
            font-size: 24px;
            color: var(--primary-color);
        }

        .feature-card h5 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .feature-card p {
            font-size: 12px;
            color: var(--text-secondary);
            margin: 0;
        }

        /* ============================================
           SECTION 4: POPULAR TRAININGS
           ============================================ */
        .section-padding {
            padding: 60px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .section-subtitle {
            font-size: 14px;
            color: var(--text-secondary);
        }

        .training-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
        }

        .training-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .training-image {
            height: 160px;
            background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .training-image i {
            font-size: 48px;
            color: var(--primary-color);
        }

        .training-content {
            padding: 20px;
        }

        .training-badge {
            display: inline-block;
            background: #F0FDF4;
            color: var(--primary-color);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .training-card h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .training-details {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 12px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: var(--text-secondary);
        }

        .detail-item i {
            font-size: 13px;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .training-meta {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }

        .training-meta span {
            font-size: 12px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .training-meta i {
            font-size: 14px;
            color: var(--primary-color);
        }

        .training-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid var(--border-color);
        }

        .status-badge {
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .status-open {
            background: #DCFCE7;
            color: #16A34A;
        }

        .status-closed {
            background: #FEE2E2;
            color: #EF4444;
        }

        .btn-apply {
            background: var(--primary-color);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .btn-apply:hover {
            background: var(--secondary-color);
        }

        /* ============================================
           TRAINING FILTERS
           ============================================ */
        .training-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-soft);
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 180px;
        }

        .filter-group.filter-search {
            flex: 2;
            min-width: 250px;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
            display: block;
        }

        .filter-select,
        .filter-input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filter-input {
            cursor: text;
        }

        .filter-select:focus,
        .filter-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
        }

        .search-input-wrapper {
            position: relative;
        }

        .search-input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 16px;
        }

        .search-input-wrapper .filter-input {
            padding-left: 42px;
        }

        .btn-reset {
            padding: 10px 20px;
            background: #FEE2E2;
            color: #EF4444;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-reset:hover {
            background: #FECACA;
            transform: translateY(-1px);
        }

        .training-count {
            margin-bottom: 20px;
            font-size: 14px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .training-count span {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 16px;
        }

        .btn-view-all {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-color);
            color: white;
            padding: 12px 32px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.25);
        }

        .btn-view-all:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(21, 128, 61, 0.35);
        }

        .training-item {
            transition: var(--transition-smooth);
        }

        .training-item.hidden {
            display: none;
        }

        /* Modern Training Card Styles */
        .modern-training-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(21, 128, 61, 0.1);
            position: relative;
            overflow: hidden;
        }

        .modern-training-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(21, 128, 61, 0.2);
            border-color: rgba(21, 128, 61, 0.3);
        }

        .modern-training-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #15803D, #16A34A);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modern-training-card:hover::before {
            opacity: 1;
        }

        .modern-training-card .progress {
            background-color: #e9ecef;
            overflow: visible;
        }

        .modern-training-card .progress-bar {
            transition: width 0.6s ease;
            position: relative;
            border-radius: 4px;
        }

        .modern-training-card .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(21, 128, 61, 0.3);
        }

        .modern-training-card .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(21, 128, 61, 0.4);
        }

        .modern-training-card .badge {
            transition: transform 0.2s ease;
        }

        .modern-training-card:hover .badge {
            transform: scale(1.05);
        }

        /* ============================================
           TRAINING CALENDAR SECTION
           ============================================ */
        .training-calendar-section {
            background: linear-gradient(135deg, #F0FDF4 0%, #FFFFFF 100%);
        }

        .calendar-filters {
            background: white;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .calendar-filters .form-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .calendar-filters .form-select,
        .calendar-filters .form-control {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            font-size: 0.9rem;
            padding: 10px 12px;
        }

        .calendar-filters .form-select:focus,
        .calendar-filters .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
        }

        .calendar-filters .input-group .btn {
            border-radius: 0 10px 10px 0;
        }

        .training-count {
            background: white;
            padding: 12px 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            font-size: 0.9rem;
        }

        .training-count span {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        /* Category Card Styles */
        .category-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 24px rgba(21, 128, 61, 0.15);
            border-color: rgba(21, 128, 61, 0.2);
        }

        .category-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 20px;
            text-align: center;
            color: white;
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            line-height: 1;
        }

        .category-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: white;
        }

        .category-count {
            font-size: 0.8rem;
            opacity: 0.9;
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .category-training-list {
            padding: 16px;
            flex-grow: 1;
            overflow-y: auto;
            max-height: 400px;
        }

        /* Calendar Training Item */
        .calendar-training-item {
            background: #F8F9FA;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #E9ECEF;
            transition: all 0.2s ease;
        }

        .calendar-training-item:hover {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 2px 8px rgba(21, 128, 61, 0.1);
        }

        .training-item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
            gap: 8px;
        }

        .training-item-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
            flex-grow: 1;
            line-height: 1.3;
        }

        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            color: white;
            white-space: nowrap;
            font-size: 0.65rem;
            font-weight: 600;
        }

        .training-item-details {
            margin-bottom: 10px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .detail-row i {
            font-size: 0.8rem;
            color: var(--primary-color);
            width: 16px;
            text-align: center;
        }

        .detail-row.countdown {
            color: var(--primary-color);
            font-weight: 600;
        }

        .training-item-actions {
            display: flex;
            gap: 6px;
        }

        .training-item-actions .btn {
            flex: 1;
            font-size: 0.7rem;
            padding: 6px 8px;
            border-radius: 8px;
        }

        .no-trainings {
            text-align: center;
            padding: 30px 20px;
            color: var(--text-secondary);
        }

        .no-trainings i {
            font-size: 2rem;
            display: block;
            margin-bottom: 10px;
            opacity: 0.5;
        }

        .no-trainings span {
            font-size: 0.85rem;
        }

        .view-more-trainings {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #E9ECEF;
        }

        .view-more-trainings a {
            font-size: 0.8rem;
            text-decoration: none;
            font-weight: 600;
        }

        .view-more-trainings a:hover {
            text-decoration: underline;
        }

        .empty-state {
            background: white;
            border-radius: 16px;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--text-secondary);
            opacity: 0.3;
        }

        /* Responsive Adjustments */
        @media (max-width: 991px) {
            .category-card {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 767px) {
            .calendar-filters .row > div {
                margin-bottom: 12px;
            }
            
            .category-training-list {
                max-height: 300px;
            }
        }

        /* ============================================
           SECTION 6: STATISTICS
           ============================================ */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 60px 0;
            color: white;
        }

        .stat-card {
            text-align: center;
            padding: 30px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .stat-icon i {
            font-size: 28px;
            color: white;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* ============================================
           SECTION 6: LATEST NEWS
           ============================================ */
        .news-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
        }

        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .news-image {
            height: 140px;
            background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .news-image i {
            font-size: 40px;
            color: var(--primary-color);
        }

        .news-content {
            padding: 18px;
        }

        .news-date {
            font-size: 11px;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .news-card h5 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .news-excerpt {
            font-size: 12px;
            color: var(--text-secondary);
            margin-bottom: 12px;
        }

        .btn-read-more {
            color: var(--primary-color);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-read-more:hover {
            gap: 8px;
        }

        /* ============================================
           SECTION 7: QUICK SERVICES
           ============================================ */
        .services-section {
            background: #F0FDF4;
        }

        .service-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 24px;
            text-align: center;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-color);
        }

        .service-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .service-icon i {
            font-size: 26px;
            color: white;
        }

        .service-card h5 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .service-card p {
            font-size: 12px;
            color: var(--text-secondary);
            margin: 0;
        }

        /* ============================================
           SECTION 8: SUCCESS BANNER
           ============================================ */
        .success-banner {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 60px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .success-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -20%;
            width: 60%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        }

        .banner-content {
            position: relative;
            z-index: 1;
        }

        .banner-heading {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .banner-stats {
            display: flex;
            gap: 40px;
            margin-bottom: 30px;
        }

        .banner-stat h3 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .banner-stat p {
            font-size: 14px;
            opacity: 0.9;
            margin: 0;
        }

        .btn-banner {
            background: white;
            color: var(--primary-color);
            padding: 12px 32px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
            display: inline-block;
        }

        .btn-banner:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* ============================================
           SECTION 9: WHY CHOOSE US
           ============================================ */
        .why-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 24px;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-soft);
        }

        .why-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .why-icon {
            width: 48px;
            height: 48px;
            background: #F0FDF4;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .why-icon i {
            font-size: 22px;
            color: var(--primary-color);
        }

        .why-card h5 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .why-card p {
            font-size: 13px;
            color: var(--text-secondary);
            margin: 0;
        }

        /* ============================================
           SECTION 10: GALLERY
           ============================================ */
        .gallery-section {
            background: #F0FDF4;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-smooth);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(21, 128, 61, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            font-size: 32px;
            color: white;
        }

        /* ============================================
           SECTION 11: TESTIMONIALS
           ============================================ */
        .testimonial-slider {
            position: relative;
        }

        .testimonial-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow-soft);
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .testimonial-avatar i {
            font-size: 32px;
            color: white;
        }

        .testimonial-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .testimonial-training {
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 12px;
        }

        .testimonial-rating {
            display: flex;
            justify-content: center;
            gap: 4px;
            margin-bottom: 16px;
        }

        .testimonial-rating i {
            font-size: 14px;
            color: #F59E0B;
        }

        .testimonial-text {
            font-size: 14px;
            color: var(--text-secondary);
            font-style: italic;
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .slider-btn {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .slider-btn:hover {
            background: var(--secondary-color);
            transform: scale(1.1);
        }

        /* ============================================
           SECTION 12: FAQ
           ============================================ */
        .faq-section {
            background: #F0FDF4;
        }

        .accordion-item {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            margin-bottom: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
        }

        .accordion-button {
            background: white;
            border: none;
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .accordion-button:hover {
            background: #F8FAFC;
        }

        .accordion-button i {
            transition: var(--transition-smooth);
        }

        .accordion-button.active i {
            transform: rotate(180deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .accordion-content.active {
            max-height: 500px;
        }

        .accordion-body {
            padding: 16px 20px;
            font-size: 13px;
            color: var(--text-secondary);
            border-top: 1px solid var(--border-color);
        }

        /* ============================================
           SECTION 13: CONTACT
           ============================================ */
        .contact-info-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: var(--shadow-soft);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 16px;
        }

        .contact-info-item:last-child {
            margin-bottom: 0;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: #F0FDF4;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-icon i {
            font-size: 18px;
            color: var(--primary-color);
        }

        .contact-info h6 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .contact-info p {
            font-size: 12px;
            color: var(--text-secondary);
            margin: 0;
        }

        .map-container {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            height: 250px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .contact-form {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow-soft);
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
        }

        .btn-submit {
            background: var(--primary-color);
            color: white;
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--transition-smooth);
            width: 100%;
        }

        .btn-submit:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
        }

        /* ============================================
           SECTION 14: FOOTER
           ============================================ */
        .main-footer {
            background: #1F2937;
            color: white;
            padding: 60px 0 20px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .footer-logo {
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }

        .footer-brand h4 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .footer-brand p {
            font-size: 12px;
            opacity: 0.8;
            margin: 0;
        }

        .footer-description {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 8px;
        }

        .social-link {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition-smooth);
        }

        .social-link:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        .footer-heading {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 4px;
        }

        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .footer-contact-item i {
            color: var(--primary-color);
            font-size: 16px;
        }

        .footer-contact-item span {
            font-size: 13px;
            opacity: 0.8;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
        }

        .footer-bottom p {
            font-size: 12px;
            opacity: 0.7;
            margin: 0;
        }

        /* ============================================
           RESPONSIVE DESIGN
           ============================================ */
        @media (max-width: 1024px) {
            .hero-heading {
                font-size: 38px;
            }

            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .main-nav.active {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .header-actions {
                display: none;
            }

            .hero-section {
                padding: 40px 0;
            }

            .hero-heading {
                font-size: 32px;
            }

            .hero-cta {
                flex-direction: column;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .banner-stats {
                flex-direction: column;
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .hero-heading {
                font-size: 26px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 24px;
            }
        }

        /* ============================================
           ACCESSIBILITY
           ============================================ */
        *:focus-visible {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }

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
    </style>
</head>
<body>
    <!-- SECTION 1: STICKY HEADER -->
    <header class="main-header" id="mainHeader">
        <div class="container">
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
                    <a href="#hero" class="nav-link active">गृह</a>
                    <a href="#about" class="nav-link">बारेमा</a>
                    <a href="#trainings" class="nav-link">तालिम</a>
                    <a href="#news" class="nav-link">समाचार</a>
                    <a href="#notices" class="nav-link">सूचना</a>
                    <a href="#contact" class="nav-link">सम्पर्क</a>
                </nav>

                <div class="header-actions">
                    <div class="lang-switch">
                        <button class="lang-btn active">ने</button>
                        <button class="lang-btn">En</button>
                    </div>
                    <a href="{{ route('login') }}" class="btn-header btn-login">लगइन</a>
                    <a href="{{ route('register') }}" class="btn-header btn-register">दर्ता</a>
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

    <!-- NOTICE BAR -->
    <div class="notice-bar">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="notice-label">
                    <i class="bi bi-megaphone"></i>
                    <span>सूचना:</span>
                </div>
                <div class="notice-ticker">
                    @if($latestItems && $latestItems->count() > 0)
                        @foreach($latestItems as $item)
                            <div class="notice-item">
                                <span class="notice-type">{{ $item->type === 'samachar' ? 'समाचार' : 'सूचना' }}:</span>
                                <span class="notice-text">{{ $item->title_np }}</span>
                                <span class="notice-date">{{ \Carbon\Carbon::parse($item->miti_bs ?? $item->created_at)->format('Y-m-d') }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="notice-item">
                            <span class="notice-text">हाल कुनै सूचना छैन।</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: HERO SECTION -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-badge">
                        <i class="bi bi-award-fill"></i>
                        सीप सिकौं, आत्मनिर्भर बनौं
                    </div>
                    <h1 class="hero-heading">
                        सीप सिकौं,<br>
                        रोजगार बनौं,<br>
                        समृद्ध पालिका बनाऔं
                    </h1>
                    <p class="hero-description">
                        पालिकाद्वारा सञ्चालन गरिने विभिन्न सीप विकास तालिममा सहभागी भई आफ्नो भविष्य उज्ज्वल बनाउनुहोस्।
                    </p>
                    <div class="hero-cta">
                        <a href="#" class="btn-hero-primary">तालिम हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ route('register') }}" class="btn-hero-secondary">दर्ता गर्नुहोस्</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-illustration">
                        <div class="floating-shape shape-1"></div>
                        <div class="floating-shape shape-2"></div>
                        <div class="floating-shape shape-3"></div>
                        @if($banners && $banners->count() > 0)
                            @foreach($banners as $banner)
                                <img src="{{ asset('files/' . $banner->image) }}" 
                                     alt="{{ $banner->title }}" 
                                     class="hero-banner-img"
                                     onerror="this.style.display='none'">
                            @endforeach
                        @else
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=550&h=400&fit=crop" 
                                 alt="Training Session" 
                                 class="hero-banner-img">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: FEATURE STRIP -->
    <section class="feature-strip">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-2-4 col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>सरकारी प्रमाणित</h5>
                        <p>Government Certified</p>
                    </div>
                </div>
                <div class="col-lg-2-4 col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h5>निःशुल्क आवेदन</h5>
                        <p>Free Application</p>
                    </div>
                </div>
                <div class="col-lg-2-4 col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h5>रोजगार समर्थन</h5>
                        <p>Employment Support</p>
                    </div>
                </div>
                <div class="col-lg-2-4 col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h5>सीप विकास</h5>
                        <p>Skill Development</p>
                    </div>
                </div>
                <div class="col-lg-2-4 col-md-4 col-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5>महिला युवा प्राथमिकता</h5>
                        <p>Women & Youth Priority</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: POPULAR TRAININGS -->
    <section class="section-padding" id="trainings">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">लोकप्रिय तालिमहरू</h2>
                <p class="section-subtitle">Popular Trainings</p>
            </div>

            <!-- Training Filters -->
            <div class="training-filters">
                <div class="filter-group filter-search">
                    <label class="filter-label">तालिम खोज्नुहोस्...</label>
                    <div class="search-input-wrapper">
                        <i class="bi bi-search"></i>
                        <input type="text" class="filter-input" id="searchFilter" placeholder="तालिम खोज्नुहोस्...">
                    </div>
                </div>
                <div class="filter-group">
                    <label class="filter-label">विभाग</label>
                    <select class="filter-select" id="departmentFilter">
                        <option value="">सबै</option>
                        @if($departments)
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name_np ?? $department->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">श्रेणी</label>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">सबै</option>
                        @if($categories)
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_np ?? $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">वार्ड</label>
                    <select class="filter-select" id="wardFilter">
                        <option value="">सबै</option>
                        @if($wards)
                            @foreach($wards as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->name ?? $ward->name_eng }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">स्थिति</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="">सबै</option>
                        <option value="upcoming">आगामी</option>
                        <option value="active">खुला</option>
                        <option value="ongoing">चलिरहेको</option>
                        <option value="completed">सम्पन्न</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">प्रकार</label>
                    <select class="filter-select" id="typeFilter">
                        <option value="">सबै</option>
                        <option value="technical">प्राविधिक</option>
                        <option value="vocational">व्यावसायिक</option>
                        <option value="agriculture">कृषि</option>
                        <option value="computer">कम्प्युटर</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">मिति</label>
                    <input type="date" class="filter-input" id="dateFilter">
                </div>
                <button class="btn-reset" id="resetFilters">
                    <i class="bi bi-arrow-counterclockwise"></i> रिसेट
                </button>
            </div>

            <!-- Training Count -->
            <div class="training-count">
                <span id="trainingCount">{{ $trainings ? $trainings->count() : 0 }}</span> तालिमहरू देखाइएको छ
            </div>

            <div class="row g-4" id="trainingsGrid">
                @if($trainings && $trainings->count() > 0)
                    @foreach($trainings as $training)
                        @php
                            // Calculate seat percentage
                            $appliedCount = $training->training_applications_count ?? 0;
                            $totalSeats = $training->available_seats ?? 1;
                            $remainingSeats = $totalSeats - $appliedCount;
                            $seatPercentage = ($appliedCount / $totalSeats) * 100;
                            
                            // Determine seat progress color
                            if ($seatPercentage < 50) {
                                $seatProgressColor = '#28a745';
                            } elseif ($seatPercentage < 80) {
                                $seatProgressColor = '#ffc107';
                            } else {
                                $seatProgressColor = '#dc3545';
                            }
                            
                            // Calculate remaining days
                            $daysLeft = null;
                            if($training->application_deadline) {
                                try {
                                    $deadline = \Carbon\Carbon::parse($training->application_deadline);
                                    $now = \Carbon\Carbon::now();
                                    $daysLeft = $now->diffInDays($deadline, false);
                                    if($daysLeft < 0) $daysLeft = 0;
                                    $daysLeft = (int) $daysLeft;
                                } catch(\Exception $e) {
                                    $daysLeft = null;
                                }
                            }
                            
                            // Determine countdown color
                            if ($daysLeft !== null) {
                                if ($daysLeft > 7) {
                                    $countdownColor = '#28a745';
                                } elseif ($daysLeft > 3) {
                                    $countdownColor = '#ffc107';
                                } else {
                                    $countdownColor = '#dc3545';
                                }
                            }
                            
                            // Determine status badge
                            $statusBadge = '';
                            $statusColor = '';
                            if ($training->status == 'active') {
                                $statusBadge = '🟢 सक्रिय';
                                $statusColor = '#28a745';
                            } elseif ($training->status == 'upcoming') {
                                $statusBadge = '🕒 आगामी आउन लागेको';
                                $statusColor = '#17a2b8';
                            } elseif ($training->status == 'completed') {
                                $statusBadge = '✅ सम्पन्न';
                                $statusColor = '#6c757d';
                            } elseif ($training->status == 'dismissed') {
                                $statusBadge = '🔴 आवेदन बन्द';
                                $statusColor = '#dc3545';
                            } else {
                                $statusBadge = '🟢 आवेदन खुला';
                                $statusColor = '#28a745';
                            }
                            
                            // Format duration
                            $displayDate = 'N/A';
                            if($training->start_miti_bs && $training->end_miti_bs) {
                                try {
                                    $startDateParts = explode('-', $training->start_miti_bs);
                                    $endDateParts = explode('-', $training->end_miti_bs);
                                    $startDay = $startDateParts[2] ?? '';
                                    $startMonth = $startDateParts[1] ?? '';
                                    $endDay = $endDateParts[2] ?? '';
                                    $endMonth = $endDateParts[1] ?? '';
                                    $displayDate = \App\Helpers\NumberHelper::toNepaliNumber($startDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($startMonth) . ' – ' . \App\Helpers\NumberHelper::toNepaliNumber($endDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($endMonth);
                                } catch(\Exception $e) {
                                    $displayDate = $training->start_miti_bs . ' – ' . $training->end_miti_bs;
                                }
                            } elseif($training->start_miti_bs) {
                                $displayDate = $training->start_miti_bs;
                            }
                            
                            // Check if application is open
                            $applicationOpen = $training->status === 'upcoming' && $remainingSeats > 0;
                        @endphp
                        <div class="col-lg-4 col-md-6 training-item" 
                             data-department="{{ $training->department_id ?? '' }}"
                             data-category="{{ $training->category_id ?? '' }}"
                             data-status="{{ $training->status ?? '' }}"
                             data-ward="{{ $training->ward_id ?? '' }}"
                             data-type="{{ $training->type ?? '' }}"
                             data-date="{{ \Carbon\Carbon::parse($training->start_date ?? now())->format('Y-m-d') }}"
                             data-title="{{ $training->name_np ?? $training->title }}">
                            <div class="training-card modern-training-card" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <!-- Status Badge -->
                                <div class="position-absolute top-0 start-0 m-2">
                                    <span class="badge rounded-pill px-2 py-1" style="background-color: {{ $statusColor }}; font-size: 0.7rem; font-weight: 600;">
                                        {{ $statusBadge }}
                                    </span>
                                </div>
                                
                                <div class="training-content p-3">
                                    <!-- Training Title -->
                                    <h6 class="fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">
                                        <i class="bi bi-mortarboard me-1"></i>
                                        {{ $training->name_np ?? $training->title }}
                                    </h6>
                                    
                                    <!-- Trainer Information -->
                                    <div class="mb-2">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-person me-1"></i> प्रशिक्षक
                                        </small>
                                        <div class="fw-bold" style="font-size: 0.85rem;">{{ $training->trainer_name_np ?? ($training->trainer_name_eng ?? 'N/A') }}</div>
                                    </div>
                                    
                                    <!-- Organizer -->
                                    <div class="mb-2">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-building me-1"></i> आयोजक
                                        </small>
                                        <div class="fw-bold" style="font-size: 0.85rem;">सुनवल नगरपालिका</div>
                                    </div>
                                    
                                    <!-- Training Duration -->
                                    <div class="mb-2">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-calendar me-1"></i> अवधि
                                        </small>
                                        <div class="fw-bold" style="font-size: 0.85rem;">{{ $displayDate }}</div>
                                    </div>
                                    
                                    <!-- Venue -->
                                    <div class="mb-2">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-geo-alt me-1"></i> स्थान
                                        </small>
                                        <div class="fw-bold" style="font-size: 0.85rem;">{{ $training->training_location ?? 'N/A' }}</div>
                                    </div>
                                    
                                    <!-- Seat Availability -->
                                    <div class="mb-2">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-people me-1"></i> उपलब्ध सिट
                                        </small>
                                        <div class="d-flex align-items-center mb-1">
                                            <span class="fw-bold me-2" style="color: var(--primary-color); font-size: 0.85rem;">
                                                {{ $remainingSeats }} / {{ $totalSeats }}
                                            </span>
                                        </div>
                                        <div class="progress" style="height: 6px; border-radius: 4px;">
                                            <div class="progress-bar" role="progressbar" 
                                                 style="width: {{ $seatPercentage }}%; background-color: {{ $seatProgressColor }};"
                                                 aria-valuenow="{{ $seatPercentage }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Countdown -->
                                    @if($daysLeft !== null)
                                    <div class="mb-2 p-2 rounded" style="background-color: #f8f9fa;">
                                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-clock me-1"></i> बाँकी दिन
                                        </small>
                                        <div class="fw-bold" style="color: {{ $countdownColor }}; font-size: 0.9rem;">
                                            {{ $daysLeft }} दिन
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2 mt-3">
                                        <a href="{{ route('training.show', $training->id) }}" 
                                           class="btn btn-outline-primary flex-grow-1 rounded-pill"
                                           style="border-radius: 20px; padding: 6px 12px; font-size: 0.8rem;">
                                            <i class="bi bi-eye me-1"></i> विवरण
                                        </a>
                                        @if($applicationOpen)
                                            <a href="{{ route('training-application.index', $training->id) }}" 
                                               class="btn btn-primary flex-grow-1 rounded-pill"
                                               style="border-radius: 20px; padding: 6px 12px; font-size: 0.8rem; background: linear-gradient(135deg, #15803D 0%, #16A34A 100%);">
                                                <i class="bi bi-envelope me-1"></i> आवेदन
                                            </a>
                                        @else
                                            <button class="btn btn-secondary flex-grow-1 rounded-pill" disabled
                                                    style="border-radius: 20px; padding: 6px 12px; font-size: 0.8rem;">
                                                <i class="bi bi-x-circle me-1"></i> आवेदन बन्द
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-inbox fa-4x text-muted mb-3"></i>
                        <p class="text-muted">हाल कुनै तालिम उपलब्ध छैन।</p>
                    </div>
                @endif
            </div>

            <!-- View All Button -->
            <div class="text-center mt-4">
                <a href="{{ route('training.index') }}" class="btn-view-all">
                    <i class="bi bi-grid"></i> सबै तालिमहरू हेर्नुहोस्
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 5: TRAINING CALENDAR -->
    <section class="section-padding training-calendar-section" id="training-calendar">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">📅 तालिम पात्रो</h2>
                <p class="section-subtitle">यस महिनाका उपलब्ध तालिम कार्यक्रमहरू</p>
            </div>

            <!-- Calendar Filters -->
            <div class="calendar-filters mb-4">
                <div class="row g-3">
                    <div class="col-lg-2 col-md-4">
                        <label class="form-label fw-bold">वर्ष (BS)</label>
                        <select class="form-select" id="bsYearFilter">
                            <option value="2080">२०८०</option>
                            <option value="2081">२०८१</option>
                            <option value="2082">२०८२</option>
                            <option value="2083" selected>२०८३</option>
                            <option value="2084">२०८४</option>
                            <option value="2085">२०८५</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <label class="form-label fw-bold">महिना (BS)</label>
                        <select class="form-select" id="bsMonthFilter">
                            <option value="1">बैशाख</option>
                            <option value="2">जेठ</option>
                            <option value="3">असार</option>
                            <option value="4" selected>श्रावण</option>
                            <option value="5">भदौ</option>
                            <option value="6">आश्विन</option>
                            <option value="7">कार्तिक</option>
                            <option value="8">मंसिर</option>
                            <option value="9">पुष</option>
                            <option value="10">माघ</option>
                            <option value="11">फाल्गुण</option>
                            <option value="12">चैत</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <label class="form-label fw-bold">श्रेणी</label>
                        <select class="form-select" id="calendarCategoryFilter">
                            <option value="">सबै</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_np ?? $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <label class="form-label fw-bold">स्थिति</label>
                        <select class="form-select" id="calendarStatusFilter">
                            <option value="">सबै</option>
                            <option value="upcoming">आगामी</option>
                            <option value="active">सक्रिय</option>
                            <option value="ongoing">चलिरहेको</option>
                            <option value="completed">सम्पन्न</option>
                            <option value="dismissed">बन्द</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label class="form-label fw-bold">तालिम खोज्नुहोस्</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="calendarSearchInput" placeholder="तालिम खोज्नुहोस्...">
                            <button class="btn btn-primary" type="button" id="calendarSearchBtn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Training Count -->
            <div class="training-count mb-4">
                <span id="calendarTrainingCount">०</span> तालिमहरू देखाइएको छ
            </div>

            <!-- Category Cards Grid -->
            <div class="row g-4" id="calendarCategoriesGrid">
                @if($categories && $categories->count() > 0)
                    @foreach($categories as $category)
                        @php
                            $categoryTrainings = $trainings ? $trainings->where('category_id', $category->id) : collect();
                        @endphp
                        <div class="col-lg-3 col-md-4 col-sm-6 category-card-wrapper" 
                             data-category-id="{{ $category->id }}"
                             data-category-name="{{ $category->name_np ?? $category->name }}">
                            <div class="category-card">
                                <div class="category-header">
                                    <div class="category-icon">
                                        @if($category->name_np)
                                            @if(str_contains($category->name_np, 'कृषि'))
                                                🌾
                                            @elseif(str_contains($category->name_np, 'सूचना') || str_contains($category->name_np, 'कम्प्युटर'))
                                                💻
                                            @elseif(str_contains($category->name_np, 'स्वास्थ्य'))
                                                🏥
                                            @elseif(str_contains($category->name_np, 'पर्यटन') || str_contains($category->name_np, 'आतिथ्य'))
                                                🏨
                                            @elseif(str_contains($category->name_np, 'शिक्षा'))
                                                📚
                                            @elseif(str_contains($category->name_np, 'इन्जिनियरिङ'))
                                                🏗️
                                            @elseif(str_contains($category->name_np, 'घरेलु') || str_contains($category->name_np, 'हस्तकला'))
                                                🧵
                                            @elseif(str_contains($category->name_np, 'उद्यम'))
                                                💼
                                            @elseif(str_contains($category->name_np, 'व्यवस्थापन'))
                                                🏢
                                            @else
                                                🛠️
                                            @endif
                                        @else
                                            🛠️
                                        @endif
                                    </div>
                                    <h6 class="category-title">{{ $category->name_np ?? $category->name }}</h6>
                                    <span class="category-count">{{ $categoryTrainings->count() }} तालिम</span>
                                </div>
                                <div class="category-training-list">
                                    @if($categoryTrainings->count() > 0)
                                        @foreach($categoryTrainings->take(3) as $training)
                                            @php
                                                // Calculate remaining days
                                                $daysLeft = null;
                                                if($training->application_deadline) {
                                                    try {
                                                        $deadline = \Carbon\Carbon::parse($training->application_deadline);
                                                        $now = \Carbon\Carbon::now();
                                                        $daysLeft = $now->diffInDays($deadline, false);
                                                        if($daysLeft < 0) $daysLeft = 0;
                                                        $daysLeft = (int) $daysLeft;
                                                    } catch(\Exception $e) {
                                                        $daysLeft = null;
                                                    }
                                                }
                                                
                                                // Determine status badge
                                                $statusBadge = '';
                                                $statusColor = '';
                                                if ($training->status == 'active') {
                                                    $statusBadge = '🟢 आवेदन खुला';
                                                    $statusColor = '#28a745';
                                                } elseif ($training->status == 'upcoming') {
                                                    $statusBadge = '🟡 आगामी';
                                                    $statusColor = '#ffc107';
                                                } elseif ($training->status == 'ongoing') {
                                                    $statusBadge = '🔵 चलिरहेको';
                                                    $statusColor = '#17a2b8';
                                                } elseif ($training->status == 'completed') {
                                                    $statusBadge = '⚪ सम्पन्न';
                                                    $statusColor = '#6c757d';
                                                } elseif ($training->status == 'dismissed') {
                                                    $statusBadge = '🔴 आवेदन बन्द';
                                                    $statusColor = '#dc3545';
                                                } else {
                                                    $statusBadge = '🟢 आवेदन खुला';
                                                    $statusColor = '#28a745';
                                                }
                                                
                                                // Calculate remaining seats
                                                $appliedCount = $training->training_applications_count ?? 0;
                                                $totalSeats = $training->available_seats ?? 1;
                                                $remainingSeats = $totalSeats - $appliedCount;
                                                
                                                // Format dates
                                                $displayStartDate = 'N/A';
                                                $displayEndDate = 'N/A';
                                                if($training->start_miti_bs) {
                                                    try {
                                                        $startDateParts = explode('-', $training->start_miti_bs);
                                                        $startDay = $startDateParts[2] ?? '';
                                                        $startMonth = $startDateParts[1] ?? '';
                                                        $displayStartDate = \App\Helpers\NumberHelper::toNepaliNumber($startDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($startMonth);
                                                    } catch(\Exception $e) {
                                                        $displayStartDate = $training->start_miti_bs;
                                                    }
                                                }
                                                if($training->end_miti_bs) {
                                                    try {
                                                        $endDateParts = explode('-', $training->end_miti_bs);
                                                        $endDay = $endDateParts[2] ?? '';
                                                        $endMonth = $endDateParts[1] ?? '';
                                                        $displayEndDate = \App\Helpers\NumberHelper::toNepaliNumber($endDay) . ' ' . \App\Helpers\NumberHelper::toNepaliMonth($endMonth);
                                                    } catch(\Exception $e) {
                                                        $displayEndDate = $training->end_miti_bs;
                                                    }
                                                }
                                            @endphp
                                            <div class="calendar-training-item" 
                                                 data-status="{{ $training->status }}"
                                                 data-title="{{ $training->name_np ?? $training->title }}"
                                                 data-start-date="{{ $training->start_miti_bs ?? '' }}"
                                                 data-end-date="{{ $training->end_miti_bs ?? '' }}">
                                                <div class="training-item-header">
                                                    <span class="training-item-name">{{ $training->name_np ?? $training->title }}</span>
                                                    <span class="status-badge" style="background-color: {{ $statusColor }}; font-size: 0.65rem;">{{ $statusBadge }}</span>
                                                </div>
                                                <div class="training-item-details">
                                                    <div class="detail-row">
                                                        <i class="bi bi-calendar"></i>
                                                        <span>{{ $displayStartDate }} - {{ $displayEndDate }}</span>
                                                    </div>
                                                    <div class="detail-row">
                                                        <i class="bi bi-geo-alt"></i>
                                                        <span>{{ $training->training_location ?? 'नगरपालिका कार्यालय' }}</span>
                                                    </div>
                                                    <div class="detail-row">
                                                        <i class="bi bi-people"></i>
                                                        <span>बाँकी सिट: {{ $remainingSeats }}</span>
                                                    </div>
                                                    @if($daysLeft !== null)
                                                    <div class="detail-row countdown">
                                                        <i class="bi bi-clock"></i>
                                                        <span>तालिम सुरु हुन बाँकी: {{ $daysLeft }} दिन</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="training-item-actions">
                                                    <a href="{{ route('training.show', $training->id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-file-text"></i> विवरण
                                                    </a>
                                                    @if($training->status === 'upcoming' && $remainingSeats > 0)
                                                    <a href="{{ route('training-application.index', $training->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil"></i> आवेदन
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($categoryTrainings->count() > 3)
                                            <div class="view-more-trainings">
                                                <a href="{{ route('training.index', ['category' => $category->id]) }}" class="text-primary">
                                                    थप {{ $categoryTrainings->count() - 3 }} तालिमहरू हेर्नुहोस् →
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="no-trainings">
                                            <i class="bi bi-inbox"></i>
                                            <span>कुनै तालिम छैन</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-calendar-x fa-4x text-muted mb-3"></i>
                        <p class="text-muted">हाल कुनै तालिम उपलब्ध छैन।</p>
                    </div>
                @endif
            </div>

            <!-- Empty State (Hidden by default) -->
            <div class="empty-state text-center py-5 d-none" id="calendarEmptyState">
                <i class="bi bi-calendar-x fa-4x text-muted mb-3"></i>
                <p class="text-muted">हाल कुनै तालिम उपलब्ध छैन।</p>
            </div>
        </div>
    </section>

    <!-- SECTION 6: STATISTICS -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3 class="stat-number" data-target="100">0</h3>
                        <p class="stat-label">कुल तालिमहरू</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="stat-number" data-target="2000">0</h3>
                        <p class="stat-label">आवेदकहरू</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3 class="stat-number" data-target="1500">0</h3>
                        <p class="stat-label">प्रमाणपत्रहरू</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="stat-number" data-target="95">0</h3>
                        <p class="stat-label">सफलता दर (%)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: LATEST NEWS -->
    <section class="section-padding" id="news">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">नवीनतम समाचार</h2>
                <p class="section-subtitle">Latest News & Notices</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-image">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <div class="news-content">
                            <p class="news-date">२०८३ असार १५</p>
                            <h5>नयाँ तालिम कार्यक्रम सुरु</h5>
                            <p class="news-excerpt">पालिकाले नयाँ तालिम कार्यक्रम सुरु गरेको छ...</p>
                            <a href="#" class="btn-read-more">थप पढ्नुहोस् <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-image">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="news-content">
                            <p class="news-date">२०८३ असार १०</p>
                            <h5>तालिम आवेदन सूचना</h5>
                            <p class="news-excerpt">आगामी तालिमको लागि आवेदन खुला छ...</p>
                            <a href="#" class="btn-read-more">थप पढ्नुहोस् <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-card">
                        <div class="news-image">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="news-content">
                            <p class="news-date">२०८३ असार ५</p>
                            <h5>प्रमाणपत्र वितरण कार्यक्रम</h5>
                            <p class="news-excerpt">सफल तालिमार्थीहरूलाई प्रमाणपत्र वितरण...</p>
                            <a href="#" class="btn-read-more">थप पढ्नुहोस् <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: QUICK SERVICES -->
    <section class="section-padding services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">द्रुत सेवाहरू</h2>
                <p class="section-subtitle">Quick Services</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-file-earmark-plus"></i>
                        </div>
                        <h5>अनलाइन आवेदन</h5>
                        <p>Apply Online</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h5>आवेदन स्थिति</h5>
                        <p>Application Status</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>प्रमाणपत्र प्रमाणित</h5>
                        <p>Verify Certificate</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-download"></i>
                        </div>
                        <h5>प्रमाणपत्र डाउनलोड</h5>
                        <p>Download Certificate</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <h5>प्रश्नोत्तर</h5>
                        <p>FAQ</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h5>सहयोग</h5>
                        <p>Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: SUCCESS BANNER -->
    <section class="success-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <h2 class="banner-heading">सीप आजको आवश्यकता, समृद्ध भविष्यको सुनिश्चितता</h2>
                        <div class="banner-stats">
                            <div class="banner-stat">
                                <h3>२०००+</h3>
                                <p>आवेदकहरू</p>
                            </div>
                            <div class="banner-stat">
                                <h3>१००+</h3>
                                <p>तालिमहरू</p>
                            </div>
                            <div class="banner-stat">
                                <h3>९५%</h3>
                                <p>सफलता दर</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <a href="#" class="btn-banner">थप जान्नुहोस् <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 9: WHY CHOOSE US -->
    <section class="section-padding" id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">हामीलाई किन रोज्नुहुन्छ?</h2>
                <p class="section-subtitle">Why Choose Us</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>सरकारी प्रमाणित</h5>
                        <p>सरकारद्वारा प्रमाणित गुणस्तरीय तालिम कार्यक्रमहरू</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h5>अनुभवी प्रशिक्षक</h5>
                        <p>अनुभवी र दक्ष प्रशिक्षकद्वारा तालिम प्रदान</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5>डिजिटल प्रमाणपत्र</h5>
                        <p>डिजिटल प्रमाणपत्र र QR कोड सहित</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-pc-display"></i>
                        </div>
                        <h5>आधुनिक प्रयोगशाला</h5>
                        <p>आधुनिक सुविधासहित प्रयोगशाला</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h5>निःशुल्क तालिम</h5>
                        <p>पूर्ण रूपमा निःशुल्क तालिम कार्यक्रम</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h5>रोजगार समर्थन</h5>
                        <p>रोजगार अवसर र समर्थन प्रदान</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 10: GALLERY -->
    <section class="section-padding gallery-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">तालिम ग्यालरी</h2>
                <p class="section-subtitle">Training Gallery</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x300/F0FDF4/15803D?text=Training+1" alt="Training">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x300/F0FDF4/15803D?text=Training+2" alt="Training">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x300/F0FDF4/15803D?text=Training+3" alt="Training">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x300/F0FDF4/15803D?text=Training+4" alt="Training">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 11: TESTIMONIALS -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">तालिमार्थी प्रतिक्रिया</h2>
                <p class="section-subtitle">Student Testimonials</p>
            </div>
            <div class="testimonial-slider">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="testimonial-card">
                            <div class="testimonial-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <h4 class="testimonial-name">राम बहादुर</h4>
                            <p class="testimonial-training">कम्प्युटर तालिम</p>
                            <div class="testimonial-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "यो तालिमले मेरो जीवन परिवर्तन गर्यो। अब म एक राम्रो नोकरीमा छु।"
                            </p>
                        </div>
                    </div>
                </div>
                <div class="slider-controls">
                    <button class="slider-btn"><i class="bi bi-chevron-left"></i></button>
                    <button class="slider-btn"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 12: FAQ -->
    <section class="section-padding faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">सामान्य प्रश्नहरू</h2>
                <p class="section-subtitle">Frequently Asked Questions</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion-item">
                        <button class="accordion-button active">
                            <span>तालिममा भाग लिन कसरी आवेदन गर्नुहुन्छ?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="accordion-content active">
                            <div class="accordion-body">
                                तालिममा भाग लिन अनलाइन आवेदन फर्म भर्नुहोस् र आवश्यक कागजातहरू अपलोड गर्नुहोस्।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button">
                            <span>तालिम निःशुल्क छ?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="accordion-body">
                                हो, सबै तालिम कार्यक्रमहरू पूर्ण रूपमा निःशुल्क छन्।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button">
                            <span>प्रमाणपत्र कसरी प्राप्त गर्नुहुन्छ?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="accordion-body">
                                तालिम सम्पन्न पश्चात सफल तालिमार्थीहरूलाई डिजिटल प्रमाणपत्र प्रदान गरिन्छ।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button">
                            <span>तालिमको अवधि कति हुन्छ?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="accordion-body">
                                तालिमको अवधि कार्यक्रम अनुसार ३० दिनदेखि ६० दिनसम्म हुन्छ।
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 13: CONTACT -->
    <section class="section-padding" id="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">सम्पर्क गर्नुहोस्</h2>
                <p class="section-subtitle">Contact Us</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="contact-info">
                                <h6>ठेगाना</h6>
                                <p>सुनवल नगरपालिका कार्यालय, नेपाल</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="contact-info">
                                <h6>फोन</h6>
                                <p>+९७७-०१-४xxxxxxx</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="contact-info">
                                <h6>इमेल</h6>
                                <p>info@sunwal.gov.np</p>
                            </div>
                        </div>
                    </div>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.123456789!2d83.123456789!3d27.123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDA3JzI0LjQiTiA4M8KwMDcnMjMuNCJF!5e0!3m2!1sen!2snp!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">नाम</label>
                                        <input type="text" class="form-control" placeholder="तपाईंको नाम">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">इमेल</label>
                                        <input type="email" class="form-control" placeholder="तपाईंको इमेल">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">विषय</label>
                                <input type="text" class="form-control" placeholder="सन्देशको विषय">
                            </div>
                            <div class="form-group">
                                <label class="form-label">सन्देश</label>
                                <textarea class="form-control" rows="5" placeholder="तपाईंको सन्देश"></textarea>
                            </div>
                            <button type="submit" class="btn-submit">पठाउनुहोस्</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 14: FOOTER -->
    <footer class="main-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <i class="bi bi-building"></i>
                        </div>
                        <div>
                            <h4>सुनवल नगरपालिका</h4>
                            <p>तालिम व्यवस्थापन प्रणाली</p>
                        </div>
                    </div>
                    <p class="footer-description">
                        सुनवल नगरपालिकाको तालिम व्यवस्थापन प्रणालीमा तपाईंलाई स्वागत छ। हामी गुणस्तरीय सीप विकास तालिम प्रदान गर्दछौं।
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">द्रुत लिंकहरू</h5>
                    <ul class="footer-links">
                        <li><a href="#">गृह</a></li>
                        <li><a href="#">बारेमा</a></li>
                        <li><a href="#">तालिम</a></li>
                        <li><a href="#">समाचार</a></li>
                        <li><a href="#">सम्पर्क</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">तालिम लिंकहरू</h5>
                    <ul class="footer-links">
                        <li><a href="#">कम्प्युटर</a></li>
                        <li><a href="#">सिलाई</a></li>
                        <li><a href="#">इलेक्ट्रिकल</a></li>
                        <li><a href="#">कृषि</a></li>
                        <li><a href="#">अन्य</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-heading">सहयोग</h5>
                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">सहयोग केन्द्र</a></li>
                        <li><a href="#">गोपनीयता नीति</a></li>
                        <li><a href="#">सर्तहरू</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
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
        // ============================================
        // STICKY HEADER
        // ============================================
        const header = document.getElementById('mainHeader');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // ============================================
        // MOBILE MENU
        // ============================================
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');

        mobileMenuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-list');
            icon.classList.toggle('bi-x');
        });

        // ============================================
        // COUNTER ANIMATION
        // ============================================
        const statNumbers = document.querySelectorAll('.stat-number');
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    animateCounter(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        statNumbers.forEach(stat => {
            observer.observe(stat);
        });

        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 30);
        }

        // ============================================
        // ACCORDION
        // ============================================
        const accordionButtons = document.querySelectorAll('.accordion-button');
        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const isActive = this.classList.contains('active');

                // Close all accordions
                accordionButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.nextElementSibling.classList.remove('active');
                });

                // Open clicked accordion if it wasn't active
                if (!isActive) {
                    this.classList.add('active');
                    content.classList.add('active');
                }
            });
        });

        // ============================================
        // SMOOTH SCROLL
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ============================================
        // TRAINING CALENDAR FILTERING
        // ============================================
        const bsYearFilter = document.getElementById('bsYearFilter');
        const bsMonthFilter = document.getElementById('bsMonthFilter');
        const calendarCategoryFilter = document.getElementById('calendarCategoryFilter');
        const calendarStatusFilter = document.getElementById('calendarStatusFilter');
        const calendarSearchInput = document.getElementById('calendarSearchInput');
        const calendarSearchBtn = document.getElementById('calendarSearchBtn');
        const calendarCategoriesGrid = document.getElementById('calendarCategoriesGrid');
        const calendarTrainingCount = document.getElementById('calendarTrainingCount');
        const calendarEmptyState = document.getElementById('calendarEmptyState');

        function filterCalendar() {
            const yearValue = bsYearFilter ? bsYearFilter.value : '2083';
            const monthValue = bsMonthFilter ? bsMonthFilter.value : '4';
            const categoryValue = calendarCategoryFilter ? calendarCategoryFilter.value : '';
            const statusValue = calendarStatusFilter ? calendarStatusFilter.value : '';
            const searchValue = calendarSearchInput ? calendarSearchInput.value.toLowerCase() : '';

            const categoryWrappers = document.querySelectorAll('.category-card-wrapper');
            let totalVisibleTrainings = 0;

            categoryWrappers.forEach(wrapper => {
                const categoryId = wrapper.getAttribute('data-category-id');
                const categoryName = wrapper.getAttribute('data-category-name').toLowerCase();
                const trainingItems = wrapper.querySelectorAll('.calendar-training-item');
                let visibleTrainingsInCategory = 0;

                // Filter category based on category filter
                let showCategory = true;
                if (categoryValue && categoryId !== categoryValue) {
                    showCategory = false;
                }

                // Filter training items
                trainingItems.forEach(item => {
                    const itemStatus = item.getAttribute('data-status');
                    const itemTitle = item.getAttribute('data-title').toLowerCase();
                    const itemStartDate = item.getAttribute('data-start-date');
                    const itemEndDate = item.getAttribute('data-end-date');

                    // Check if training matches the selected month/year
                    let matchesDate = true;
                    if (itemStartDate) {
                        const dateParts = itemStartDate.split('-');
                        if (dateParts.length >= 2) {
                            const itemYear = dateParts[0];
                            const itemMonth = dateParts[1];
                            if (itemYear !== yearValue || itemMonth !== monthValue) {
                                matchesDate = false;
                            }
                        }
                    }

                    // Check status filter
                    const matchesStatus = !statusValue || itemStatus === statusValue;

                    // Check search filter
                    const matchesSearch = !searchValue || itemTitle.includes(searchValue);

                    if (matchesDate && matchesStatus && matchesSearch && showCategory) {
                        item.style.display = 'block';
                        visibleTrainingsInCategory++;
                        totalVisibleTrainings++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide category card based on visible trainings
                if (showCategory && visibleTrainingsInCategory > 0) {
                    wrapper.style.display = 'block';
                } else {
                    wrapper.style.display = 'none';
                }
            });

            // Update training count
            if (calendarTrainingCount) {
                calendarTrainingCount.textContent = totalVisibleTrainings;
            }

            // Show/hide empty state
            if (calendarEmptyState) {
                if (totalVisibleTrainings === 0) {
                    calendarEmptyState.classList.remove('d-none');
                    calendarCategoriesGrid.classList.add('d-none');
                } else {
                    calendarEmptyState.classList.add('d-none');
                    calendarCategoriesGrid.classList.remove('d-none');
                }
            }
        }

        // Add event listeners
        if (bsYearFilter) {
            bsYearFilter.addEventListener('change', filterCalendar);
        }
        if (bsMonthFilter) {
            bsMonthFilter.addEventListener('change', filterCalendar);
        }
        if (calendarCategoryFilter) {
            calendarCategoryFilter.addEventListener('change', filterCalendar);
        }
        if (calendarStatusFilter) {
            calendarStatusFilter.addEventListener('change', filterCalendar);
        }
        if (calendarSearchInput) {
            calendarSearchInput.addEventListener('input', filterCalendar);
        }
        if (calendarSearchBtn) {
            calendarSearchBtn.addEventListener('click', filterCalendar);
        }

        // Initialize calendar filter on page load
        document.addEventListener('DOMContentLoaded', function() {
            filterCalendar();
        });

        // ============================================
        // TRAINING FILTERS
        // ============================================
        const searchFilter = document.getElementById('searchFilter');
        const departmentFilter = document.getElementById('departmentFilter');
        const categoryFilter = document.getElementById('categoryFilter');
        const wardFilter = document.getElementById('wardFilter');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const dateFilter = document.getElementById('dateFilter');
        const resetBtn = document.getElementById('resetFilters');
        const trainingItems = document.querySelectorAll('.training-item');
        const trainingCount = document.getElementById('trainingCount');

        function filterTrainings() {
            const searchValue = searchFilter ? searchFilter.value.toLowerCase() : '';
            const departmentValue = departmentFilter ? departmentFilter.value : '';
            const categoryValue = categoryFilter ? categoryFilter.value : '';
            const wardValue = wardFilter ? wardFilter.value : '';
            const statusValue = statusFilter ? statusFilter.value : '';
            const typeValue = typeFilter ? typeFilter.value : '';
            const dateValue = dateFilter ? dateFilter.value : '';

            let visibleCount = 0;

            trainingItems.forEach(item => {
                const itemTitle = item.getAttribute('data-title') ? item.getAttribute('data-title').toLowerCase() : '';
                const itemDepartment = item.getAttribute('data-department') || '';
                const itemCategory = item.getAttribute('data-category') || '';
                const itemWard = item.getAttribute('data-ward') || '';
                const itemStatus = item.getAttribute('data-status') || '';
                const itemType = item.getAttribute('data-type') || '';
                const itemDate = item.getAttribute('data-date') || '';

                const matchSearch = !searchValue || itemTitle.includes(searchValue);
                const matchDepartment = !departmentValue || itemDepartment === departmentValue;
                const matchCategory = !categoryValue || itemCategory === categoryValue;
                const matchWard = !wardValue || itemWard === wardValue;
                const matchStatus = !statusValue || itemStatus === statusValue;
                const matchType = !typeValue || itemType === typeValue;
                const matchDate = !dateValue || itemDate === dateValue;

                if (matchSearch && matchDepartment && matchCategory && matchWard && matchStatus && matchType && matchDate) {
                    item.classList.remove('hidden');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (trainingCount) {
                trainingCount.textContent = visibleCount;
            }
        }

        if (searchFilter) {
            searchFilter.addEventListener('input', filterTrainings);
        }
        if (departmentFilter) {
            departmentFilter.addEventListener('change', filterTrainings);
        }
        if (categoryFilter) {
            categoryFilter.addEventListener('change', filterTrainings);
        }
        if (wardFilter) {
            wardFilter.addEventListener('change', filterTrainings);
        }
        if (statusFilter) {
            statusFilter.addEventListener('change', filterTrainings);
        }
        if (typeFilter) {
            typeFilter.addEventListener('change', filterTrainings);
        }
        if (dateFilter) {
            dateFilter.addEventListener('change', filterTrainings);
        }
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                if (searchFilter) searchFilter.value = '';
                if (departmentFilter) departmentFilter.value = '';
                if (categoryFilter) categoryFilter.value = '';
                if (wardFilter) wardFilter.value = '';
                if (statusFilter) statusFilter.value = '';
                if (typeFilter) typeFilter.value = '';
                if (dateFilter) dateFilter.value = '';
                filterTrainings();
            });
        }

        // ============================================
        // SMOOTH SCROLL & SCROLL SPY
        // ============================================
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id]');

        // Smooth scroll for nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        const headerHeight = document.querySelector('.main-header').offsetHeight;
                        const targetPosition = targetSection.offsetTop - headerHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Scroll spy for active menu highlighting
        function highlightActiveNav() {
            const scrollPosition = window.scrollY + 100;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + sectionId) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', highlightActiveNav);
        highlightActiveNav();

        // ============================================
        // LANGUAGE SWITCH
        // ============================================
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
