<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'posisi',
        'mata_pelajaran',
        'bio',
        'foto',
        'email',
        'no_telepon',
    ];
}
