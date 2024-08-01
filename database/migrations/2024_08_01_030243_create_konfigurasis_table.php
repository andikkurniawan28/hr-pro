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
        Schema::create('konfigurasis', function (Blueprint $table) {
            $table->id();
            $table->double('gaji_pokok');
            $table->double('upah_lembur_per_jam');
            $table->integer('usia_pensiun');
            $table->float('toleransi_jam_masuk');
            $table->float('toleransi_jam_pulang');
            $table->float('toleransi_jam_istirahat');
            $table->float('jumlah_menit_masuk_lebih_awal_diasumsikan_lembur');
            $table->float('jumlah_menit_pulang_terlambat_diasumsikan_lembur');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfigurasis');
    }
};
