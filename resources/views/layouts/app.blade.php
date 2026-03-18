<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SD NEGERI 1-3 CEPOGO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap + Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        html {
            overflow-x: clip;
        }

        body {
            overflow-x: clip;
        }

        .header-fixed {
            /* topbar tidak sticky, scroll bersama halaman */
        }

        .navbar-sticky {
            position: sticky;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        body {
            padding-top: 0;
        }

        .topbar {
            background: #ffffff;
            font-size: 13px;
        }

        .navbar-main {
            background: white;
            box-shadow: none !important;
            border: none !important;
        }

        .logo-img {
            transition: filter 0.3s ease;
        }

        .nav-link {
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        .nav-link.active {
            color: #0d6efd !important;
            border-bottom: 3px solid #0d6efd;
        }

        .navbar-brand {
            padding: 0;
            line-height: 1;
        }

        .social-icon i {
            font-size: 16px;
            margin-left: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        #darkToggle {
            border: 1px solid transparent;
            background: white;
            border-radius: 8px;
            width: 44px;
            height: 40px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        #darkIcon {
            font-size: 1.25rem;
            line-height: 1;
            width: 1.25rem;
            display: inline-block;
            text-align: center;
        }

        #darkToggle:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        #darkToggle:hover {
            background: #f0f0f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /*icon tidak biru*/
        .social-icon a,
        .social-icon a:visited {
            color: black !important;
            text-decoration: none !important;
        }

        .dark-mode .social-icon a,
        .dark-mode .social-icon a:visited,
        .dark-mode .social-icon a:active {
            color: white !important;
        }

        .social-icon a:hover {
            color: #0d6efd !important;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            padding-top: 80px;
            padding-bottom: 120px;
            width: 100%;
            overflow: hidden;
        }

        /* Hero Slideshow Container */
        .hero-slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 300%;
            height: 100%;
            display: flex;
            animation: slideAnimation 15s ease-in-out infinite;
        }

        .hero-slide {
            width: 33.333%;
            height: 100%;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
            position: relative;
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.15);
            pointer-events: none;
        }

        /* Sliding Animation */
        @keyframes slideAnimation {

            0%,
            30% {
                transform: translateX(0%);
            }

            33%,
            63% {
                transform: translateX(-33.333%);
            }

            66%,
            96% {
                transform: translateX(-66.666%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        /*overlay gelap transparan - kurangi biru*/
        .hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            top: 0;
            left: 0;
        }

        /*isi text*/
        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(6px);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 50px;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.15;
            text-shadow: 0 2px 16px rgba(0, 0, 0, 0.35);
            letter-spacing: -0.5px;
        }

        .hero-divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #fff 0%, rgba(255, 255, 255, 0.3) 100%);
            border-radius: 4px;
        }

        .hero-address {
            font-size: 14px;
            margin-top: 4px;
            opacity: 0.88;
            line-height: 1.6;
        }

        .btn-hero-primary {
            background: #fff;
            color: #003c78;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 26px;
            border-radius: 50px;
            border: 2px solid #fff;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-hero-primary:hover {
            background: transparent;
            color: #fff;
        }

        .hero-photo {
            border-radius: 10px;
            height: 130px;
            object-fit: cover;
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0.88;
        }

        .hero-photo:hover {
            transform: scale(1.04);
            opacity: 1;
        }

        /*stat card*/
        .stats {
            margin-top: -120px;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            padding: 30px 20px;
            border-radius: 18px;
            text-align: center;
            color: white;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-8px);
        }

        .stat-card h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat-card p {
            font-size: 16px;
            opacity: 0.9;
        }

        /* ===== SAMBUTAN KEPALA SEKOLAH ===== */

        .card-sambutan {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .sambutan-title {
            font-size: 31px;
            font-weight: 600;
        }

        .sambutan-sub {
            font-size: 15px;
        }

        .sambutan-text {
            font-size: 15px;
            line-height: 1.7;
            text-align: justify;
        }

        /* ===== WRAPPER DETAIL ===== */
        .detail-wrapper {
            background: white;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        /* gambar */
        .detail-img {
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            transition: 0.4s;
        }

        .detail-img:hover {
            transform: scale(1.03);
        }

        /* judul */
        .detail-title {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        /* subtitle */
        .detail-subtitle {
            font-size: 22px;
            color: #0d6efd;
            font-weight: 600;
            margin-bottom: 25px;
        }

        /* isi teks */
        .detail-text {
            font-size: 20px;
            line-height: 2;
            text-align: justify;
            color: #444;
        }

        /* tombol kembali */
        .btn-back {
            background: #f1f3f5;
            border: none;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #0d6efd;
            color: white;
        }

        /* garis pemisah */
        .detail-divider {
            height: 4px;
            width: 80px;
            background: #0d6efd;
            border-radius: 10px;
        }

        /* ===== GURU CARD ===== */
        .guru-card {
            border: none;
            border-radius: 10px;
            background: #fff;
            border: 1px solid #eee;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .guru-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .guru-card .badge {
            background: #0071e3 !important;
            font-size: 10px;
            font-weight: 500;
            padding: 3px 8px !important;
            border-radius: 20px;
        }

        .guru-info-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: #888;
            margin-bottom: 2px;
        }

        .guru-info-item i {
            color: #0071e3;
            width: 12px;
            text-align: center;
            font-size: 11px;
        }

        /* ===== PRESTASI CARD ===== */
        .prestasi-card {
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .prestasi-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.85);
        }

        .prestasi-card .card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .prestasi-card .badge {
            background: linear-gradient(135deg, #0071e3 0%, #0056b3 100%) !important;
            font-weight: 600;
        }

        /* ===== GURU PAGE SECTION ===== */
        .guru-section-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #000 0%, #333 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .guru-section-subtitle {
            font-size: 13px;
            color: #666;
            margin-bottom: 24px;
        }

        /* ===== CAROUSEL SEKOLAH ===== */
        .carousel-card {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .carousel-img {
            height: 280px;
            object-fit: cover;
            filter: brightness(0.82);
            transition: filter 0.4s ease;
        }

        .carousel-card:hover .carousel-img {
            filter: brightness(0.92);
        }

        .carousel-cap-title {
            font-size: 22px;
            font-weight: 600;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .carousel-cap-sub {
            font-size: 13px;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.5);
        }

        .carousel-indicators [data-bs-target] {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            border: none;
            opacity: 0.5;
        }

        .carousel-indicators .active {
            opacity: 1;
            background-color: #fff;
        }

        /* ===== DARK MODE GLOBAL ===== */
        body.dark-mode {
            background: #121212 !important;
            color: #e4e4e4 !important;
        }

        body.dark-mode section {
            color: #e4e4e4 !important;
        }

        body.dark-mode .card,
        body.dark-mode .card-sambutan,
        body.dark-mode .detail-wrapper,
        body.dark-mode .stat-card {
            background: #1e1e1e !important;
            color: white !important;
        }

        body.dark-mode p,
        body.dark-mode span,
        body.dark-mode li {
            color: #e4e4e4 !important;
        }

        body.dark-mode a {
            color: #64b5f6 !important;
        }

        body.dark-mode a:hover {
            color: #90caf9 !important;
        }

        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode h5 {
            color: white !important;
        }

        body.dark-mode .hero-section {
            background-color: #1a1a1a !important;
        }

        body.dark-mode .navbar-main {
            background: #1f1f1f !important;
            border: none !important;
            box-shadow: none !important;
        }

        body.dark-mode .topbar {
            background: #1f1f1f !important;
            border: none !important;
        }

        body.dark-mode .nav-link {
            color: #ffffff !important;
        }

        body.dark-mode .nav-link.active {
            border-bottom-color: #0d6efd !important;
        }

        body.dark-mode .bg-white,
        body.dark-mode .bg-light {
            background: #121212 !important;
        }

        body.dark-mode .card-sambutan {
            background: #1e1e1e !important;
            border: 1px solid #333 !important;
        }

        body.dark-mode .text-muted {
            color: #a0a0a0 !important;
        }

        body.dark-mode .prestasi-card {
            background: #1e1e1e !important;
            border: 1px solid #333 !important;
            color: #e4e4e4 !important;
        }

        body.dark-mode .guru-card {
            background: #1e1e1e !important;
            border: 1px solid #333 !important;
        }

        body.dark-mode .guru-card-name {
            color: #e4e4e4 !important;
        }

        body.dark-mode .guru-avatar-placeholder {
            background: #2a2a2a !important;
            color: #666 !important;
        }

        body.dark-mode .guru-mapel,
        body.dark-mode .guru-info-item {
            color: #a0a0a0 !important;
        }

        body.dark-mode .guru-section-title {
            background: linear-gradient(135deg, #ffffff 0%, #b0b0b0 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        body.dark-mode #darkToggle {
            background: #2a2a2a !important;
            border: 1px solid #444 !important;
            color: #ffd700;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        body.dark-mode #darkToggle:hover {
            background: #333 !important;
            border: 1px solid #555 !important;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.2);
        }

        body.dark-mode #darkIcon {
            color: #ffd700 !important;
        }

        /* Logo Dark Mode */
        body.dark-mode .logo-img {
            filter: brightness(1.1) contrast(1.1);
            mix-blend-mode: lighten;
        }

        body.dark-mode .navbar-brand {
            background: transparent;
            backdrop-filter: none;
        }

        /* Ekstrakulikuler Card */
        .ekskul-card {
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ekskul-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
        }

        .berita-card {
            border-radius: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .berita-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12) !important;
        }

        .berita-card-image {
            height: 360px;
            width: 100%;
            object-fit: contain;
            background: #f8f9fa;
        }

        /* Visi Misi Card */
        .visi-misi-card {
            border-radius: 14px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }

        .visi-misi-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.13) !important;
        }

        .visi-misi-card .icon-wrapper {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visi-misi-card ul {
            list-style: none;
            padding-left: 0;
        }

        .visi-misi-card ul li {
            position: relative;
            padding-left: 22px;
            margin-bottom: 10px;
        }

        .visi-misi-card ul li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
            font-size: 15px;
        }

        .ekskul-icon-wrap {
            width: 50px;
            height: 50px;
            background: #eef3ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Footer */
        .footer-main {
            background: #ffffff;
            border-top: 1px solid #e9ecef;
        }

        .footer-link {
            color: #555;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-link:hover {
            color: #0d6efd;
        }

        .footer-sosmed {
            color: #555;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-sosmed:hover {
            color: #0d6efd;
        }

        body.dark-mode .footer-main {
            background: #1a1a1a !important;
            border-top: 1px solid #333 !important;
        }

        body.dark-mode .footer-link,
        body.dark-mode .footer-sosmed {
            color: #aaa !important;
        }

        body.dark-mode .ekskul-card {
            background: #1e1e1e !important;
            color: #e4e4e4 !important;
        }

        body.dark-mode .berita-card {
            background: #1e1e1e !important;
            color: #e4e4e4 !important;
            border: 1px solid #333 !important;
        }

        body.dark-mode .berita-card-image {
            background: #111 !important;
        }

        body.dark-mode .visi-misi-card {
            background: #1e1e1e !important;
            color: #e4e4e4 !important;
        }

        body.dark-mode .visi-misi-card .text-muted {
            color: #aaa !important;
        }

        body.theme-switching *,
        body.theme-switching *::before,
        body.theme-switching *::after {
            transition: none !important;
            animation: none !important;
        }

        /* ===== RESPONSIVE MOBILE ===== */
        @media (max-width: 767.98px) {

            /* Navbar collapse border */
            .navbar-collapse {
                border-top: 1px solid #eee;
                margin-top: 8px;
                padding-top: 8px;
            }

            body.dark-mode .navbar-collapse {
                border-top-color: #333;
            }

            /* Active nav link: left border instead of bottom */
            .nav-link.active {
                border-bottom: none !important;
                border-left: 3px solid #0d6efd;
                padding-left: 10px;
            }

            .nav-link {
                font-size: 15px;
            }

            /* Hero */
            .hero-section {
                min-height: auto;
                padding-top: 50px;
                padding-bottom: 60px;
            }

            .hero-title {
                font-size: 34px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 5px 14px;
            }

            .hero-address {
                font-size: 12px;
            }

            /* Stats - overlap hero slightly on mobile too */
            .stats {
                margin-top: -40px;
                padding-top: 0;
                padding-bottom: 24px;
                background: transparent;
            }

            .stat-card {
                padding: 18px 12px;
                border-radius: 12px;
            }

            .stat-card h2 {
                font-size: 28px;
            }

            .stat-card p {
                font-size: 13px;
            }

            /* Section titles */
            .guru-section-title {
                font-size: 22px;
            }

            /* Sambutan */
            .sambutan-text {
                font-size: 13px;
            }

            /* Detail page */
            .detail-wrapper {
                padding: 20px 16px;
                border-radius: 12px;
            }

            .detail-title {
                font-size: 26px;
            }

            .detail-subtitle {
                font-size: 16px;
            }

            .detail-text {
                font-size: 15px;
                line-height: 1.8;
            }

            /* Galeri card body compact */
            .galeri-card .card-body {
                padding: 10px;
            }

            /* Guru card compact on mobile */
            .guru-card img,
            .guru-card .card-img-top+div {
                height: 140px !important;
            }
        }

        @media (max-width: 575.98px) {

            /* Extra small phones */
            .hero-title {
                font-size: 30px;
            }

            .stat-card h2 {
                font-size: 24px;
            }

            .stat-card p {
                font-size: 12px;
            }

            /* Section headings */
            h2.fw-semibold[style*="font-size:28px"] {
                font-size: 20px !important;
            }
        }
    </style>
</head>

<body>

    @include('partials.header')


    @yield('content')

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('darkToggle');
        const icon = document.getElementById('darkIcon');
        let themeSwitchTimeout;

        const freezeTransitions = () => {
            document.body.classList.add('theme-switching');
            clearTimeout(themeSwitchTimeout);
            themeSwitchTimeout = setTimeout(() => {
                document.body.classList.remove('theme-switching');
            }, 140);
        };

        // cek mode tersimpan
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
            icon.classList.replace('fa-moon', 'fa-sun');
        }

        toggleBtn.onclick = () => {
            freezeTransitions();
            document.body.classList.toggle('dark-mode');

            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                localStorage.setItem('theme', 'light');
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        }
    </script>
</body>

</html>
