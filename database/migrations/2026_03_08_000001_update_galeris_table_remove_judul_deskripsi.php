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
        Schema::table('galeris', function (Blueprint $table) {
            // Ubah kolom judul menjadi nullable (opsional)
            $table->string('judul')->nullable()->change();
            
            // Ubah kolom gambar menjadi nullable (karena bisa video)
            $table->string('gambar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul')->nullable(false)->change();
            $table->string('gambar')->nullable(false)->change();
        });
    }
};
