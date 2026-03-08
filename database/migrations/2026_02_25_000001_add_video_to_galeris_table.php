<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('tipe')->default('foto')->after('kategori'); // 'foto' atau 'video'
            $table->string('video_url')->nullable()->after('tipe');
            $table->string('gambar')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['tipe', 'video_url']);
            $table->string('gambar')->nullable(false)->change();
        });
    }
};
