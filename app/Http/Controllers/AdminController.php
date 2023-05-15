<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
