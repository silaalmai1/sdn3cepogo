@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-4 mb-5">
        <!-- Card Prestasi -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-admin">
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">Total Prestasi</div>
                        <div class="stat-number">{{ $totalPrestasi ?? 0 }}</div>
                        <a href="/admin/prestasi" class="btn-action">Kelola →</a>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Guru -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-admin">
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">Total Guru</div>
                        <div class="stat-number">{{ $totalGuru ?? 0 }}</div>
                        <a href="/admin/guru" class="btn-action">Kelola →</a>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Pengguna -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-admin">
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">Total Akun Admin</div>
                        <div class="stat-number">{{ $totalUsers ?? 0 }}</div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="welcome-card">
        <h5>Selamat datang! 👋</h5>
        <p>Kelola website SD Negeri 1-3 Cepogo dengan mudah. Gunakan menu di samping untuk menambah, mengedit, dan menghapus
            data prestasi, guru, dan konten lainnya.</p>
    </div>
@endsection
