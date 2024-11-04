<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ulasan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_ulasan',
        'id_pengguna',
        'id_film',
        'rating',
        'ulasan',
        'tanggal_ulasan'
    ];
}
