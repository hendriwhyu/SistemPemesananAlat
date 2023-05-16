<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAlatModel extends Model
{
    use HasFactory;
    protected $table = 'categoryalat';
    protected $primary = 'id_category_alat';

    public $timestamps = false;
}
