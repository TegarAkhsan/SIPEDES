<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $suratMasuk = SuratMasuk::query()
            ->when($search, function ($query, $search) {
                $query->where('no_agenda', 'like', "%$search%")
                      ->orWhere('pengirim', 'like', "%$search%")
                      ->orWhere('tanggal_surat', 'like', "%$search%")
                      ->orWhere('perihal', 'like', "%$search%");
            })
            ->get()
            ->map(function ($item) {
                return [
                    'jenis' => 'Surat Masuk',
                    'nama' => $item->pengirim,
                    'tanggal' => $item->tanggal_surat,
                    'perihal' => $item->perihal,
                    'no_agenda' => $item->no_agenda,
                ];
            });

        $suratKeluar = SuratKeluar::query()
            ->when($search, function ($query, $search) {
                $query->where('no_agenda', 'like', "%$search%")
                      ->orWhere('nama', 'like', "%$search%")
                      ->orWhere('tanggal_keluar', 'like', "%$search%")
                      ->orWhere('keperluan', 'like', "%$search%");
            })
            ->get()
            ->map(function ($item) {
                return [
                    'jenis' => 'Surat Keluar',
                    'nama' => $item->nama,
                    'tanggal' => $item->tanggal_keluar,
                    'perihal' => $item->keperluan,
                    'no_agenda' => $item->no_agenda,
                ];
            });

        // Gabungkan dan urutkan semua arsip
        $arsip = $suratMasuk->merge($suratKeluar)->sortByDesc('tanggal')->values();

        // Kirim ke view
        return view('arsip.index', compact('arsip'));
    }
}
