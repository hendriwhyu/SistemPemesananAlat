<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public function show($categories)
    {
        $kategori = Category::where('name_categories', $categories)->first();
        $unit = Unit::where('id_categories', $kategori->id_categories)->get();
        return view('admin.DataUnit.unit', ['Kategori' => $kategori, 'Unit' => $unit]);
    }
    public function addUnit(Request $request)
    {
        // dd($request);
        $data = Unit::create($request->all());
        if ($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Proyek Berhasil');
        }
        return back();
    }
}
