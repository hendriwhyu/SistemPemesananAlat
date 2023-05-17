<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function show($categories)
    {
        $kategori = Category::where('name_categories',$categories);
        $unit = Unit::all();
        return view('admin.DataUnit.unit', ['Kategori'=>$kategori, 'Unit'=>$unit]);
    }
}
