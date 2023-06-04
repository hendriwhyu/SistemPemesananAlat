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
        Schema::create('rental', function (Blueprint $table) {
            $table->integerIncrements('kode_rental');
            $table->unsignedInteger('id_user')->length('10');
            $table->unsignedBigInteger('id_alat');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->bigInteger('totalHarga')->length(100)->default(0);
            $table->date('tanggal_kembali')->nullable();
            $table->string('status')->default('booked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental');
    }
};
