<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display settings form
     */
    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string',
            'school_phone' => 'nullable|string|max:50',
            'school_email' => 'nullable|email|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extracurricular_items' => 'nullable|array',
            'extracurricular_items.*' => 'nullable|string|max:100',
        ]);

        $extracurricularItems = collect($request->input('extracurricular_items', []))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();

        // Update text settings
        Setting::set('school_name', $request->school_name);
        Setting::set('school_address', $request->school_address);
        Setting::set('school_phone', $request->school_phone);
        Setting::set('school_email', $request->school_email);
        Setting::set('extracurricular_items', json_encode($extracurricularItems));

        // Handle logo upload
        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');

            // Delete old logo if it exists and not the default
            if ($oldLogo && $oldLogo != 'images/logo.png' && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            // Store new logo
            $logoPath = $request->file('site_logo')->store('logos', 'public');
            Setting::set('site_logo', $logoPath);
        }

        // Clear cache
        Setting::clearCache();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
