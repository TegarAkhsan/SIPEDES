<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Services\SupabaseService;
use Illuminate\Http\Request;
use App\Services\SupabaseStorageService;
use Illuminate\Support\Facades\Log;

class SuratKeluarController extends Controller
{
    protected $supabase;

    public function __construct()
    {
        $this->supabase = new SupabaseService();
    }

    // Tampilkan daftar surat keluar
    public function index()
    {
        $suratKeluar = SuratKeluar::orderBy('tanggal_keluar', 'desc')->paginate(10);
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Tampilkan form buat surat keluar baru
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Simpan surat keluar baru + upload file jika ada
    public function store(Request $request)
    {
        $request->validate([
            'no_agenda' => 'required',
            'tanggal_keluar' => 'required|date',
            'nama_lengkap_pemohon' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'kode_keperluan' => 'required',
            'hasil_pelayanan' => 'required',
            'keterangan' => 'nullable'
        ]);

        // Pisahkan kode arsip dan keperluan
        [$kodeArsip, $keperluan] = explode('|', $request->input('kode_keperluan'));

        $data = [
            'no_agenda' => $request->input('no_agenda'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
            'nama_lengkap_pemohon' => $request->input('nama_lengkap_pemohon'),
            'nik' => $request->input('nik'),
            'alamat' => $request->input('alamat'),
            'kode_arsip' => $kodeArsip,
            'keperluan' => $keperluan,
            'hasil_pelayanan' => $request->input('hasil_pelayanan'),
            'keterangan' => $request->input('keterangan'),
        ];

        Log::info('[SuratKeluarController] Data diproses untuk disimpan:', $data);

        // Simpan ke Supabase
        $result = $this->supabase->saveSuratKeluar($data);

        if (!$result) {
            Log::error('[SuratKeluarController] Gagal menyimpan ke Supabase');
            return back()->withErrors(['general' => 'Gagal menyimpan data ke Supabase']);
        }

        // Kalau berhasil simpan, redirect balik ke form dengan pesan sukses
        return redirect()->back()->with('success', 'Surat keluar berhasil disimpan.');
    }

    // Tampilkan form edit surat keluar
    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    // Update surat keluar + upload file baru dan hapus file lama jika ada
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $validated = $request->validate([
            'no_agenda' => 'required',
            'tanggal_keluar' => 'required|date',
            'nama_lengkap_pemohon' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'hasil_pelayanan' => 'required',
            'kode_arsip' => 'required',
            'keterangan' => 'nullable',
        ]);

        // if ($request->hasFile('file_scan')) {
        //     if ($suratKeluar->file_scan) {
        //         $this->supabase->deleteFile($suratKeluar->file_scan);
        //     }

        //     $file = $request->file('file_scan');
        //     $fileName = time() . '_' . $file->getClientOriginalName();

        //     $uploadResult = $this->supabase->uploadFile($file->getPathname(), $fileName);

        //     if ($uploadResult === false) {
        //         return back()->withErrors(['file_scan' => 'Gagal upload file ke Supabase Storage']);
        //     }

        //     $validated['file_scan'] = $fileName;
        // }

        $suratKeluar->update($validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Data berhasil diupdate');
    }

    // Hapus surat keluar + hapus file di Supabase Storage
    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->file_scan) {
            $this->supabase->deleteFile($suratKeluar->file_scan);
        }

        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')->with('success', 'Data berhasil dihapus');
    }
}
