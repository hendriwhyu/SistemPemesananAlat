<?php

namespace App\Http\Controllers;

use App\Models\DetailUnit;
use App\Models\Pengembalian;
use App\Models\Rental;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rental::with('unit', 'peminjam', 'kembali')->get();
        $dataById = Rental::with('unit', 'peminjam', 'kembali')
            ->whereHas('peminjam', function ($query) {
                $query->where('id_users', Auth::user()->id_users);
            })->get();
        $dataByStatus = Rental::join('users', 'users.id_users', '=', 'rental.id_user')
            ->join('pengembalians', 'pengembalians.kode_rental', '=', 'rental.kode_rental')
            ->select('rental.*', 'pengembalians.*')
            ->where('rental.id_user', '=', Auth::user()->id_users)
            ->where('pengembalians.status_pengembalian', '=', 'denda')
            ->count();
        $hitungTotalDenda = Rental::join('users', 'users.id_users', '=', 'rental.id_user')
            ->join('pengembalians', 'pengembalians.kode_rental', '=', 'rental.kode_rental')
            ->where('rental.id_user', '=', Auth::user()->id_users)
            ->where('pengembalians.status_pengembalian', '=', 'denda')
            ->sum('pengembalians.totalDenda');
        $kodePembayaranDenda = Rental::join('users', 'users.id_users', '=', 'rental.id_user')
            ->join('pengembalians', 'pengembalians.kode_rental', '=', 'rental.kode_rental')
            ->where('rental.id_user', '=', Auth::user()->id_users)
            ->where('pengembalians.status_pengembalian', '=', 'denda')
            ->select('pengembalians.kode_rental')
            ->first();
        if (Auth::user()->id_role == 1) {
            return view('admin.history-rental', ['ListData' => $data]);
        } elseif (Auth::user()->id_role == 2) {
            return view('client.history-rental', ['ListData' => $dataById], compact('dataByStatus', 'hitungTotalDenda', 'kodePembayaranDenda'));
        }
    }

    public function pemesanan()
    {
        $listUnit = Unit::where('status', 'ready')->get();
        return view('client.pemesanan', ['ListUnit' => $listUnit]);
    }

    public function store(Request $request)
    {
        try {
            $rental = new Rental;
            $rental->id_user = Auth::user()->id_users;
            $rental->id_alat = $request->id_alat;
            $rental->totalHarga = $request->totalHarga;
            if ($request->jamPeminjaman == null) {
                $rental->tanggal_mulai = $request->tanggal_mulai;
                $rental->tanggal_selesai = $request->tanggal_selesai;
            } else {
                $rental->tanggal_mulai = now();
                $rental->tanggal_selesai = $request->jam_pinjam;
            }
            $rental->save();
            if ($rental->save()) {
                return back()->with('success', 'Berhasil melakukan pemesanan alat');
            }
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal melakukan pemesanan alat');
            # code...
        }
    }

    public function verifRental(Request $request)
    {
        $dataRentalByKode = Rental::where('kode_rental', $request->kode_rental)->first();
        try {
            if ($request->status == 'verified') {
                $pengembalian = new Pengembalian;
                $pengembalian->kode_rental = $request->kode_rental;
                $pengembalian->save();
                $dataRentalByKode->update([
                    'status' => $request->status
                ]);
            } elseif ($request->status == 'canceled') {
                $dataRentalByKode->update([
                    'status' => $request->status
                ]);
            } elseif ($request->status == 'kembali') {
                $dataRentalByKode->update([
                    'status' => $request->status
                ]);
                $pengembalian = Pengembalian::where('kode_rental', $request->kode_rental)->first();
                $pengembalian->update([
                    'tanggal_kembali' => $request->tanggal_kembali
                ]);
            }
            return back()->with('success', 'Berhasil memberikan verifikasi');
        } catch (\Throwable $e) {
            return back()->with('error', 'Lengkapi data update');
        }
    }

    public function uploadBukti(Request $request)
    {
        $dataRentalByKode = Rental::where('kode_rental', $request->kode_rental)->first();
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $buktiBayarImage = 'INV' . time() . '.' .  $request->file('image')->extension();
            $image->move(public_path('image/bukti-pembayaran/'), $buktiBayarImage);
            $data_foto = Rental::where('kode_rental', $request->kode_rental)->first();
            File::delete(public_path('image/bukti-pembayaran') . '/' . $data_foto->image);
            $dataRentalByKode->update([
                'bukti_pembayaran' => $buktiBayarImage
            ]);
        }
        if ($request->image == null) {
            return back()->with('error', 'Silahkan isi bukti pembayaran.');
        } else {
            return back()->with('success', 'Berhasil mengupload bukti pembayaran');
        }
    }

    public function bayarDenda(Request $request)
    {
        $dataPengembalianByKode = Pengembalian::where('kode_rental', $request->kode_rental)->first();
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $buktiBayarDenda = 'DND' . time() . '.' .  $request->file('image')->extension();
            $image->move(public_path('image/bukti-denda/'), $buktiBayarDenda);
            $data_foto = Pengembalian::where('kode_rental', $request->kode_rental)->first();
            File::delete(public_path('image/bukti-denda') . '/' . $data_foto->image);
            $dataPengembalianByKode->update([
                'bukti_bayar_denda' => $buktiBayarDenda
            ]);
        }
        if ($request->image == null) {
            return back()->with('error', 'Silahkan isi bukti pembayaran.');
        } else {
            return back()->with('success', 'Berhasil mengupload bukti pembayaran');
        }
    }
    
}
