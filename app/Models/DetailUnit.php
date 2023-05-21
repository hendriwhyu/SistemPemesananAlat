<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailUnit extends Model
{
    use HasFactory;
    protected $table = 'detail_unit';
    protected $fillable = [
        'kode_alat',
        'harga',
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
