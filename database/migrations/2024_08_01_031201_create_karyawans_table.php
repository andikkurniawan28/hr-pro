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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('nik');
            $table->string('nomor_kk');
            $table->string('npwp');
            $table->string('bpjs_kesehatan');
            $table->string('bpjs_ketenagakerjaan');
            $table->string('nomor_rekening');
            $table->foreignId('bank_id')->constrained();
            $table->foreignId('cabang_id')->constrained();
            $table->foreignId('jabatan_id')->constrained();
            $table->foreignId('golongan_id')->constrained();
            $table->foreignId('pendidikan_id')->constrained();
            $table->foreignId('sekolah_id')->constrained();
            $table->foreignId('jurusan_id')->constrained();
            $table->foreignId('agama_id')->constrained();
            $table->foreignId('status_perkawinan_id')->constrained();
            $table->string('pas_foto')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
