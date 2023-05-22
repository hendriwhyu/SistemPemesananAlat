<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kategori()
    {
        $data = Category::all();
        // dd($data);
        return view('admin.DataUnit.kategori', ['ListUnit' => $data]);
    }
    public function AddKategori(Request $request)
    {
        $category = new Category;
        $category->name_categories = $request->nama_kategori;
        $category->save();
        return back();
    }

    public function edit(Request $request)
    {
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
