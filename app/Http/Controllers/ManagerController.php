<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailUnit;
use App\Models\Rental;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $dataChart = Unit::select('name_alat')->get();
        $valueChart = Rental::select('rental.id_alat', DB::raw('count(alatberat.id) as total_rental'))
        ->join('alatberat', 'alatberat.id', '=', 'rental.id_alat')
        ->where('rental.status', '!=', 'canceled')
        ->where('rental.status', '!=', 'booked')
            ->groupBy('alatberat.id')
            ->get();
        
        $labels = $dataChart->pluck('name_alat')->toArray();
        $values = $valueChart->pluck('total_rental')->toArray();

        $dataRental = Rental::all()->count();
        $dataUnit = Unit::where('status', 'ready')->count();
        return view('manager.dashboard', compact('dataRental', 'dataUnit', 'labels', 'values'));
    }

    public function unit($categories)
    {
        $kategori = Category::where('name_categories', $categories)->first();
        $unit = Unit::where('id_categories', $kategori->id_categories)->orderBy('kode_alat', 'ASC')->get();
        return view('manager.cekunit', ['Kategori' => $kategori], compact('Unit'));
    }

    public function show($categories)
    {
        $kategori = Category::where('name_categories', $categories)->first();
        $unit = Unit::where('id_categories', $kategori->id_categories)->orderBy('kode_alat', 'ASC')->get();
        return view('manager.DataUnit.unit', ['Kategori' => $kategori, 'Unit' => $unit]);
    }

    public function kategori()
    {
        $data = Category::all();
        // dd($data);
        return view('manager.DataUnit.kategori', ['ListUnit' => $data]);
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
            if ($data->update()) {
                return back()->with('success', 'Detail Unit telah diubah');
            } else {
                return back()->with('error', 'Detail Unit gagal diubah');
            }
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

            if ($data->update()) {
                return back()->with('success', 'Detail Unit telah diubah');
            } else {
                return back()->with('error', 'Detail Unit gagal diubah');
            }
        }
    }

    public function histori()
    {
        $data = Rental::all();
        return view('manager.history-rental', ['ListData' => $data]);
    }
}
