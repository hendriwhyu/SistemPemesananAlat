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
        'tanggal_kembali',
        'status_pengembalian',
        'totalDenda',
        'bukti_bayar_denda'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastRental = Rental::orderBy('kode_rental', 'desc')->first();
            if ($lastRental) {
                $lastId = intval(substr($lastRental->kode_rental, 1));
                $model->kode_rental = 'R' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $model->kode_rental = 'R001';
            }
        });
    }
    public $timestamps = false;
}
