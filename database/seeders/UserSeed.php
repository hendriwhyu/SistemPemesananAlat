<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // User::truncate();
        // Schema::enableForeignKeyConstraints();

        User::create([
            // 'nama_pengguna' => 'user',
            // 'email' => 'hendri@gmail.com',
            // 'password' => Hash::make('hendri123'),
            // 'id_role' => 1 // Ubah sesuai id_role yang diinginkan
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'id_role' => 1, // Ubah sesuai id_role yang diinginkan
            'telp' => '0811111',
            'alamat' => 'Perum'
            // 'username' => 'client',
            // 'email' => 'admin@gmail.com',
            // 'password' => Hash::make('client'),
            // 'id_role' => 2, // Ubah sesuai id_role yang diinginkan
            // 'telp' => '0811111',
            // 'alamat' => 'Perum'
        ]);
    }
}
