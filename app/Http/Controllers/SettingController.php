<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            // Custom validation messages in Indonesian
            $messages = [
                'school_name.required' => 'Nama sekolah tidak boleh kosong',
                'school_name.max' => 'Nama sekolah terlalu panjang (maksimal 255 karakter)',
                'school_address.required' => 'Alamat sekolah tidak boleh kosong',
                'school_address.min' => 'Alamat sekolah terlalu pendek (minimal 3 karakter)', 
                'school_email.email' => 'Format email tidak valid',
            ];
        
            $request->validate([
                'school_name' => 'required|string|max:255',
                'hero_home_title' => 'nullable|string|max:255',
                'school_address' => 'required|string|min:3',
            'school_phone' => 'nullable|string|max:50',
            'school_email' => 'nullable|email|max:255',
            'operational_days' => 'nullable|string|max:100',
            'operational_hours' => 'nullable|string|max:100',
            'operational_holiday' => 'nullable|string|max:100',
            'social_facebook_url' => 'nullable|url|max:255',
            'social_instagram_url' => 'nullable|url|max:255',
            'social_youtube_url' => 'nullable|url|max:255',
            'social_tiktok_url' => 'nullable|url|max:255',
            'map_embed_url' => 'nullable|url|max:1000',
            'total_active_students' => 'nullable|integer|min:0|max:100000',
            'about_school_content' => 'nullable|string',
            'vision_text' => 'nullable|string',
            'mission_text' => 'nullable|string',
            'welcome_sd1_name' => 'nullable|string|max:255',
            'welcome_sd1_title' => 'nullable|string|max:255',
            'welcome_sd1_message' => 'nullable|string',
            'welcome_sd1_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'welcome_sd1_photo_fit' => 'nullable|in:cover,contain',
            'welcome_sd3_name' => 'nullable|string|max:255',
            'welcome_sd3_title' => 'nullable|string|max:255',
            'welcome_sd3_message' => 'nullable|string',
            'welcome_sd3_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'welcome_sd3_photo_fit' => 'nullable|in:cover,contain',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extracurricular_items' => 'nullable|array',
            'extracurricular_items.*' => 'nullable|string|max:100',
            'extracurricular_logos' => 'nullable|array',
            'extracurricular_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], $messages);

        $extracurricularItems = collect($request->input('extracurricular_items', []))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();

        $missionLines = collect(preg_split('/\r\n|\r|\n/', (string) $request->input('mission_text', '')))
            ->map(function ($line) {
                $clean = trim((string) $line);

                // Normalize common leading bullet markers pasted from editors/docs
                $clean = preg_replace('/^([\-•\*]|\d+[\.)])\s*/u', '', $clean) ?? $clean;

                return trim($clean);
            })
            ->filter()
            ->values();

        $normalizedMissionText = $missionLines->implode("\n");

        $savedExtracurricularItems = json_decode(Setting::get('extracurricular_items', '[]'), true);
        $savedExtracurricularItems = is_array($savedExtracurricularItems) ? array_values($savedExtracurricularItems) : [];

        $savedLogoMap = json_decode(Setting::get('extracurricular_logos', '{}'), true);
        $savedLogoMap = is_array($savedLogoMap) ? $savedLogoMap : [];
        $savedLogoMap = collect($savedLogoMap)
            ->mapWithKeys(function ($path, $name) {
                $normalizedPath = $this->normalizeLogoPath($path);

                return $normalizedPath ? [(string) $name => $normalizedPath] : [];
            })
            ->all();

        $newLogoMap = [];

        foreach ($extracurricularItems as $index => $itemName) {
            $previousItemNameAtIndex = $savedExtracurricularItems[$index] ?? null;
            $logoPath = $savedLogoMap[$itemName]
                ?? ($previousItemNameAtIndex && isset($savedLogoMap[$previousItemNameAtIndex])
                    ? $savedLogoMap[$previousItemNameAtIndex]
                    : null);

            if ($request->hasFile("extracurricular_logos.$index")) {
                if ($this->isPublicDiskPath($logoPath) && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }

                $logoFile = $request->file("extracurricular_logos.$index");
                $safeName = Str::slug($itemName) ?: 'ekstrakurikuler';
                $filename = time() . "_{$index}_{$safeName}." . $logoFile->getClientOriginalExtension();
                $logoPath = $logoFile->storeAs('extracurricular', $filename, 'public');
            }

            if ($logoPath) {
                $newLogoMap[$itemName] = $logoPath;
            }
        }

        $newLogoPaths = array_values($newLogoMap);
        foreach ($savedLogoMap as $oldPath) {
            if (
                $this->isPublicDiskPath($oldPath)
                && !in_array($oldPath, $newLogoPaths, true)
                && Storage::disk('public')->exists($oldPath)
            ) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        // Update text settings
        Setting::set('school_name', $request->school_name);
        Setting::set('hero_home_title', trim((string) $request->input('hero_home_title', '')));
         Setting::set('school_address', trim($request->school_address));
        Setting::set('school_phone', $request->school_phone);
        Setting::set('school_email', $request->school_email);
        Setting::set('operational_days', trim((string) $request->input('operational_days', '')));
        Setting::set('operational_hours', trim((string) $request->input('operational_hours', '')));
        Setting::set('operational_holiday', trim((string) $request->input('operational_holiday', '')));
        Setting::set('social_facebook_url', trim((string) $request->input('social_facebook_url', '')));
        Setting::set('social_instagram_url', trim((string) $request->input('social_instagram_url', '')));
        Setting::set('social_youtube_url', trim((string) $request->input('social_youtube_url', '')));
        Setting::set('social_tiktok_url', trim((string) $request->input('social_tiktok_url', '')));
        Setting::set('map_embed_url', trim((string) $request->input('map_embed_url', '')));
        Setting::set('total_active_students', (string) $request->input('total_active_students', 63));
        Setting::set('about_school_content', $request->about_school_content);
        Setting::set('vision_text', $request->vision_text);
        Setting::set('mission_text', $normalizedMissionText);
        Setting::set('welcome_sd1_name', $request->welcome_sd1_name);
        Setting::set('welcome_sd1_title', $request->welcome_sd1_title);
        Setting::set('welcome_sd1_message', $request->welcome_sd1_message);
        Setting::set('welcome_sd1_photo_fit', $request->input('welcome_sd1_photo_fit', 'cover'));
        Setting::set('welcome_sd3_name', $request->welcome_sd3_name);
        Setting::set('welcome_sd3_title', $request->welcome_sd3_title);
        Setting::set('welcome_sd3_message', $request->welcome_sd3_message);
        Setting::set('welcome_sd3_photo_fit', $request->input('welcome_sd3_photo_fit', 'cover'));
        Setting::set('extracurricular_items', json_encode($extracurricularItems));
        Setting::set('extracurricular_logos', json_encode($newLogoMap));

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

        if ($request->hasFile('welcome_sd1_photo')) {
            $oldPhotoSd1 = Setting::get('welcome_sd1_photo', 'images/kepsek1.jpg');

            if ($oldPhotoSd1 && $oldPhotoSd1 != 'images/kepsek1.jpg' && Storage::disk('public')->exists($oldPhotoSd1)) {
                Storage::disk('public')->delete($oldPhotoSd1);
            }

            $photoPathSd1 = $request->file('welcome_sd1_photo')->store('kepsek', 'public');
            Setting::set('welcome_sd1_photo', $photoPathSd1);
        }

        if ($request->hasFile('welcome_sd3_photo')) {
            $oldPhotoSd3 = Setting::get('welcome_sd3_photo', 'images/kepsek2.jpg');

            if ($oldPhotoSd3 && $oldPhotoSd3 != 'images/kepsek2.jpg' && Storage::disk('public')->exists($oldPhotoSd3)) {
                Storage::disk('public')->delete($oldPhotoSd3);
            }

            $photoPathSd3 = $request->file('welcome_sd3_photo')->store('kepsek', 'public');
            Setting::set('welcome_sd3_photo', $photoPathSd3);
        }

        // Clear cache
        Setting::clearCache();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    private function normalizeLogoPath(mixed $path): ?string
    {
        if (!is_string($path)) {
            return null;
        }

        $normalized = trim(str_replace('\\', '/', $path));
        if ($normalized === '') {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $normalized)) {
            $parsedPath = parse_url($normalized, PHP_URL_PATH);
            $normalized = is_string($parsedPath) ? $parsedPath : '';
        }

        $normalized = ltrim($normalized, '/');

        if (str_starts_with($normalized, 'storage/')) {
            $normalized = substr($normalized, strlen('storage/'));
        }

        return $normalized !== '' ? $normalized : null;
    }

    private function isPublicDiskPath(mixed $path): bool
    {
        return is_string($path)
            && $path !== ''
            && !str_starts_with($path, 'images/')
            && !preg_match('/^https?:\/\//i', $path);
    }
}
