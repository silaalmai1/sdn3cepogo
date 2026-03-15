<div class="d-none d-md-block">
    {{-- TOPBAR --}}
    <div class="topbar py-2">
        <div class="container-fluid px-3 d-flex justify-content-between align-items-center">

            <div class="d-flex gap-3">
                <div class="topbar-item">
                    <i class="fa-solid fa-phone text-primary"></i>
                    {{ $settings['school_phone'] }}
                </div>

                <div class="topbar-item">
                    <i class="fa-solid fa-envelope text-primary"></i>
                    {{ $settings['school_email'] }}
                </div>

                <div class="topbar-item">
                    <i class="fa-solid fa-location-dot text-primary"></i>
                    {{ str_replace("\n", ', ', $settings['school_address']) }}
                </div>
            </div>

            <div class="social-icon">
                <i class="fa-brands fa-instagram"></i>

                <a href="https://www.youtube.com/@sdn1-3cepogo26" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>

                <i class="fa-brands fa-tiktok"></i>
            </div>

        </div>
    </div>
</div>

{{-- NAVBAR (sticky) --}}
<div class="navbar-sticky">
    <nav class="navbar navbar-expand-lg navbar-main py-3">
        <div class="container">

            {{-- Logo --}}
            <a class="navbar-brand d-flex align-items-center logo-brand" href="/">
                <img src="{{ $logoUrl }}" width="60" class="me-2 logo-img">
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="menu" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto gap-2">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('guru') ? 'active' : '' }}" href="/guru">Guru</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="/berita">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prestasi') ? 'active' : '' }}"
                            href="/prestasi">Prestasi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ekstrakulikuler') ? 'active' : '' }}"
                            href="/ekstrakulikuler">Ekstrakurikuler</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                    </li>

                </ul>


                <button id="darkToggle" class="btn">
                    <i id="darkIcon" class="fa-regular fa-moon fs-5"></i>
                </button>
            </div>
        </div>
    </nav>
</div>
