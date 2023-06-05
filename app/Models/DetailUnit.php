<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailUnit extends Model
{
    use HasFactory;
    protected $table = 'detail_unit';
    protected $primaryKey = 'kode_alat';
    protected $fillable = [
        'kode_alat',
        'harga',
        'denda',
        'deskripsi',
        'type_book',
        'image',
    ];

    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class);
    }
    public $timestamps = false;
}
