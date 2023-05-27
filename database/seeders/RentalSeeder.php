<?php

namespace Database\Seeders;

use App\Models\Rental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rental::create([
            // 'id_user' => 4,
            // 'id_alat' => 1,
            // 'tanggal_mulai' => now(),
            // 'tanggal_selesai' => now(),
            // 'tanggal_kembali' => now(),
            'id_user' => 3,
            'id_alat' => 2,
            'tanggal_mulai' => now(),
            'tanggal_selesai' => now(),
            'tanggal_kembali' => now(),
        ]);
    }
}
