<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'dibaca',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
