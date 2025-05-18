<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda');
            $table->date('tanggal_keluar');
            $table->string('nama_lengkap_pemohon');
            $table->string('nik');
            $table->text('alamat');
            $table->string('keperluan');
            $table->string('hasil_pelayanan');
            $table->string('kode_arsip');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
