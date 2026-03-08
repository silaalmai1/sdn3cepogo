<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'gambar', 'kategori', 'tipe', 'video_url', 'video_file', 'video_sumber'
    ];
}
