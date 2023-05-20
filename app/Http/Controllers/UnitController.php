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
        $cekDuplikat = Unit::where('kode_alat', $request->kode_alat)->count();
        // dd($request);
        if ($cekDuplikat) {
            return back()->with('error', 'Kode Alat sudah ada');
        } else {
            $data = Unit::create($request->all());
            if ($data) {
                return back()->with('success', 'Unit telah ditambah');
            }
        }
    }
}
