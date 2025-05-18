<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'no_agenda',
        'tanggal_keluar',
        'nama_lengkap_pemohon',
        'nik',
        'alamat',
        'keperluan',
        'hasil_pelayanan',
        'kode_arsip',
        'keterangan'
    ];
}
