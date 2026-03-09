<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

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
        });
    }
}

