<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rental;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dataUsers = User::all()->count();
        $dataRental = Rental::all()->count();
        $dataUnit = Unit::where('status', 'ready')->count();
        return view('admin.dashboard', ['dataUnit'=>$dataUnit, 'dataRental'=>$dataRental, 'dataUsers'=>$dataUsers]);
    }
    public function kategori()
    {
        $data = Category::all();
        // dd($data);
        return view('admin.DataUnit.kategori', ['ListUnit' => $data]);
    }
    public function AddKategori(Request $request)
    {
        $cekKategori = Category::where('name_categories', $request->nama_kategori)->first();
        // dd($cekKategori);
        if ($cekKategori) {
            return back()->with('error', 'Nama Kategori sudah ada');
        } else {
            if ($request->nama_kategori == null) {
                return back()->with('error', 'Tambah kategori gagal');
            } else {
                $category = new Category;
                $category->name_categories = $request->nama_kategori;
                $category->save();
                Session::flash('status', 'success');
                Session::flash('message', 'Tambah kategori berhasil');
                return back();
            }
        }
    }

    public function edit(Request $request)
    {
        $cekKategori = Category::where('name_categories', $request->nama_kategori)->first();
        if ($cekKategori) {
            return back()->with('error', 'Nama Kategori sudah ada');
        } else {
            if ($request->nama_kategori == null) {
                return back()->with('error', 'Edit kategori gagal');
            } else {
                $data = Category::where('id_categories', $request->id_categori);
                $data->update([
                    'name_categories' => $request->nama_kategori
                ]);
                if ($data) {
                    Session::flash('status', 'success');
                    Session::flash('message', 'Ubah Kategori Berhasil');
                }
                return redirect()->route('admin.kategori');
            }
        }
    }
    public function delete(Request $request)
    {
        $data = Category::where('id_categories', $request->id_categori);
        $data->delete();
        if ($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Kategori Berhasil');
        }
        return redirect()->route('admin.kategori');
    }
}
