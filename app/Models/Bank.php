<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $primaryKey = 'id_bank';

    protected $fillable = [
        'nama_bank',
        'kode_bank',
        'deskripsi',
        'suku_bunga_dasar',
        'gambar',
        'is_active'
    ];
}
