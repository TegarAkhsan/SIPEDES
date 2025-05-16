<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArsipExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Gabungkan data surat masuk dan keluar, bisa sesuaikan sesuai kebutuhan
        $suratMasuk = SuratMasuk::select(
            'no_agenda', 'no_surat', 'tanggal_surat', 'tanggal_terima', 
            'pengirim', 'perihal', 'file_scan'
        )->get();

        $suratKeluar = SuratKeluar::select(
            'no_agenda', 'tanggal_keluar', 'nama_lengkap_pemohon', 'nik',
            'alamat', 'keperluan', 'hasil_pelayanan', 'kode_arsip', 'keterangan', 'file_scan'
        )->get();

        // Bisa gabungkan data menjadi satu collection, dengan penyesuaian kolom yang sama
        // Contoh, buat objek stdClass dengan kolom yang sama supaya bisa diexport ke Excel
        $data = collect();

        foreach ($suratMasuk as $sm) {
            $data->push((object)[
                'jenis_surat' => 'Masuk',
                'no_agenda' => $sm->no_agenda,
                'no_surat' => $sm->no_surat,
                'tanggal' => $sm->tanggal_surat,
                'nama' => $sm->pengirim,
                'perihal' => $sm->perihal,
                'file' => $sm->file_scan,
            ]);
        }

        foreach ($suratKeluar as $sk) {
            $data->push((object)[
                'jenis_surat' => 'Keluar',
                'no_agenda' => $sk->no_agenda,
                'no_surat' => $sk->kode_arsip,
                'tanggal' => $sk->tanggal_keluar,
                'nama' => $sk->nama_lengkap_pemohon,
                'perihal' => $sk->keperluan,
                'file' => $sk->file_scan,
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'Jenis Surat',
            'No Agenda',
            'No Surat / Kode Arsip',
            'Tanggal',
            'Nama / Pengirim',
            'Perihal / Keperluan',
            'File Scan',
        ];
    }
}
