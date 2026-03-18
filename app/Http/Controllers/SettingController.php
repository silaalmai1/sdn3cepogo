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
            'about_school_content' => 'nullable|string',
            'vision_text' => 'nullable|string',
            'mission_text' => 'nullable|string',
            'welcome_sd1_name' => 'nullable|string|max:255',
            'welcome_sd1_title' => 'nullable|string|max:255',
            'welcome_sd1_message' => 'nullable|string',
            'welcome_sd3_name' => 'nullable|string|max:255',
            'welcome_sd3_title' => 'nullable|string|max:255',
            'welcome_sd3_message' => 'nullable|string',
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
        Setting::set('about_school_content', $request->about_school_content);
        Setting::set('vision_text', $request->vision_text);
        Setting::set('mission_text', $request->mission_text);
        Setting::set('welcome_sd1_name', $request->welcome_sd1_name);
        Setting::set('welcome_sd1_title', $request->welcome_sd1_title);
        Setting::set('welcome_sd1_message', $request->welcome_sd1_message);
        Setting::set('welcome_sd3_name', $request->welcome_sd3_name);
        Setting::set('welcome_sd3_title', $request->welcome_sd3_title);
        Setting::set('welcome_sd3_message', $request->welcome_sd3_message);
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
