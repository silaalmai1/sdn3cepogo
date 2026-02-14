<div class="header-fixed">
{{-- TOPBAR --}}
<div class="topbar py-2">
    <div class="container-fluid px-3 d-flex justify-content-between align-items-center">

        <div class="d-flex gap-4">
            <div>
                <i class="fa-solid fa-phone text-primary"></i>
                081390788465
            </div>

            <div>
                <i class="fa-solid fa-envelope text-primary"></i>
                sdn3cepogo@gmail.com
            </div>

            <div>
                <i class="fa-solid fa-location-dot text-primary"></i>
                Desa Cepogo RT. 04 RW. 10, Kec. Kembang, Kab. Jepara, Prov. Jawa Tengah
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


{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-main">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center logo-brand" href="#">
            <img src="images/logo.png" width="90" class="me-2 logo-img">
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto gap-3">

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
                     <a class="nav-link {{ request()->is('prestasi') ? 'active' : '' }}" href="/prestasi">Prestasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Ekstrakurikuler</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>

            </ul>

           
        <button id="darkToggle" class="btn">
            <i id="darkIcon" class="fa-regular fa-moon fs-4"></i>    
        </button>
        </div>
    </div>
</nav>
