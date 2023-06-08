<?php

namespace App\Console\Commands;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MenghitungWaktuPemesanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:menghitung-waktu-pemesanan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task menghitung waktu pesan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = now();
        $prosesPemesanan = Rental::all();
        foreach ($prosesPemesanan as $proses){
            $tanggalPemesanan = Carbon::parse($proses->tanggal_mulai);
            $minuteOverdue = $now->diffInMinutes($tanggalPemesanan);
            if($proses->status == 'booked' && $minuteOverdue >= 30){
                $proses->update([
                    $proses->status = 'canceled'
                ]);
            }
        }
    }
}
