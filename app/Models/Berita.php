<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar',
        'tanggal_publikasi',
        'is_published',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_published' => 'boolean',
    ];
}
