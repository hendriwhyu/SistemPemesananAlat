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

    protected $fillable = [
        'id_user',
        'id_alat',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_kembali'
    ];
    public function peminjam(): HasOne
    {
        return $this->hasOne(User::class, 'id_users', 'id_user');
    }
    public function unit(): HasMany
    {
        return $this->hasMany(Unit::class, 'id');
    }
}
