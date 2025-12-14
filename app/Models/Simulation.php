<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Simulation extends Model
{
    use HasFactory;

    protected $table = 'simulations';

    // PRIMARY KEY sesuai struktur table
    protected $primaryKey = 'id_simulasi';

    protected $fillable = [
        'id_user',
        'id_bank',
        'nominal_deposito',
        'jangka_waktu_bulan',
        'bunga_diterima',
        'total_akhir',
        'waktu_simulasi',
    ];

    protected $casts = [
        'nominal_deposito' => 'decimal:2',
        'bunga_diterima' => 'decimal:2',
        'total_akhir' => 'decimal:2',
        'waktu_simulasi' => 'datetime',
    ];

    // Relasi ke User
    // Foreign key: id_user -> users.id_user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke Bank
    // Foreign key: id_bank -> banks.id_bank
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }
}
