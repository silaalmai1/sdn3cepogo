<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['kontak_id', 'pesan'];

    public function kontak()
    {
        return $this->belongsTo(Kontak::class);
    }
}
