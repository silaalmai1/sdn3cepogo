<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share settings with all views
        View::composer('*', function ($view) {
            $view->with('settings', [
                'site_logo' => Setting::get('site_logo', 'images/logo.png'),
                'school_name' => Setting::get('school_name', 'SDN 1 Cepogo'),
                'school_address' => Setting::get('school_address', 'Desa Cepogo RT. 04 RW. 10, Kec. Kembang, Kab. Jepara, Prov. Jawa Tengah'),
                'school_phone' => Setting::get('school_phone', '081390788465'),
                'school_email' => Setting::get('school_email', 'sdn1.3cepogo@gmail.com'),
            ]);

            // Helper functions for logo URL
            $siteLogo = Setting::get('site_logo', 'images/logo.png');
            $logoUrl = str_starts_with($siteLogo, 'images/')
                ? asset($siteLogo)
                : asset('storage/' . $siteLogo);

            $view->with('logoUrl', $logoUrl);
            $view->with('extracurricularItems', $this->getExtracurricularItems());
        });
    }

    private function getExtracurricularItems(): array
    {
        $defaults = [
            'Pramuka',
            'Seni Tari',
            'Olahraga',
            'Kesenian',
            'Komputer',
            'Drumband',
        ];

        $storedItems = json_decode(Setting::get('extracurricular_items', json_encode($defaults)), true);

        $items = collect(is_array($storedItems) ? $storedItems : $defaults)
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->values();

        $metadata = [
            'Pramuka' => [
                'icon' => 'fa-campground',
                'description' => 'Kegiatan kepramukaan yang melatih kedisiplinan, kemandirian, dan jiwa kepemimpinan siswa melalui kegiatan di alam terbuka.',
                'type' => 'Wajib',
                'type_class' => 'bg-primary-subtle text-primary',
                'schedule' => 'Setiap Jumat',
            ],
            'Seni Tari' => [
                'icon' => 'fa-music',
                'description' => 'Mengembangkan bakat seni tari tradisional dan modern untuk memperkenalkan budaya lokal kepada siswa sejak dini.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Setiap Rabu',
            ],
            'Olahraga' => [
                'icon' => 'fa-futbol',
                'description' => 'Mendorong siswa aktif bergerak melalui berbagai cabang olahraga seperti sepak bola, bulu tangkis, dan voli.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Setiap Sabtu',
            ],
            'Kesenian' => [
                'icon' => 'fa-palette',
                'description' => 'Melatih kreativitas siswa melalui seni rupa, menggambar, dan kerajinan tangan yang mengasah imajinasi dan ekspresi diri.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Setiap Kamis',
            ],
            'Komputer' => [
                'icon' => 'fa-computer',
                'description' => 'Mengenalkan teknologi informasi kepada siswa sejak dini agar siap menghadapi era digital dengan kemampuan literasi komputer.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Setiap Selasa',
            ],
            'Drumband' => [
                'icon' => 'fa-drum',
                'description' => 'Melatih kekompakan dan rasa musikal siswa melalui kegiatan drumband yang sering tampil pada acara sekolah dan daerah.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Setiap Senin',
            ],
        ];

        return $items->map(function ($name) use ($metadata) {
            $defaultMeta = [
                'icon' => 'fa-star',
                'description' => 'Kegiatan pengembangan bakat dan minat siswa.',
                'type' => 'Pilihan',
                'type_class' => 'bg-success-subtle text-success',
                'schedule' => 'Jadwal menyesuaikan',
            ];

            return array_merge([
                'name' => $name,
            ], $defaultMeta, $metadata[$name] ?? []);
        })->all();
    }
}

