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
        Schema::table('gurus', function (Blueprint $table) {
            // Drop unique constraint dari nip terlebih dahulu
            $table->dropUnique(['nip']);
            
            // Ubah kolom nip dan posisi menjadi nullable
            $table->string('nip')->nullable()->change();
            $table->string('posisi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('nip')->nullable(false)->unique()->change();
            $table->string('posisi')->nullable(false)->change();
        });
    }
};
