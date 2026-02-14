<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f5f5f7;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', sans-serif;
            color: #333;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            color: #333;
            padding: 30px 0;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 20px 25px;
            border-bottom: 1px solid rgba(229, 229, 231, 0.5);
            margin-bottom: 25px;
        }

        .sidebar-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 20px;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #0071e3 0%, #0056b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar nav {
            padding: 0;
        }

        .sidebar a {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 20px;
            margin: 2px 10px;
            border-radius: 8px;
            transition: all 0.25s ease;
            font-size: 16px;
            font-weight: 500;
            position: relative;
        }

        .sidebar a:hover {
            background: rgba(0, 113, 227, 0.08);
            color: #0071e3;
            transform: translateX(4px);
        }

        .sidebar a.active {
            background: rgba(0, 113, 227, 0.1);
            color: #0071e3;
            border-left: 3px solid #0071e3;
            padding-left: 17px;
        }

        .sidebar a i {
            width: 18px;
            text-align: center;
            opacity: 0.6;
            transition: all 0.25s ease;
            font-size: 18px;
        }

        .sidebar a:hover i {
            opacity: 1;
            transform: scale(1.1);
        }

        .sidebar a.active i {
            opacity: 1;
            color: #0071e3;
        }

        .logout-section {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            padding: 0 10px;
            border-top: 1px solid rgba(229, 229, 231, 0.5);
            padding-top: 20px;
        }

        .btn-logout {
            background: rgba(255, 59, 48, 0.08);
            color: #ff3b30 !important;
            border: none;
            border-radius: 8px;
            padding: 11px 20px !important;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
            font-size: 16px;
            font-weight: 500;
            width: calc(100% - 20px);
            text-decoration: none;
        }

        .btn-logout:hover {
            background: rgba(255, 59, 48, 0.15);
            color: #d70015 !important;
            transform: translateX(4px);
        }

        .btn-logout i {
            opacity: 0.8;
            transition: all 0.25s ease;
        }

        .btn-logout:hover i {
            opacity: 1;
            transform: scale(1.1);
        }

        .disabled-link {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
            pointer-events: none !important;
        }

        .disabled-link:hover {
            background: transparent !important;
            color: #333 !important;
            transform: none !important;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.2);
        }

        .content {
            margin-left: 240px;
            padding: 50px 60px;
            min-height: 100vh;
        }

        .page-header h3 {
            font-weight: 600;
            color: #000;
            font-size: 28px;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
        }

        .card-admin {
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card-admin:hover {
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        .stat-card {
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-content {
            flex: 1;
        }

        .stat-label {
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: #000;
            letter-spacing: -1px;
        }

        .stat-icon {
            font-size: 36px;
            opacity: 0.15;
            margin-left: 20px;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
            transition: all 0.3s ease;
        }

        .welcome-card:hover {
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .welcome-card h5 {
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .welcome-card p {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        .btn-action {
            display: inline-block;
            padding: 8px 16px;
            background: #0071e3;
            color: white !important;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            margin-top: 12px;
        }

        .btn-action:hover {
            background: #0056b3;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
                padding: 30px 20px;
            }

            .page-header h3 {
                font-size: 24px;
            }

            .stat-number {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h4><i class="bi bi-building-fill"></i> Admin Panel</h4>
        </div>
        <nav>
            <a href="/admin" class="{{ request()->path() === 'admin' ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/prestasi" class="{{ request()->is('admin/prestasi*') ? 'active' : '' }}">
                <i class="fas fa-trophy"></i>
                <span>Prestasi</span>
            </a>
            <a href="/admin/guru" class="{{ request()->is('admin/guru*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-user"></i>
                <span>Guru</span>
            </a>
            <a href="#" class="disabled-link">
                <i class="fas fa-newspaper"></i>
                <span>Berita</span>
            </a>
            <a href="/admin/galeri" class="{{ request()->is('admin/galeri*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <span>Galeri</span>
            </a>
        </nav>
        <div class="logout-section">
            <a href="/logout" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="content">
        <div class="page-header">
            <h3>@yield('title')</h3>
        </div>
        @yield('content')
    </div>

</body>

</html>
