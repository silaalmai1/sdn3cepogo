@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <style>
        .cropper-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.65);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .cropper-modal.show {
            display: flex;
        }

        .cropper-modal-card {
            width: min(900px, 100%);
            max-height: 92vh;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.28);
            display: flex;
            flex-direction: column;
        }

        .cropper-modal-body {
            padding: 12px;
            background: #f7f8fa;
            min-height: 380px;
        }

        .cropper-modal-body img {
            max-width: 100%;
            display: block;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card card-admin">
                <div class="card-body">
                    <h4 class="card-title mb-4">Pengaturan Website</h4>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ url('/admin/settings/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Logo Section -->
                        <div class="mb-4">
                            <h5 class="mb-3">Logo Sekolah</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Preview Logo Saat Ini</label>
                                        <div class="border rounded p-3 text-center bg-light">
                                            @php
                                                $currentLogo = App\Models\Setting::get('site_logo', 'images/logo.png');
                                                $logoUrl = str_starts_with($currentLogo, 'images/')
                                                    ? asset($currentLogo)
                                                    : asset('storage/' . $currentLogo);
                                            @endphp
                                            <img src="{{ $logoUrl }}" alt="Logo" class="img-fluid"
                                                style="max-height: 150px;" id="logo-preview">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="site_logo" class="form-label">Upload Logo Baru
                                            <small class="text-muted">(opsional)</small>
                                        </label>
                                        <input type="file" class="form-control @error('site_logo') is-invalid @enderror"
                                            id="site_logo" name="site_logo" accept="image/*"
                                            onchange="openCropperForInput(event, 'site_logo', 'logo-preview')">
                                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
                                        @error('site_logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- School Info Section -->
                        <div class="mb-4">
                            <h5 class="mb-3">Informasi Sekolah</h5>

                            <div class="mb-3">
                                <label for="school_name" class="form-label">Nama Sekolah <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                                    id="school_name" name="school_name"
                                    value="{{ old('school_name', App\Models\Setting::get('school_name', 'SDN 1 Cepogo')) }}"
                                    required>
                                @error('school_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_home_title" class="form-label">Judul Banner Beranda</label>
                                <input type="text" class="form-control @error('hero_home_title') is-invalid @enderror"
                                    id="hero_home_title" name="hero_home_title"
                                    value="{{ old('hero_home_title', App\Models\Setting::get('hero_home_title', App\Models\Setting::get('school_name', 'SD Negeri 1-3 Cepogo'))) }}"
                                    placeholder="Contoh: SDN 1 dan 3 Cepogo">
                                <small class="text-muted">Teks ini tampil besar pada banner halaman beranda.</small>
                                @error('hero_home_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="school_address" class="form-label">Alamat Lengkap <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('school_address') is-invalid @enderror" id="school_address" name="school_address"
                                    rows="4" required>{{ old('school_address', App\Models\Setting::get('school_address', '')) }}</textarea>
                                <small class="text-muted">Pisahkan setiap baris dengan Enter (contoh: desa, kecamatan,
                                    kabupaten, provinsi)</small>
                                @error('school_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="school_phone" class="form-label">Nomor Telepon</label>
                                        <input type="text"
                                            class="form-control @error('school_phone') is-invalid @enderror"
                                            id="school_phone" name="school_phone"
                                            value="{{ old('school_phone', App\Models\Setting::get('school_phone', '')) }}"
                                            placeholder="(0291) 123456">
                                        @error('school_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="school_email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control @error('school_email') is-invalid @enderror"
                                            id="school_email" name="school_email"
                                            value="{{ old('school_email', App\Models\Setting::get('school_email', '')) }}"
                                            placeholder="info@sdn1cepogo.sch.id">
                                        @error('school_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="operational_days" class="form-label">Hari Operasional</label>
                                        <input type="text"
                                            class="form-control @error('operational_days') is-invalid @enderror"
                                            id="operational_days" name="operational_days"
                                            value="{{ old('operational_days', App\Models\Setting::get('operational_days', 'Senin - Sabtu')) }}"
                                            placeholder="Contoh: Senin - Sabtu">
                                        @error('operational_days')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="operational_hours" class="form-label">Jam Operasional</label>
                                        <input type="text"
                                            class="form-control @error('operational_hours') is-invalid @enderror"
                                            id="operational_hours" name="operational_hours"
                                            value="{{ old('operational_hours', App\Models\Setting::get('operational_hours', '07:00 - 13:00 WIB')) }}"
                                            placeholder="Contoh: 07:00 - 13:00 WIB">
                                        @error('operational_hours')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="operational_holiday" class="form-label">Status Hari Libur</label>
                                        <input type="text"
                                            class="form-control @error('operational_holiday') is-invalid @enderror"
                                            id="operational_holiday" name="operational_holiday"
                                            value="{{ old('operational_holiday', App\Models\Setting::get('operational_holiday', 'Tutup')) }}"
                                            placeholder="Contoh: Tutup">
                                        @error('operational_holiday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Media Sosial</label>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="url"
                                            class="form-control @error('social_facebook_url') is-invalid @enderror"
                                            id="social_facebook_url" name="social_facebook_url"
                                            value="{{ old('social_facebook_url', App\Models\Setting::get('social_facebook_url', '')) }}"
                                            placeholder="URL Facebook (opsional)">
                                        @error('social_facebook_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url"
                                            class="form-control @error('social_instagram_url') is-invalid @enderror"
                                            id="social_instagram_url" name="social_instagram_url"
                                            value="{{ old('social_instagram_url', App\Models\Setting::get('social_instagram_url', '')) }}"
                                            placeholder="URL Instagram (opsional)">
                                        @error('social_instagram_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url"
                                            class="form-control @error('social_youtube_url') is-invalid @enderror"
                                            id="social_youtube_url" name="social_youtube_url"
                                            value="{{ old('social_youtube_url', App\Models\Setting::get('social_youtube_url', 'https://www.youtube.com/@sdn1-3cepogo26')) }}"
                                            placeholder="URL YouTube (opsional)">
                                        @error('social_youtube_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url"
                                            class="form-control @error('social_tiktok_url') is-invalid @enderror"
                                            id="social_tiktok_url" name="social_tiktok_url"
                                            value="{{ old('social_tiktok_url', App\Models\Setting::get('social_tiktok_url', '')) }}"
                                            placeholder="URL TikTok (opsional)">
                                        @error('social_tiktok_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="map_embed_url" class="form-label">URL Embed Google Maps</label>
                                <input type="url" class="form-control @error('map_embed_url') is-invalid @enderror"
                                    id="map_embed_url" name="map_embed_url"
                                    value="{{ old('map_embed_url', App\Models\Setting::get('map_embed_url', 'https://maps.google.com/maps?q=SD%20Negeri%201%203%20Cepogo%2C%20Jepara&t=&z=17&ie=UTF8&iwloc=&output=embed')) }}"
                                    placeholder="Tempel URL embed dari Google Maps">
                                <small class="text-muted">Gunakan link dari tombol Share > Embed a map di Google
                                    Maps.</small>
                                @error('map_embed_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="total_active_students" class="form-label">Total Siswa Aktif</label>
                                <input type="number"
                                    class="form-control @error('total_active_students') is-invalid @enderror"
                                    id="total_active_students" name="total_active_students" min="0"
                                    value="{{ old('total_active_students', App\Models\Setting::get('total_active_students', 63)) }}"
                                    placeholder="Contoh: 63">
                                <small class="text-muted">Angka ini ditampilkan pada card Siswa Aktif di beranda.</small>
                                @error('total_active_students')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <h5 class="mb-3">Konten Halaman</h5>

                            <div class="mb-3">
                                <label for="about_school_content" class="form-label">Tentang Sekolah</label>
                                <textarea class="form-control @error('about_school_content') is-invalid @enderror" id="about_school_content"
                                    name="about_school_content" rows="6" placeholder="Tulis profil singkat sekolah...">{{ old(
                                        'about_school_content',
                                        App\Models\Setting::get(
                                            'about_school_content',
                                            'SD Negeri 1-3 Cepogo merupakan sekolah dasar yang berlokasi di Desa Cepogo, Kecamatan Kembang, Kabupaten Jepara, Provinsi Jawa Tengah.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Sekolah kami berkomitmen menciptakan lingkungan belajar yang nyaman, kreatif, dan berprestasi untuk membentuk generasi yang cerdas, berakhlak, dan berkarakter.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Dengan dukungan tenaga pendidik profesional dan fasilitas yang memadai, SD Negeri 1-3 Cepogo terus berkembang untuk memberikan pendidikan terbaik bagi siswa.',
                                        ),
                                    ) }}</textarea>
                                <small class="text-muted">Gunakan baris kosong untuk memisahkan paragraf.</small>
                                @error('about_school_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vision_text" class="form-label">Visi Sekolah</label>
                                <textarea class="form-control @error('vision_text') is-invalid @enderror" id="vision_text" name="vision_text"
                                    rows="3" placeholder="Tulis visi sekolah...">{{ old('vision_text', App\Models\Setting::get('vision_text', 'Mewujudkan peserta didik unggul dalam prestasi yang berprofil pelajar pancasila serta peduli terhadap lingkungan.')) }}</textarea>
                                @error('vision_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mission_text" class="form-label">Misi Sekolah</label>
                                <textarea class="form-control @error('mission_text') is-invalid @enderror" id="mission_text" name="mission_text"
                                    rows="6" placeholder="Satu misi per baris...">{{ trim(old('mission_text', App\Models\Setting::get('mission_text', "Meningkatkan keimanan dan ketaqwaan kepada Tuhan YME melalui penanaman budi pekerti dan program kegiatan keagamaan\nMewujudkan pengembangan kurikulum yang meliputi 8 standar pendidikan\nMewujudkan pelaksanaan pembelajaran aktif, inovatif, kreatif, efektif dan menyenangkan sesuai dengan kebutuhan peserta didik\nMeningkatkan prestasi akademik dan non akademik sesuai bakat dan minat\nMeningkatkan sikap jujur, disiplin, peduli, santun, percaya diri, semangat kolaborasi dalam berinteraksi dengan lingkungan sosial dan alam"))) }}</textarea>
                                <small class="text-muted">Isi satu misi per baris, otomatis menjadi daftar di halaman
                                    publik.</small>
                                @error('mission_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-3">Sambutan Kepala SD Negeri 1</h6>
                                    @php
                                        $welcomeSd1Photo = App\Models\Setting::get(
                                            'welcome_sd1_photo',
                                            'images/kepsek1.jpg',
                                        );
                                        $welcomeSd1PhotoFit = App\Models\Setting::get('welcome_sd1_photo_fit', 'cover');
                                        $welcomeSd1PhotoUrl = str_starts_with($welcomeSd1Photo, 'images/')
                                            ? asset($welcomeSd1Photo)
                                            : asset('storage/' . $welcomeSd1Photo);
                                    @endphp
                                    <div class="mb-3">
                                        <label for="welcome_sd1_name" class="form-label">Nama</label>
                                        <input type="text"
                                            class="form-control @error('welcome_sd1_name') is-invalid @enderror"
                                            id="welcome_sd1_name" name="welcome_sd1_name"
                                            value="{{ old('welcome_sd1_name', App\Models\Setting::get('welcome_sd1_name', 'Nama Kepala SD 1')) }}">
                                        @error('welcome_sd1_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd1_title" class="form-label">Jabatan</label>
                                        <input type="text"
                                            class="form-control @error('welcome_sd1_title') is-invalid @enderror"
                                            id="welcome_sd1_title" name="welcome_sd1_title"
                                            value="{{ old('welcome_sd1_title', App\Models\Setting::get('welcome_sd1_title', 'Kepala SD Negeri 1 Cepogo')) }}">
                                        @error('welcome_sd1_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto Saat Ini</label>
                                        <div class="border rounded p-2 text-center bg-light">
                                            <img src="{{ $welcomeSd1PhotoUrl }}" alt="Foto Kepala SD 1"
                                                class="img-fluid rounded"
                                                style="max-height: 180px; width: 100%; object-fit: {{ $welcomeSd1PhotoFit }};"
                                                id="welcome-sd1-photo-preview">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd1_photo_fit" class="form-label">Mode Tampil Foto</label>
                                        <select class="form-select @error('welcome_sd1_photo_fit') is-invalid @enderror"
                                            id="welcome_sd1_photo_fit" name="welcome_sd1_photo_fit"
                                            onchange="applyPreviewFit('welcome-sd1-photo-preview', this.value)">
                                            <option value="cover"
                                                {{ old('welcome_sd1_photo_fit', $welcomeSd1PhotoFit) === 'cover' ? 'selected' : '' }}>
                                                Penuh Frame (bisa sedikit terpotong)</option>
                                            <option value="contain"
                                                {{ old('welcome_sd1_photo_fit', $welcomeSd1PhotoFit) === 'contain' ? 'selected' : '' }}>
                                                Tampilkan Utuh (tidak terpotong)</option>
                                        </select>
                                        <small class="text-muted">Pilih Tampilkan Utuh agar foto tidak kepotong di
                                            beranda.</small>
                                        @error('welcome_sd1_photo_fit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd1_photo" class="form-label">Upload Foto Kepala SD 1
                                            <small class="text-muted">(opsional)</small>
                                        </label>
                                        <input type="file"
                                            class="form-control @error('welcome_sd1_photo') is-invalid @enderror"
                                            id="welcome_sd1_photo" name="welcome_sd1_photo" accept="image/*"
                                            onchange="openCropperForInput(event, 'welcome_sd1_photo', 'welcome-sd1-photo-preview', 'welcome_sd1_photo_fit')">
                                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
                                        @error('welcome_sd1_photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd1_message" class="form-label">Isi Sambutan</label>
                                        <textarea class="form-control @error('welcome_sd1_message') is-invalid @enderror" id="welcome_sd1_message"
                                            name="welcome_sd1_message" rows="5">{{ old('welcome_sd1_message', App\Models\Setting::get('welcome_sd1_message', 'Puji syukur kepada Tuhan Yang Maha Esa, website sekolah ini hadir sebagai sarana informasi bagi masyarakat. Kami berkomitmen membentuk siswa yang berprestasi, berkarakter, dan siap menghadapi masa depan.')) }}</textarea>
                                        @error('welcome_sd1_message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="mb-3">Sambutan Kepala SD Negeri 3</h6>
                                    @php
                                        $welcomeSd3Photo = App\Models\Setting::get(
                                            'welcome_sd3_photo',
                                            'images/kepsek2.jpg',
                                        );
                                        $welcomeSd3PhotoFit = App\Models\Setting::get('welcome_sd3_photo_fit', 'cover');
                                        $welcomeSd3PhotoUrl = str_starts_with($welcomeSd3Photo, 'images/')
                                            ? asset($welcomeSd3Photo)
                                            : asset('storage/' . $welcomeSd3Photo);
                                    @endphp
                                    <div class="mb-3">
                                        <label for="welcome_sd3_name" class="form-label">Nama</label>
                                        <input type="text"
                                            class="form-control @error('welcome_sd3_name') is-invalid @enderror"
                                            id="welcome_sd3_name" name="welcome_sd3_name"
                                            value="{{ old('welcome_sd3_name', App\Models\Setting::get('welcome_sd3_name', 'Nama Kepala SD 3')) }}">
                                        @error('welcome_sd3_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd3_title" class="form-label">Jabatan</label>
                                        <input type="text"
                                            class="form-control @error('welcome_sd3_title') is-invalid @enderror"
                                            id="welcome_sd3_title" name="welcome_sd3_title"
                                            value="{{ old('welcome_sd3_title', App\Models\Setting::get('welcome_sd3_title', 'Kepala SD Negeri 3 Cepogo')) }}">
                                        @error('welcome_sd3_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto Saat Ini</label>
                                        <div class="border rounded p-2 text-center bg-light">
                                            <img src="{{ $welcomeSd3PhotoUrl }}" alt="Foto Kepala SD 3"
                                                class="img-fluid rounded"
                                                style="max-height: 180px; width: 100%; object-fit: {{ $welcomeSd3PhotoFit }};"
                                                id="welcome-sd3-photo-preview">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd3_photo_fit" class="form-label">Mode Tampil Foto</label>
                                        <select class="form-select @error('welcome_sd3_photo_fit') is-invalid @enderror"
                                            id="welcome_sd3_photo_fit" name="welcome_sd3_photo_fit"
                                            onchange="applyPreviewFit('welcome-sd3-photo-preview', this.value)">
                                            <option value="cover"
                                                {{ old('welcome_sd3_photo_fit', $welcomeSd3PhotoFit) === 'cover' ? 'selected' : '' }}>
                                                Penuh Frame (bisa sedikit terpotong)</option>
                                            <option value="contain"
                                                {{ old('welcome_sd3_photo_fit', $welcomeSd3PhotoFit) === 'contain' ? 'selected' : '' }}>
                                                Tampilkan Utuh (tidak terpotong)</option>
                                        </select>
                                        <small class="text-muted">Pilih Tampilkan Utuh agar foto tidak kepotong di
                                            beranda.</small>
                                        @error('welcome_sd3_photo_fit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd3_photo" class="form-label">Upload Foto Kepala SD 3
                                            <small class="text-muted">(opsional)</small>
                                        </label>
                                        <input type="file"
                                            class="form-control @error('welcome_sd3_photo') is-invalid @enderror"
                                            id="welcome_sd3_photo" name="welcome_sd3_photo" accept="image/*"
                                            onchange="openCropperForInput(event, 'welcome_sd3_photo', 'welcome-sd3-photo-preview', 'welcome_sd3_photo_fit')">
                                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB</small>
                                        @error('welcome_sd3_photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="welcome_sd3_message" class="form-label">Isi Sambutan</label>
                                        <textarea class="form-control @error('welcome_sd3_message') is-invalid @enderror" id="welcome_sd3_message"
                                            name="welcome_sd3_message" rows="5">{{ old('welcome_sd3_message', App\Models\Setting::get('welcome_sd3_message', 'Kami berharap website ini menjadi jembatan komunikasi antara sekolah dan masyarakat. Semoga sekolah kita terus berkembang dan menghasilkan generasi yang unggul.')) }}</textarea>
                                        @error('welcome_sd3_message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        @php
                            $defaultExtracurricular = [
                                'Pramuka',
                                'Seni Tari',
                                'Olahraga',
                                'Kesenian',
                                'Komputer',
                                'Drumband',
                            ];
                            $savedExtracurricular = json_decode(
                                App\Models\Setting::get('extracurricular_items', json_encode($defaultExtracurricular)),
                                true,
                            );
                            $savedExtracurricularLogos = json_decode(
                                App\Models\Setting::get('extracurricular_logos', '{}'),
                                true,
                            );
                            $savedExtracurricularLogos = is_array($savedExtracurricularLogos)
                                ? $savedExtracurricularLogos
                                : [];
                            $extracurricularItems = old(
                                'extracurricular_items',
                                is_array($savedExtracurricular) ? $savedExtracurricular : $defaultExtracurricular,
                            );
                        @endphp

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="mb-1">Ekstrakurikuler</h5>
                                    <small class="text-muted">Item yang dihapus di sini akan hilang dari beranda, footer,
                                        dan halaman ekstrakurikuler.</small>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                    onclick="addExtracurricularItem()">
                                    <i class="fas fa-plus me-1"></i>Tambah Item
                                </button>
                            </div>

                            <div id="extracurricular-list" class="d-grid gap-3">
                                @forelse ($extracurricularItems as $index => $item)
                                    @php
                                        $savedLogoPath = $savedExtracurricularLogos[$item] ?? null;
                                        $savedLogoNormalized = is_string($savedLogoPath)
                                            ? trim(str_replace('\\', '/', $savedLogoPath))
                                            : null;

                                        if (
                                            is_string($savedLogoNormalized) &&
                                            preg_match('/^https?:\/\//i', $savedLogoNormalized)
                                        ) {
                                            $parsedPath = parse_url($savedLogoNormalized, PHP_URL_PATH);
                                            $savedLogoNormalized = is_string($parsedPath)
                                                ? $parsedPath
                                                : $savedLogoNormalized;
                                        }

                                        $savedLogoNormalized = $savedLogoNormalized
                                            ? ltrim($savedLogoNormalized, '/')
                                            : null;
                                        $savedLogoUrl = null;

                                        if ($savedLogoNormalized) {
                                            if (
                                                preg_match('/^https?:\/\//i', $savedLogoNormalized) ||
                                                str_starts_with($savedLogoNormalized, '//')
                                            ) {
                                                $savedLogoUrl = $savedLogoNormalized;
                                            } elseif (str_starts_with($savedLogoNormalized, 'images/')) {
                                                $savedLogoUrl = asset($savedLogoNormalized);
                                            } elseif (str_starts_with($savedLogoNormalized, 'storage/')) {
                                                $savedLogoUrl = route('media.file', [
                                                    'path' => ltrim(
                                                        substr($savedLogoNormalized, strlen('storage/')),
                                                        '/',
                                                    ),
                                                ]);
                                            } else {
                                                $savedLogoUrl = route('media.file', ['path' => $savedLogoNormalized]);
                                            }
                                        }
                                    @endphp
                                    <div class="border rounded p-3 extracurricular-item"
                                        data-index="{{ $index }}">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-5">
                                                <label class="form-label mb-1">Nama Ekstrakurikuler</label>
                                                <input type="text" class="form-control" name="extracurricular_items[]"
                                                    value="{{ $item }}" placeholder="Nama ekstrakurikuler">
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label mb-1">Logo (Opsional)</label>
                                                <input type="file" class="form-control extracurricular-logo-input"
                                                    name="extracurricular_logos[{{ $index }}]" accept="image/*"
                                                    onchange="previewExtracurricularLogo(this)">
                                                <small class="text-muted">Format: JPG, PNG, GIF, WEBP (Max: 2MB)</small>
                                            </div>
                                            <div class="col-md-2 text-md-end">
                                                <button type="button" class="btn btn-outline-danger mt-4"
                                                    onclick="removeExtracurricularItem(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 d-flex align-items-center gap-2 extracurricular-logo-preview-wrapper {{ $savedLogoUrl ? '' : 'd-none' }}">
                                            <img src="{{ $savedLogoUrl }}" alt="Logo ekstrakurikuler"
                                                class="rounded border extracurricular-logo-preview"
                                                style="width: 48px; height: 48px; object-fit: cover;">
                                            <small class="text-muted">Logo saat ini</small>
                                        </div>
                                    </div>
                                @empty
                                    <div class="border rounded p-3 extracurricular-item" data-index="0">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-5">
                                                <label class="form-label mb-1">Nama Ekstrakurikuler</label>
                                                <input type="text" class="form-control" name="extracurricular_items[]"
                                                    placeholder="Nama ekstrakurikuler">
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label mb-1">Logo (Opsional)</label>
                                                <input type="file" class="form-control extracurricular-logo-input"
                                                    name="extracurricular_logos[0]" accept="image/*"
                                                    onchange="previewExtracurricularLogo(this)">
                                                <small class="text-muted">Format: JPG, PNG, GIF, WEBP (Max: 2MB)</small>
                                            </div>
                                            <div class="col-md-2 text-md-end">
                                                <button type="button" class="btn btn-outline-danger mt-4"
                                                    onclick="removeExtracurricularItem(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-2 d-flex align-items-center gap-2 extracurricular-logo-preview-wrapper d-none">
                                            <img src="" alt="Preview logo ekstrakurikuler"
                                                class="rounded border extracurricular-logo-preview"
                                                style="width: 48px; height: 48px; object-fit: cover;">
                                            <small class="text-muted">Preview logo</small>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            @error('extracurricular_items')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                            @error('extracurricular_items.*')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                            @error('extracurricular_logos.*')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Pengaturan
                            </button>
                            <a href="{{ url('/admin') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="cropperModal" class="cropper-modal" aria-hidden="true">
        <div class="cropper-modal-card">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <h6 class="mb-0">Sesuaikan Foto Sebelum Upload</h6>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="cancelCropper()">Tutup</button>
            </div>
            <div class="cropper-modal-body">
                <img id="cropperImage" src="" alt="Crop preview">
            </div>
            <div class="d-flex justify-content-between align-items-center p-3 border-top">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCropper(-90)">Putar
                        Kiri</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCropper(90)">Putar
                        Kanan</button>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-light btn-sm" onclick="cancelCropper()">Batal</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="applyCroppedImage()">Gunakan Foto
                        Ini</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <script>
        let cropperInstance = null;
        let cropperContext = {
            inputId: null,
            previewId: null,
            fitSelectId: null,
            fileType: 'image/jpeg'
        };

        function openCropperForInput(event, inputId, previewId, fitSelectId = null) {
            const input = event.target;
            const file = input.files && input.files[0] ? input.files[0] : null;

            if (!file) {
                return;
            }

            cropperContext = {
                inputId,
                previewId,
                fitSelectId,
                fileType: file.type || 'image/jpeg'
            };

            const modal = document.getElementById('cropperModal');
            const image = document.getElementById('cropperImage');
            image.src = URL.createObjectURL(file);

            modal.classList.add('show');
            modal.setAttribute('aria-hidden', 'false');

            if (cropperInstance) {
                cropperInstance.destroy();
            }

            cropperInstance = new Cropper(image, {
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                responsive: true,
                background: false
            });
        }

        function rotateCropper(deg) {
            if (cropperInstance) {
                cropperInstance.rotate(deg);
            }
        }

        function cancelCropper() {
            const modal = document.getElementById('cropperModal');
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');

            const input = document.getElementById(cropperContext.inputId || '');
            if (input) {
                input.value = '';
            }

            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }
        }

        function applyCroppedImage() {
            if (!cropperInstance) {
                return;
            }

            const outputType = cropperContext.fileType === 'image/png' ? 'image/png' : 'image/jpeg';
            const canvas = cropperInstance.getCroppedCanvas({
                maxWidth: 1800,
                maxHeight: 1800,
                imageSmoothingQuality: 'high'
            });

            canvas.toBlob(function(blob) {
                if (!blob) {
                    return;
                }

                const extension = outputType === 'image/png' ? 'png' : 'jpg';
                const croppedFile = new File([blob], `cropped-${Date.now()}.${extension}`, {
                    type: outputType
                });

                const input = document.getElementById(cropperContext.inputId);
                const preview = document.getElementById(cropperContext.previewId);
                if (input) {
                    const dt = new DataTransfer();
                    dt.items.add(croppedFile);
                    input.files = dt.files;
                }

                if (preview) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(croppedFile);
                }

                if (cropperContext.fitSelectId) {
                    const fitSelect = document.getElementById(cropperContext.fitSelectId);
                    if (fitSelect) {
                        applyPreviewFit(cropperContext.previewId, fitSelect.value);
                    }
                }

                const modal = document.getElementById('cropperModal');
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');

                cropperInstance.destroy();
                cropperInstance = null;
            }, outputType, 0.92);
        }

        function previewImage(event, targetId = 'logo-preview') {
            const input = event.target;
            const preview = document.getElementById(targetId);

            if (preview && input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function applyPreviewFit(targetId, fitMode) {
            const preview = document.getElementById(targetId);
            if (preview) {
                preview.style.objectFit = fitMode;
            }
        }

        function addExtracurricularItem() {
            const container = document.getElementById('extracurricular-list');
            const wrapper = document.createElement('div');
            wrapper.className = 'border rounded p-3 extracurricular-item';
            wrapper.innerHTML = `
                <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                        <label class="form-label mb-1">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" name="extracurricular_items[]" placeholder="Nama ekstrakurikuler">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label mb-1">Logo (Opsional)</label>
                        <input type="file" class="form-control extracurricular-logo-input" accept="image/*" onchange="previewExtracurricularLogo(this)">
                        <small class="text-muted">Format: JPG, PNG, GIF, WEBP (Max: 2MB)</small>
                    </div>
                    <div class="col-md-2 text-md-end">
                        <button type="button" class="btn btn-outline-danger mt-4" onclick="removeExtracurricularItem(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-2 d-flex align-items-center gap-2 extracurricular-logo-preview-wrapper d-none">
                    <img src="" alt="Preview logo ekstrakurikuler" class="rounded border extracurricular-logo-preview" style="width: 48px; height: 48px; object-fit: cover;">
                    <small class="text-muted">Preview logo</small>
                </div>
            `;
            container.appendChild(wrapper);
            reindexExtracurricularItems();
        }

        function removeExtracurricularItem(button) {
            const items = document.querySelectorAll('.extracurricular-item');
            if (items.length === 1) {
                const textInput = items[0].querySelector('input[name="extracurricular_items[]"]');
                const fileInput = items[0].querySelector('.extracurricular-logo-input');
                const previewWrapper = items[0].querySelector('.extracurricular-logo-preview-wrapper');
                const previewImage = items[0].querySelector('.extracurricular-logo-preview');

                if (textInput) {
                    textInput.value = '';
                }

                if (fileInput) {
                    fileInput.value = '';
                }

                if (previewWrapper) {
                    previewWrapper.classList.add('d-none');
                }

                if (previewImage) {
                    previewImage.src = '';
                }
                return;
            }

            button.closest('.extracurricular-item').remove();
            reindexExtracurricularItems();
        }

        function reindexExtracurricularItems() {
            const items = document.querySelectorAll('.extracurricular-item');

            items.forEach((item, index) => {
                item.dataset.index = index;

                const fileInput = item.querySelector('.extracurricular-logo-input');
                if (fileInput) {
                    fileInput.name = `extracurricular_logos[${index}]`;
                }
            });
        }

        function previewExtracurricularLogo(input) {
            const wrapper = input.closest('.extracurricular-item');
            const previewWrapper = wrapper ? wrapper.querySelector('.extracurricular-logo-preview-wrapper') : null;
            const previewImage = wrapper ? wrapper.querySelector('.extracurricular-logo-preview') : null;

            if (!previewWrapper || !previewImage) {
                return;
            }

            if (!input.files || !input.files[0]) {
                previewWrapper.classList.add('d-none');
                previewImage.src = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewWrapper.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
