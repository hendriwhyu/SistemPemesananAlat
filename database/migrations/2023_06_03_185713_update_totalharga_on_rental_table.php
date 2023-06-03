<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rental', function (Blueprint $table) {
            $table->bigInteger('totalHarga')->length(100)->after('tanggal_selesai')->default(0);
            $table->time('waktu_pinjam')->after('tanggal_kembali')->nullable();
            $table->time('waktu_selesai')->after('waktu_pinjam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental', function (Blueprint $table) {
            $table->dropColumn('totalHarga');
            $table->dropColumn('waktu_pinjam');
            $table->dropColumn('waktu_selesai');
        });
    }
};