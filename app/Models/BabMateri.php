<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabMateri extends Model
{
    use HasFactory;

    protected $fillable=['materi_id',
    'bab',
    'isi'];

    public function getMateri()
    {
        return Materi::find($this->materi_id);
    }
}
