<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wolfilium — Sistem Manajemen Pakan Akuakultur Berkelanjutan berbasis budidaya Wolffia (duckweed). Digitalisasi protein hijau untuk Indonesia.">
    <title>@yield('title', 'Wolfilium — Manajemen Pakan Akuakultur Berkelanjutan')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
    <style>
        /* ── CSS Reset & Base ── */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        
        /* ── Shopifi-Inspired Design System (Green Base) ── */
        :root {
            /* Colors */
            --primary: #10b981; /* Emerald 500 */
            --ink: #022c22;
            --on-primary: #ffffff;
            --on-dark: #ffffff;
            --canvas-night: #022c22; /* Emerald 950 */
            --canvas-night-elevated: #064e3b; /* Emerald 900 */
            --canvas-light: #ffffff;
            --canvas-cream: #f0fdf4;
            --surface-elevated-dark: #065f46;
            --shade-30: #d1fae5;
            --shade-40: #a7f3d0;
            --shade-50: #6ee7b7;
            --shade-60: #34d399;
            --shade-70: #047857;
            --hairline-light: #d1fae5;
            --hairline-dark: #065f46;
            --aloe-10: #a7f3d0;
            --pistachio-10: #ecfdf5;

            /* Typography */
            --font-display: "NeueHaasGrotesk Display", "Helvetica", "Arial", sans-serif;
            --font-ui: "Inter", "Helvetica", "Arial", sans-serif;
            --font-code: "ui-monospace", "SFMono-Regular", monospace;

            /* Spacing */
            --spacing-xxs: 2px;
            --spacing-xs: 4px;
            --spacing-sm: 8px;
            --spacing-md: 12px;
            --spacing-lg: 16px;
            --spacing-xl: 24px;
            --spacing-xxl: 32px;
            --spacing-huge: 64px;

            /* Rounded */
            --rounded-xs: 4px;
            --rounded-sm: 5px;
            --rounded-md: 8px;
            --rounded-lg: 12px;
            --rounded-xl: 20px;
            --rounded-pill: 9999px;
        }

        /* ── Typography Classes ── */
        .display-xxl { font-family: var(--font-display); font-size: 96px; font-weight: 330; line-height: 1.0; letter-spacing: 2.4px; font-feature-settings: "ss03"; }
        .display-xl { font-family: var(--font-display); font-size: 70px; font-weight: 330; line-height: 1.0; letter-spacing: 0; font-feature-settings: "ss03"; }
        .display-lg { font-family: var(--font-display); font-size: 55px; font-weight: 330; line-height: 1.16; letter-spacing: 0; font-feature-settings: "ss03"; }
        .display-md { font-family: var(--font-display); font-size: 48px; font-weight: 330; line-height: 1.14; letter-spacing: 0; font-feature-settings: "ss03"; }
        .heading-xl { font-family: var(--font-display); font-size: 28px; font-weight: 500; line-height: 1.28; letter-spacing: 0.42px; font-feature-settings: "ss03"; }
        .heading-lg { font-family: var(--font-display); font-size: 24px; font-weight: 400; line-height: 1.14; letter-spacing: 0.36px; font-feature-settings: "ss03"; }
        .heading-md { font-family: var(--font-display); font-size: 20px; font-weight: 500; line-height: 1.4; letter-spacing: 0.3px; font-feature-settings: "ss03"; }
        .heading-sm { font-family: var(--font-display); font-size: 18px; font-weight: 500; line-height: 1.25; letter-spacing: 0.72px; font-feature-settings: "ss03"; }
        .body-lg { font-family: var(--font-ui); font-size: 18px; font-weight: 550; line-height: 1.56; letter-spacing: 0; font-feature-settings: "ss03"; }
        .body-md { font-family: var(--font-ui); font-size: 16px; font-weight: 420; line-height: 1.5; letter-spacing: 0; font-feature-settings: "ss03"; }
        .body-strong { font-family: var(--font-ui); font-size: 16px; font-weight: 550; line-height: 1.5; letter-spacing: 0; font-feature-settings: "ss03"; }
        .caption { font-family: var(--font-ui); font-size: 14px; font-weight: 500; line-height: 1.49; letter-spacing: 0.28px; font-feature-settings: "ss03"; }
        .micro { font-family: var(--font-ui); font-size: 13px; font-weight: 500; line-height: 1.5; letter-spacing: -0.13px; font-feature-settings: "ss03"; }
        .eyebrow-cap { font-family: var(--font-ui); font-size: 12px; font-weight: 400; line-height: 1.2; letter-spacing: 0.72px; text-transform: uppercase; font-feature-settings: "ss03"; }
        .code { font-family: var(--font-code); font-size: 16px; font-weight: 400; line-height: 1.5; letter-spacing: 0; font-feature-settings: "ss03"; }

        /* ── Component Classes ── */
        .canvas-night { background-color: var(--canvas-night); color: var(--on-primary); }
        .canvas-light { background-color: var(--canvas-light); color: var(--ink); }
        .canvas-cream { background-color: var(--canvas-cream); color: var(--ink); }

        .button-primary-pill {
            background-color: var(--primary); color: var(--on-primary);
            font-family: var(--font-ui); font-size: 16px; font-weight: 420;
            border-radius: var(--rounded-pill); padding: 12px 24px;
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            border: none; cursor: pointer; text-decoration: none; transition: background-color 0.2s;
        }
        .button-primary-pill:hover { background-color: var(--shade-70); }

        .button-outline-on-dark {
            background-color: transparent; color: var(--on-primary);
            font-family: var(--font-ui); font-size: 16px; font-weight: 420;
            border-radius: var(--rounded-pill); padding: 12px 26px;
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            border: 1px solid var(--on-primary); cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .button-outline-on-dark:hover { background-color: rgba(255,255,255,0.1); }

        .button-outline-on-light {
            background-color: transparent; color: var(--ink);
            font-family: var(--font-ui); font-size: 16px; font-weight: 420;
            border-radius: var(--rounded-pill); padding: 12px 24px;
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            border: 1px solid var(--ink); cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .button-outline-on-light:hover { background-color: rgba(0,0,0,0.05); }

        .button-aloe-pill {
            background-color: var(--aloe-10); color: var(--ink);
            font-family: var(--font-ui); font-size: 16px; font-weight: 420;
            border-radius: var(--rounded-pill); padding: 12px 24px;
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            border: none; cursor: pointer; text-decoration: none; transition: background-color 0.2s;
        }
        .button-aloe-pill:hover { background-color: var(--shade-30); }

        .nav-bar-dark {
            background-color: var(--canvas-night); color: var(--on-primary);
            font-family: var(--font-ui); font-size: 16px; font-weight: 420;
            padding: var(--spacing-lg) var(--spacing-xl); display: flex; align-items: center; justify-content: space-between;
        }

        .card-feature-cinematic {
            background-color: var(--canvas-night-elevated); color: var(--on-primary);
            border-radius: var(--rounded-lg); padding: var(--spacing-xxl);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.04);
        }

        .card-photo-frame {
            background-color: var(--canvas-night); color: var(--on-primary);
            border-radius: var(--rounded-xl); padding: 0; overflow: hidden;
        }

        .pill-tag-mint {
            background-color: var(--aloe-10); color: var(--ink);
            font-family: var(--font-ui); font-size: 12px; font-weight: 400; text-transform: uppercase; letter-spacing: 0.72px;
            border-radius: var(--rounded-pill); padding: 4px 12px; display: inline-flex; align-items: center;
        }

        .footer-dark {
            background-color: var(--canvas-night); color: var(--on-primary);
            font-family: var(--font-ui); font-size: 14px; font-weight: 500;
            padding: var(--spacing-huge) var(--spacing-xl);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font-ui);
            background-color: var(--canvas-cream);
            color: var(--ink);
            line-height: 1.5;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #6ee7b7; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }

        /* ── Animations ── */
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 5px rgba(16, 185, 129, 0.3); } 50% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.6); } }
        @keyframes slide-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
        @keyframes slide-in-right { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes bounce-in { 0% { transform: scale(0.9); opacity: 0; } 50% { transform: scale(1.02); } 100% { transform: scale(1); opacity: 1; } }

        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-up { animation: slide-up 0.6s ease-out forwards; }
        .animate-fade-in { animation: fade-in 0.4s ease-out forwards; }
        .animate-slide-in { animation: slide-in-right 0.5s ease-out forwards; }
        .animate-bounce-in { animation: bounce-in 0.5s ease-out forwards; }

        .stagger-1 { animation-delay: 0.1s; opacity: 0; }
        .stagger-2 { animation-delay: 0.2s; opacity: 0; }
        .stagger-3 { animation-delay: 0.3s; opacity: 0; }
        .stagger-4 { animation-delay: 0.4s; opacity: 0; }
        .stagger-5 { animation-delay: 0.5s; opacity: 0; }

        /* ── Glassmorphism ── */
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .glass-dark { background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }

        /* ── Gradients ── */
        .gradient-emerald { background: var(--primary); }
        .gradient-hero { background: var(--canvas-night); }
        .gradient-card { background: var(--canvas-light); }
        .gradient-cyan { background: linear-gradient(135deg, #06b6d4, #0891b2); }
        .gradient-amber { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .gradient-rose { background: linear-gradient(135deg, #f43f5e, #e11d48); }

        /* ── Layout ── */
        .app-container { display: flex; min-height: 100vh; }
        .sidebar {
            position: fixed; top: 0; left: 0; bottom: 0; width: 280px;
            background: var(--canvas-night); color: var(--on-primary); display: flex; flex-direction: column;
            transform: translateX(-100%); transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 60;
            font-family: var(--font-ui);
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        .sidebar.open { transform: translateX(0); }
        .sidebar-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5);
            z-index: 55;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            pointer-events: none;
        }
        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }
        .main-content { flex: 1; min-height: 100vh; }

        /* ── Mobile Header ── */
        .mobile-header {
            display: none; /* hidden by default, shown only on mobile via media query */
        }

        /* ── Mobile Hamburger Button ── */
        .mobile-hamburger-btn {
            width: 44px;
            height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            padding: 0;
            border-radius: var(--rounded-md);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--ink);
            -webkit-tap-highlight-color: transparent;
        }
        .mobile-hamburger-btn:active {
            background: rgba(0,0,0,0.06);
        }

        /* ── Desktop (≥1024px) ── */
        @media (min-width: 1024px) {
            .sidebar { transform: translateX(0); }
            .main-content { margin-left: 280px; }
            .mobile-header { display: none !important; }
            .sidebar-overlay { display: none !important; }
        }

        /* ── Mobile (<1024px) ── */
        @media (max-width: 1023px) {
            html, body { overflow-x: hidden; }

            .sidebar {
                width: min(320px, 85vw);
            }

            .mobile-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: 60px;
                padding: 0 12px;
                background: var(--canvas-light);
                border-bottom: 1px solid var(--hairline-light);
                z-index: 30;
            }

            .main-content {
                padding-top: 60px;
            }

            body.sidebar-open {
                overflow: hidden;
            }
        }

        /* ── Sidebar Nav ── */
        .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 14px 16px; border-radius: var(--rounded-md);
            font-size: 16px; font-weight: 500; color: var(--shade-40);
            text-decoration: none; transition: all 0.2s;
        }
        .nav-link:hover { color: var(--on-primary); background: var(--shade-70); }
        .nav-link.active { color: var(--primary); background: rgba(16,185,129,0.15); box-shadow: 0 4px 6px rgba(16,185,129,0.1); }
        .nav-link svg { width: 20px; height: 20px; flex-shrink: 0; }
        .nav-section-title {
            font-size: 12px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.72px; color: var(--shade-50); padding: 0 16px 8px;
        }

        /* ── Cards ── */
        .card {
            background: var(--canvas-light); border-radius: var(--rounded-lg);
            border: 1px solid var(--hairline-light); padding: var(--spacing-xxl);
            transition: all 0.3s;
            box-shadow: 0 8px 8px rgba(0,0,0,0.02), 0 4px 4px rgba(0,0,0,0.02);
        }
        .card:hover { box-shadow: 0 12px 12px rgba(0,0,0,0.04); transform: translateY(-2px); }
        .card-gradient {
            background: var(--pistachio-10);
            border: 1px solid var(--aloe-10);
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            gap: 8px; padding: 12px 24px; border-radius: var(--rounded-pill);
            font-size: 16px; font-weight: 500; border: none;
            cursor: pointer; transition: all 0.3s; text-decoration: none;
            font-family: var(--font-ui);
        }
        .btn-primary { background: var(--primary); color: var(--on-primary); }
        .btn-primary:hover { background: var(--shade-70); }
        .btn-secondary { background: var(--shade-30); color: var(--ink); }
        .btn-secondary:hover { background: var(--aloe-10); }
        .btn-danger { background: #e11d48; color: white; }
        .btn-danger:hover { background: #be123c; }
        .btn-sm { padding: 8px 16px; font-size: 14px; }
        .btn-outline {
            background: transparent; border: 1px solid var(--ink); color: var(--ink);
        }
        .btn-outline:hover { background: rgba(0,0,0,0.05); }

        /* ── Form Elements ── */
        .form-group { margin-bottom: var(--spacing-xl); }
        .form-label {
            display: block; font-size: 14px; font-weight: 500;
            color: var(--ink); margin-bottom: 8px; font-family: var(--font-ui);
        }
        .form-input {
            width: 100%; padding: 12px 16px; border-radius: var(--rounded-md);
            border: 1px solid var(--hairline-dark); font-size: 16px;
            font-family: var(--font-ui); background: var(--canvas-light);
            color: var(--ink);
            transition: all 0.2s; outline: none;
        }
        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--aloe-10);
        }
        .form-select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23022c22' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 40px; }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 4px 12px; border-radius: var(--rounded-pill);
            font-size: 12px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.72px; font-family: var(--font-ui);
        }
        .badge-green { background: var(--aloe-10); color: var(--ink); }
        .badge-amber { background: #fef3c7; color: #92400e; }
        .badge-red { background: #fee2e2; color: #991b1b; }
        .badge-blue { background: #dbeafe; color: #1e40af; }
        .badge-purple { background: #ede9fe; color: #5b21b6; }
        .badge-cyan { background: #cffafe; color: #155e75; }
        .badge-slate { background: var(--shade-30); color: var(--ink); }

        /* ── Tables ── */
        .table-container { overflow-x: auto; border-radius: 12px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th {
            padding: 14px 16px; text-align: left;
            font-size: 0.75rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: #64748b; background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        .table td {
            padding: 14px 16px; font-size: 0.875rem;
            color: #334155; border-bottom: 1px solid #f1f5f9;
        }
        .table tr:hover td { background: #f8fafc; }

        /* ── Modal ── */
        .modal-backdrop {
            position: fixed; inset: 0; z-index: 60;
            display: flex; align-items: center; justify-content: center;
            padding: 16px; background: rgba(0,0,0,0.5);
            animation: fade-in 0.2s ease-out;
        }
        .modal-content {
            background: white; border-radius: 20px;
            padding: 32px; width: 100%; max-width: 480px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            animation: bounce-in 0.3s ease-out;
        }

        /* ── Alert Toasts ── */
        .alert {
            padding: 16px 20px; border-radius: 12px; margin-bottom: 20px;
            font-size: 0.875rem; font-weight: 500;
            display: flex; align-items: center; gap: 12px;
        }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }

        /* ── Grid Utilities ── */
        .grid { display: grid; gap: 24px; }
        .grid-2 { display: grid; gap: 24px; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
        .grid-3 { display: grid; gap: 24px; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .grid-4 { display: grid; gap: 24px; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); }

        /* ── Page Header ── */
        .page-header { margin-bottom: var(--spacing-xxl); }
        .page-title {
            font-size: 28px; font-family: var(--font-display); font-weight: 500; color: var(--ink);
            display: flex; align-items: center; gap: 12px; font-feature-settings: "ss03";
        }
        .page-subtitle { color: var(--shade-60); margin-top: 6px; font-size: 16px; }

        /* ── Icon Containers ── */
        .icon-box {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        /* ── Edu Card ── */
        .edu-card {
            background: white; border-radius: 16px; padding: 32px;
            border: 1px solid #e2e8f0; transition: all 0.3s;
            position: relative; overflow: hidden;
        }
        .edu-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 4px; background: linear-gradient(90deg, #10b981, #34d399, #6ee7b7);
        }
        .edu-card:hover {
            box-shadow: 0 20px 40px rgba(16,185,129,0.1);
            transform: translateY(-4px); border-color: #a7f3d0;
        }
        .edu-card h3 {
            font-size: 1.15rem; font-weight: 700; color: #0f172a;
            margin-bottom: 8px;
        }
        .edu-card p { font-size: 0.875rem; color: #64748b; line-height: 1.8; }

        /* ── SOP Steps ── */
        .sop-step {
            display: flex; gap: 20px; padding: 24px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .sop-step:last-child { border-bottom: none; }
        .step-number {
            width: 40px; height: 40px; border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #047857);
            color: white; display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 0.9rem; flex-shrink: 0;
        }
        .step-content h4 { font-weight: 700; color: #0f172a; margin-bottom: 6px; }
        .step-content p { font-size: 0.875rem; color: #64748b; line-height: 1.7; }

        /* ── Stat Boxes ── */
        .stat-box {
            padding: 20px; border-radius: 12px; text-align: center;
        }
        .stat-box .stat-value {
            font-size: 1.75rem; font-weight: 800; margin-bottom: 4px;
        }
        .stat-box .stat-label {
            font-size: 0.7rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* ── Farmer Card ── */
        .farmer-card {
            background: white; border-radius: 16px;
            border: 1px solid #e2e8f0; padding: 24px;
            transition: all 0.3s; position: relative;
        }
        .farmer-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
            transform: translateY(-3px);
        }
        .farmer-avatar {
            width: 48px; height: 48px; border-radius: 12px;
            background: linear-gradient(135deg, #34d399, #059669);
            color: white; display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 0.9rem; flex-shrink: 0;
        }

        /* ── Prediction Card ── */
        .prediction-card {
            background: white; border-radius: 16px;
            border: 1px solid #e2e8f0; padding: 24px;
            transition: all 0.3s;
        }
        .prediction-card.alert-card {
            border-color: #fbbf24; background: linear-gradient(145deg, #fffbeb, #fef3c7);
            animation: pulse-glow 3s ease-in-out infinite;
        }
        .prediction-card.ready-card {
            border-color: #34d399; background: linear-gradient(145deg, #ecfdf5, #d1fae5);
        }

        /* ── Tooltip ── */
        .info-tip {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 12px 16px; border-radius: 12px;
            background: #f0fdfa; border: 1px solid #99f6e4;
            font-size: 0.8rem; color: #0d9488;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center; padding: 60px 20px; color: #94a3b8;
        }
        .empty-state svg { width: 64px; height: 64px; margin: 0 auto 16px; opacity: 0.4; }
        .empty-state p { font-size: 1rem; }

        /* ── Actions Row ── */
        .actions { display: flex; gap: 8px; align-items: center; }

        /* ── Accordion ── */
        .accordion-item { border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; margin-bottom: 12px; }
        .accordion-btn {
            width: 100%; display: flex; align-items: center; justify-content: space-between;
            padding: 20px 24px; background: white; border: none; cursor: pointer;
            font-family: inherit; font-size: 0.95rem; font-weight: 600; color: #0f172a;
            transition: background 0.2s;
        }
        .accordion-btn:hover { background: #f8fafc; }
        .accordion-content {
            padding: 0 24px 20px; font-size: 0.875rem; color: #64748b; line-height: 1.8;
        }

        /* ── Chart Container ── */
        .chart-container { position: relative; height: 300px; width: 100%; }

        /* ── Video embed ── */
        .video-embed {
            width: 100%; aspect-ratio: 16/9; border-radius: 12px;
            background: #0f172a; overflow: hidden;
        }
        .video-embed iframe { width: 100%; height: 100%; border: none; }

        @media (max-width: 768px) {
            .page-title { font-size: 1.15rem; gap: 8px; }
            .page-subtitle { font-size: 0.85rem; }
            .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
            .card { padding: 16px; border-radius: 10px; }
            .table th, .table td { padding: 10px 12px; font-size: 0.75rem; }
            .actions { flex-wrap: wrap; }
            .btn { padding: 10px 18px; font-size: 14px; }
            .btn-sm { padding: 6px 12px; font-size: 12px; }
            .icon-box { width: 40px; height: 40px; border-radius: 10px; }
            .icon-box svg { width: 20px; height: 20px; }
            .form-input { padding: 10px 14px; font-size: 14px; }
            .form-label { font-size: 13px; }
            .badge { font-size: 10px; padding: 3px 8px; }
            .page-header { margin-bottom: 20px; }
            .stat-box .stat-value { font-size: 1.35rem; }
            .stat-box .stat-label { font-size: 0.65rem; }
            .chart-container { height: 220px; }
            .modal-content { padding: 24px; border-radius: 16px; }
            .alert { padding: 12px 14px; font-size: 0.8rem; border-radius: 10px; }
            .edu-card { padding: 20px; }
            .edu-card h3 { font-size: 1rem; }
            .sop-step { gap: 14px; padding: 16px 0; }
            .step-number { width: 34px; height: 34px; font-size: 0.8rem; }
            .farmer-card { padding: 16px; }
            .prediction-card { padding: 16px; }
            .table-container { margin: 0 -16px; border-radius: 0; }
            .info-tip { padding: 10px 12px; font-size: 0.75rem; }
            .empty-state { padding: 40px 16px; }
            .empty-state svg { width: 48px; height: 48px; }
        }

        @media (max-width: 480px) {
            .page-title { font-size: 1rem; flex-wrap: wrap; }
            .card { padding: 14px; }
            .btn { width: 100%; justify-content: center; }
            .btn-sm { width: auto; }
            .actions { flex-direction: column; }
            .actions .btn { width: 100%; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('body')

    @stack('scripts')
</body>
</html>
