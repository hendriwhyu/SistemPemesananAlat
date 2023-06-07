<?php

namespace App\Console\Commands;

use App\Http\Controllers\RentalController;
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
            $penalty = 0; // Inisialisasi denda dengan 0

            $isOverdue = $tanggalSelesai->lt($tanggalBalik);
            $overdueDate = $isOverdue ? $tanggalBalik : $now;
            $daysOverdue = $overdueDate->diffInDays($tanggalSelesai);
            $hoursOverdue = $overdueDate->diffInHours($tanggalSelesai);

            if (in_array($transaction->status, ['booked', 'verified']) || ($transaction->status == 'kembali' && $tanggalBalik > $tanggalSelesai && $penalty == 0)) {
                if ($transaction->type_book == 'hari' && $daysOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan hari
                    $penalty = $daysOverdue * intval($transaction->denda);
                    $transaction->totalDenda = $penalty;
                    $transaction->save();
                } elseif ($transaction->type_book == 'jam' && $hoursOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan jam
                    $penalty = $hoursOverdue * intval($transaction->denda);
                    $transaction->totalDenda = $penalty;
                    $transaction->save();
                }
            } elseif ($transaction->status == 'kembali' && $penalty == 0) {
                if ($tanggalBalik > $tanggalSelesai) {
                    // Jika tanggal kembali melewati tanggal selesai
                    $penalty = intval($transaction->denda);
                    $transaction->totalDenda = $penalty;
                    $transaction->save();
                } else {
                    $transaction->status = $transaction->status;
                }
            }
        }
        $this->info('Penalties calculated successfully.');
    }
}
