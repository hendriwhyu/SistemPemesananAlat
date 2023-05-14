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
        Schema::create('categoryalat', function (Blueprint $table) {
            $table->integerIncrements('id_category_alat');
            $table->unsignedInteger('id_categories')->length(10);
            $table->foreign('id_categories')->references('id_categories')->on('category');
            $table->unsignedBigInteger('id_alat')->length(10);
            $table->foreign('id_alat')->references('id')->on('alatberat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoryalat');
    }
};
