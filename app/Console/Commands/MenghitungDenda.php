<?php

namespace App\Console\Commands;

use App\Http\Controllers\RentalController;
use App\Models\Pengembalian;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MenghitungDenda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:menghitung-denda';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task menghitung denda'; // Deskripsi task

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = now();
        $dendaRental = Rental::join('alatberat', 'rental.id_alat', '=', 'alatberat.id')
            ->join('detail_unit', 'detail_unit.kode_alat', '=', 'alatberat.kode_alat')
            ->join('pengembalians', 'pengembalians.kode_rental', '=', 'rental.kode_rental')
            ->select('rental.*', 'detail_unit.denda', 'detail_unit.type_book', 'pengembalians.*')
            ->get();

        foreach ($dendaRental as $transaction) {
            $tanggalSelesai = Carbon::parse($transaction->tanggal_selesai);
            $tanggalBalik = Carbon::parse($transaction->tanggal_kembali);

            $isOverdue = $tanggalSelesai->lt($tanggalBalik);
            $overdueDate = $isOverdue ? $tanggalBalik : $now;
            $daysOverdue = $overdueDate->diffInDays($tanggalSelesai);
            $hoursOverdue = $overdueDate->diffInHours($tanggalSelesai);
            $pengembalian = Pengembalian::where('kode_rental', $transaction->kode_rental)->first();

            if (($transaction->status == 'verified') || ($transaction->status == 'kembali' && $tanggalBalik > $tanggalSelesai)) {
                if ($transaction->type_book == 'hari' && $daysOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan hari
                    $penalty = $daysOverdue * intval($transaction->denda);
                    $pengembalian->update([
                        'totalDenda' => $penalty,
                        'status_pengembalian' => 'denda'
                    ]);
                } elseif ($transaction->type_book == 'jam' && $hoursOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan jam
                    $penalty = $hoursOverdue * intval($transaction->denda);
                    $pengembalian->update([
                        'totalDenda' => $penalty,
                        'status_pengembalian' => 'denda'
                    ]);
                }
            } elseif ($transaction->status == 'kembali') {
                if ($tanggalBalik > $tanggalSelesai) {
                    // Jika tanggal kembali melewati tanggal selesai
                    $penalty = $daysOverdue * intval($transaction->denda);
                    $pengembalian->update([
                        'totalDenda' => $penalty,
                        'status_pengembalian' => 'denda'
                    ]);
                } else {
                    $pengembalian->update([
                        'status_pengembalian' => 'ontime'
                    ]);
                }
            }
        }
        $this->info('Penalties calculated successfully.');
    }
}
