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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('karyawan_id')->constrained();
            $table->timestamp('jam_masuk')->nullable();
            $table->timestamp('jam_pulang')->nullable();
            $table->timestamp('jam_istirahat')->nullable();
            $table->timestamp('jam_kembali_setelah_istirahat')->nullable();
            $table->boolean('masuk_lebih_awal')->default(0);
            $table->boolean('masuk_terlambat')->default(0);
            $table->boolean('istirahat_lebih_awal')->default(0);
            $table->boolean('istirahat_terlambat')->default(0);
            $table->boolean('pulang_lebih_awal')->default(0);
            $table->boolean('pulang_terlambat')->default(0);
            $table->float('jumlah_menit_masuk_lebih_awal')->nullable();
            $table->float('jumlah_menit_masuk_terlambat')->nullable();
            $table->float('jumlah_menit_istirahat_lebih_awal')->nullable();
            $table->float('jumlah_menit_istirahat_terlambat')->nullable();
            $table->float('jumlah_menit_pulang_lebih_awal')->nullable();
            $table->float('jumlah_menit_pulang_terlambat')->nullable();
            $table->boolean('selesai')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
