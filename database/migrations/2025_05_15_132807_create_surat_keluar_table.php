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
            $table->string('no_surat');
            $table->date('tanggal_surat');
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('file_scan')->nullable(); // bisa untuk upload PDF/dokumen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
