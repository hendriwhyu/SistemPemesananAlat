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
        Schema::create('detail_unit', function (Blueprint $table) {
            $table->string('kode_alat');
            $table->foreign('kode_alat')->references('kode_alat')->on('alatberat');
            $table->string('harga')->default('-');
            $table->string('deskripsi')->default('-');
            $table->enum('type_book', ['jam', 'hari'])->default('jam');
            $table->text('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_unit');
    }
};
