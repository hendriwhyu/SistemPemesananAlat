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
            $table->foreign('id_user')->references('id_users')->on('users');
            $table->foreign('id_alat')->references('id')->on('alatberat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rental', function (Blueprint $table) {
            $table->dropForeign('rental_id_user_foreign');
            $table->dropForeign('rental_id_alat_foreign');
        });
    }
};
