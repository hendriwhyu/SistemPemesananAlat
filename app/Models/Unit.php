<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'alatberat';
    protected $fillable = [
        'kode_alat',
        'name_alat',
        'status'
    ];
    public function relationCategory()
    {
        return $this->belongsTo(Category::class);
    }
}
