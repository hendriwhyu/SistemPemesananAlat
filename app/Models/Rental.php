<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rental';
    protected $primaryKey = 'kode_rental';
    protected $keyType = 'string';
    protected $fillable = [
        'id_user',
        'id_alat',
        'tanggal_mulai',
        'tanggal_selesai',
        'totalHarga',
        'status',
        'bukti_pembayaran'
    ];
    public function peminjam(): HasOne
    {
        return $this->hasOne(User::class, 'id_users', 'id_user');
    }
    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class, 'id', 'id_alat');
    }
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastRental = static::orderBy('kode_rental', 'desc')->first();
            if ($lastRental) {
                $lastId = intval(substr($lastRental->kode_rental, 1));
                $model->kode_rental = 'R' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $model->kode_rental = 'R001';
            }
        });
    }

    public function kembali(): HasOne
    {
        return $this->hasOne(Pengembalian::class, 'kode_rental', 'kode_rental');
    }
}
