<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            [
                'key' => 'site_logo',
                'value' => 'images/logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'school_name',
                'value' => 'SDN 1 Cepogo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'school_address',
                'value' => "Desa Cepogo RT. 04 RW. 10\nKec. Kembang\nKab. Jepara\nProv. Jawa Tengah",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'school_phone',
                'value' => '(0291) 123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'school_email',
                'value' => 'info@sdn1cepogo.sch.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
