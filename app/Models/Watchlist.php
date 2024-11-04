<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_watchlist';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_watchlist',
        'id_pengguna',
        'id_film',
        'status',
        'tanggal_ditambahkan'
    ];
}
