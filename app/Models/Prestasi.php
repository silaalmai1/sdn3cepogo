<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'judul',
        'tingkat',
        'tahun',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'gambar',
        'slug',
    ];
}
