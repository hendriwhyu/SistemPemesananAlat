<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DetailUnit;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'alatberat';
    protected $fillable = [
        'kode_alat',
        'name_alat',
        'status',
        'id_categories'
    ];
    public function relationCategory()
    {
        return $this->belongsTo(Category::class);
    }
    public function detailUnit(): HasOne
    {
        return $this->hasOne(DetailUnit::class, 'kode_alat', 'kode_alat');
    }
}
