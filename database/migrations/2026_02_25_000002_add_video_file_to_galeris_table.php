<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('video_file')->nullable()->after('video_url');
            $table->string('video_sumber')->nullable()->after('video_file'); // 'file' atau 'url'
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['video_file', 'video_sumber']);
        });
    }
};
