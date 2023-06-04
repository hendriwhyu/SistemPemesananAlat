<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rental::with('unit', 'peminjam')->get();
        $dataById = Rental::with('unit', 'peminjam')
            ->whereHas('peminjam', function ($query) {
                $query->where('id_users', Auth::user()->id_users);
            })->get();
        if (Auth::user()->id_role == 1) {
            return view('admin.history-rental', ['ListData' => $data]);
        } elseif (Auth::user()->id_role == 2) {
            return view('client.history-rental', ['ListData' => $dataById]);
        }
    }

    public function pemesanan()
    {
        $listUnit = Unit::where('status', 'ready')->get();
        return view('client.pemesanan', ['ListUnit' => $listUnit]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rental = new Rental;
            $rental->id_user = Auth::user()->id_users;
            $rental->id_alat = $request->id_alat;
            $rental->totalHarga = $request->totalHarga;
            if ($request->jamPeminjaman == null) {
                $rental->tanggal_mulai = $request->tanggalMulai;
                $rental->tanggal_selesai = $request->tanggalSelesai;
            } else {
                $rental->tanggal_mulai = now();
                $rental->tanggal_selesai = $request->jam_pinjam;
            }
            // dd($rental);
            $rental->save();
            if ($rental->save()) {
                return back()->with('success', 'Berhasil melakukan pemesanan alat');
            }
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal melakukan pemesanan alat');
            # code...
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
