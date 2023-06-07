<?php

namespace App\Console\Commands;

use App\Http\Controllers\RentalController;
use App\Models\Rental;
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
            ->where('rental.tanggal_selesai', '<', $now)
            ->select('rental.*', 'detail_unit.denda', 'detail_unit.type_book')
            ->get();

        foreach ($dendaRental as $transaction) {
            // Logika untuk menghitung denda
            $daysOverdue = $now->diffInDays($transaction->tanggal_selesai);
            $hoursOverdue = $now->diffInHours($transaction->tanggal_selesai);
            $penalty = 0; // Inisialisasi denda dengan 0

            if ($transaction->status != 'kembali' && $transaction->status != 'booked') {
                if ($transaction->type_book == 'hari' && $daysOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan hari
                    $penalty = $daysOverdue * intval($transaction->denda);
                } elseif ($transaction->type_book == 'jam' && $hoursOverdue > 0) {
                    // Jika ada keterlambatan pada peminjaman berdasarkan jam
                    $penalty = $hoursOverdue * intval($transaction->denda);
                }
            }elseif($transaction->status == 'kembali'){
                $transaction->status = 'kembali';
            }

            // Update transaksi dengan denda yang dihitung
            $transaction->totalDenda = $penalty;
            if ($transaction->status != 'booked' && $penalty == 0) {
                $transaction->status = 'booked';
            } elseif ($transaction->status != 'verified' && $penalty == 0) {
                $transaction->status = 'verified';            
            } else {
                $transaction->status = 'denda';
            }
            
            $transaction->save();
        }
        $this->info('Penalties calculated successfully.');
    }
}
