<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlists extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_watchlists';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_watchlists',
        'id_pengguna',
        'id_film',
        'status',
        'tanggal_ditambahkan'
    ];
}
