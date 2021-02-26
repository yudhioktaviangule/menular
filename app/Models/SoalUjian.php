<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    use HasFactory;
    protected $fillable=[
        'materi_id',
        'bab_materi_id',
        'jadwal_id',
        'jenis',
        'isi',
        'json',
    ];
}
