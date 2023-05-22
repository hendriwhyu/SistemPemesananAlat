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
        Schema::create('alatberat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat', 100)->unique();
            $table->string('name_alat', 100)->unique();
            $table->string('status')->default('ready');
            $table->unsignedInteger('id_categories')->length(10);
            $table->foreign('id_categories')->references('id_categories')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alatberat');
    }
};
