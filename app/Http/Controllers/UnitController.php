<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailUnit;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function Pest\Laravel\delete;

class UnitController extends Controller
{
    public function show($categories)
    {
        $kategori = Category::where('name_categories', $categories)->first();
        $unit = Unit::where('id_categories', $kategori->id_categories)->orderBy('kode_alat', 'ASC')->get();
        return view('admin.DataUnit.unit', ['Kategori' => $kategori, 'Unit' => $unit]);
    }
    public function addUnit(Request $request)
    {
        $cekDuplikat = Unit::where('kode_alat', $request->kode_alat)->count();
        $cekDuplikatName = Unit::where('name_alat', $request->name_alat)->count();
        // dd($cekDuplikat);
        if ($cekDuplikat || $cekDuplikatName) {
            return back()->with('error', 'Kode Alat / Nama Alat sudah ada');
        } else {
            $data = Unit::create($request->all());
            $detail = new DetailUnit;
            $detail->kode_alat = $request->kode_alat;
            $detail->harga = '-';
            $detail->deskripsi = '-';
            $detail->type_book = 'jam';
            $detail->image = '-';
            $detail->save();
            return back();
            if ($data) {
                return back()->with('success', 'Unit telah ditambah');
            }
        }
    }
    public function edit(Request $request)
    {
        $data = Unit::where('id', $request->id);
        $data->update([
            'kode_alat' => $request->kode_alat,
            'name_alat' => $request->name_alat,
            'status' => $request->status
        ]);

        if ($data) {
            return back()->with('success', 'Unit telah diubah');
        } else {
            return back()->with('error', 'Unit gagal diubah');
        }
    }
    public function delete(Request $request)
    {
        $data = Unit::findOrFail($request->id);
        $detail = DetailUnit::where('kode_alat', $data->kode_alat)->first();
        if ($detail->image == '-') {
            DetailUnit::where('kode_alat', $data->kode_alat)->delete();
        } else {
            $imagePath = public_path('image') . '/' . $detail->image;
            if (file_exists($imagePath)) {
                unlink($imagePath); // Menghapus file gambar dari folder
            }
            DetailUnit::where('kode_alat', $data->kode_alat)->delete();
        }
        $data->delete();
        if ($data) {
            return back()->with('success', 'Unit telah dihapus');
        } else {
            return back()->with('error', 'Unit gagal dihapus');
        }
    }
    public function detailUpdate(Request $request)
    {
        $request->validate([
            'harga' => 'required',
            'deskripsi' => 'required',
            'type' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        if ($request->image == null) {
            $data = DetailUnit::where('kode_alat', $request->alat)->first();
            $data->update([
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'type_book' => $request->type
            ]);
        } else {
            $imageName = $request->alat . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $data = DetailUnit::where('kode_alat', $request->alat)->first();
            $data->update([
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'type_book' => $request->type,
                'image' => $imageName,
            ]);
        }

        if ($data) {
            return back()->with('success', 'Detail Unit telah diubah');
        } else {
            return back()->with('error', 'Detail Unit gagal diubah');
        }
    }
}
