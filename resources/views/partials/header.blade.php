@php
    $socialFacebook = trim((string) ($settings['social_facebook_url'] ?? ''));
    $socialInstagram = trim((string) ($settings['social_instagram_url'] ?? ''));
    $socialYoutube = trim((string) ($settings['social_youtube_url'] ?? ''));
    $socialTiktok = trim((string) ($settings['social_tiktok_url'] ?? ''));
@endphp

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
                @if ($socialFacebook !== '')
                    <a href="{{ $socialFacebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                @endif

                @if ($socialInstagram !== '')
                    <a href="{{ $socialInstagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                @endif

                @if ($socialYoutube !== '')
                    <a href="{{ $socialYoutube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                @endif

                @if ($socialTiktok !== '')
                    <a href="{{ $socialTiktok }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                @endif
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
