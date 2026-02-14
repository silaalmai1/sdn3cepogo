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
        html,
        body {
            height: auto;
            overflow-x: hidden;
        }

        .header-fixed {
            position: sticky;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        body {
            padding-top: 0;
        }

        .topbar {
            background: #ffffff;
            font-size: 18px;
        }

        .navbar-main {
            background: white;
            box-shadow: none !important;
            border: none !important;
        }

        .logo-img {
            transition: all 0.3s ease;
        }

        .nav-link {
            font-weight: 500;
            font-size: 20px;
            letter-spacing: 0.5px;
        }

        .nav-link.active {
            color: #0d6efd !important;
            border-bottom: 3px solid #0d6efd;
        }

        .social-icon i {
            font-size: 22px;
            margin-left: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        #darkToggle {
            border: none;
            background: white;
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.3s ease;
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
            background: url('/images/hero.jpg') center/cover no-repeat;
            background-size: cover;
            background-position: center;
        }

        /*overlay biru gelap transparan*/
        .hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 60, 120, 0.55);
            top: 0;
            left: 0;
        }

        /*isi text*/
        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-subtitle {
            font-size: 28px;
        }

        .hero-title {
            font-size: 70px;
            font-weight: 800;
        }

        .hero-address {
            font-size: 20px;
            margin-top: 10px;
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
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            border: none;
        }

        .sambutan-title {
            font-size: 34px;
            font-weight: 800;
        }

        .sambutan-sub {
            font-size: 18px;
        }

        .sambutan-text {
            font-size: 17px;
            line-height: 1.8;
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
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .guru-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.85);
        }

        .guru-card .card-body {
            padding: 20px;
        }

        .guru-card .card-title {
            font-size: 18px;
            margin-bottom: 8px;
            color: #000;
            font-weight: 700;
        }

        .guru-card .card-text {
            font-size: 14px;
            color: #666;
        }

        .guru-card .badge {
            background: linear-gradient(135deg, #0071e3 0%, #0056b3 100%) !important;
            font-weight: 600;
            padding: 6px 12px !important;
        }

        .guru-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }

        .guru-info-item i {
            color: #0071e3;
            width: 16px;
            text-align: center;
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
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #000 0%, #333 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .guru-section-subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
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
            border-bottom: 1px solid #333 !important;
        }

        body.dark-mode .topbar {
            background: #1f1f1f !important;
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
            color: #e4e4e4 !important;
        }

        body.dark-mode .guru-card .card-title,
        body.dark-mode .guru-card .card-body {
            color: #e4e4e4 !important;
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
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border-radius: 10px;
            padding: 8px 12px;
        }
    </style>
</head>

<body>

    @include('partials.header')


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('darkToggle');
        const icon = document.getElementById('darkIcon');

        // cek mode tersimpan
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
            icon.classList.replace('fa-moon', 'fa-sun');
        }

        toggleBtn.onclick = () => {
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
