<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_film';
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'id_film',
        'judul_film',
        'genre',
        'tahun_rilis',
        'sutradara',
        'deskripsi_film'
    ];
}
