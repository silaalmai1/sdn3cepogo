<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function show(string $path)
    {
        $normalizedPath = ltrim(str_replace('\\', '/', $path), '/');

        if ($normalizedPath === '' || str_contains($normalizedPath, '..')) {
            abort(404);
        }

        if (!Storage::disk('public')->exists($normalizedPath)) {
            abort(404);
        }

        return response()->file(Storage::disk('public')->path($normalizedPath), [
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }
}
