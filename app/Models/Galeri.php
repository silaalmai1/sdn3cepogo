<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    protected $fillable = [
        'gambar', 'kategori', 'tipe', 'video_url', 'video_file', 'video_sumber'
    ];

    public function getGambarUrlAttribute(): ?string
    {
        return $this->resolvePublicMediaUrl($this->gambar);
    }

    public function getVideoFileUrlAttribute(): ?string
    {
        return $this->resolvePublicMediaUrl($this->video_file);
    }

    private function resolvePublicMediaUrl(?string $path): ?string
    {
        if (!is_string($path) || trim($path) === '') {
            return null;
        }

        $normalized = trim(str_replace('\\', '/', $path));

        if (preg_match('/^https?:\/\//i', $normalized)) {
            $parsedPath = parse_url($normalized, PHP_URL_PATH);
            $normalized = is_string($parsedPath) ? $parsedPath : $normalized;
        }

        $normalized = ltrim($normalized, '/');

        if (Str::startsWith($normalized, 'storage/')) {
            $normalized = Str::after($normalized, 'storage/');
        }

        if ($normalized === '' || str_contains($normalized, '..')) {
            return null;
        }

        return route('media.file', ['path' => $normalized]);
    }
}
