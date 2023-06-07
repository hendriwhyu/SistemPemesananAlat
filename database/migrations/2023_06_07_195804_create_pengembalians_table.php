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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->string('kode_rental');
            $table->foreign('kode_rental')->references('kode_rental')->on('rental');
            $table->dateTime('tanggal_kembali')->nullable();
            $table->string('status_pengembalian')->nullable();
            $table->string('totalDenda')->nullable();
            $table->text('bukti_bayar_denda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
