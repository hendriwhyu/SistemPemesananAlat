<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Rental;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dataChart = Unit::select('name_alat')->get();
        $valueChart = Rental::select('rental.id_alat', DB::raw('count(alatberat.id) as total_rental'))
            ->join('alatberat', 'alatberat.id', '=', 'rental.id_alat')
            ->groupBy('alatberat.id')
            ->get();
        $labels = $dataChart->pluck('name_alat')->toArray();
        $values = $valueChart->pluck('total_rental')->toArray();

        $dataUsers = User::all()->count();
        $dataRental = Rental::all()->count();
        $dataUnit = Unit::where('status', 'ready')->count();
        return view('admin.dashboard', ['dataUnit' => $dataUnit, 'dataRental' => $dataRental, 'dataUsers' => $dataUsers], compact('labels', 'values'));
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
        try {
            $data = Category::where('id_categories', $request->id_categori);
            $data->delete();
            if ($data) {
                Session::flash('status', 'success');
                Session::flash('message', 'Hapus Kategori Berhasil');
            }
            return redirect()->route('admin.kategori');
        } catch (\Throwable $e) {
            Session::flash('error', 'error');
            Session::flash('message', 'Terdapat data didalam kategori');
            return redirect()->route('admin.kategori');
        }
    }
}
