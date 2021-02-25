<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjian extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal_ujian',
        'tanggal_selesai',
        'waktu_ujian',
        'buka_regis',
        'tutup_regis',
        'jenis',

    ];
}
