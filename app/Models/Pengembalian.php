<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_rental';
    protected $keyType = 'string';
    protected $fillable = [
        'kode_rental',
        'tanggal_kembali',
        'status_pengembalian',
        'totalDenda',
        'bukti_bayar_denda'
    ];
    public $timestamps = false;
}
