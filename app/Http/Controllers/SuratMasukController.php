<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupabaseService;
use Illuminate\Support\Facades\Log;

class SuratMasukController extends Controller
{
    protected $supabase;

    public function __construct()
    {
        $this->supabase = new SupabaseService();
    }

    private function extractFileNameFromUrl($url)
    {
        return basename(parse_url($url, PHP_URL_PATH));
    }

    // Tampilkan list surat masuk dari Supabase
    public function index()
    {
        $suratMasuk = $this->supabase->getAllSuratMasuk();
        return view('surat-masuk.index', compact('suratMasuk'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_agenda' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_scan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // max 5MB
        ]);

        try {
            Log::info('Mulai proses simpan surat masuk');

            // Upload file ke Supabase Storage
            $fileScanUrl = $this->supabase->uploadFile($request->file('file_scan'));
            Log::info('Hasil upload file:', ['url' => $fileScanUrl]);

            // Data untuk disimpan ke Supabase
            $data = [
                'no_agenda' => $request->input('no_agenda'),
                'no_surat' => $request->input('no_surat'),
                'tanggal_surat' => $request->input('tanggal_surat'),
                'tanggal_terima' => $request->input('tanggal_terima'),
                'pengirim' => $request->input('pengirim'),
                'perihal' => $request->input('perihal'),
                'file_scan_url' => $fileScanUrl,
            ];

            Log::info('Data yang akan dikirim ke Supabase:', $data);

            // Simpan ke database Supabase
            $insertResult = $this->supabase->saveSuratMasuk($data);
            Log::info('Hasil penyimpanan ke Supabase:', ['result' => $insertResult]);

            if (!$insertResult) {
                return back()->withErrors(['msg' => 'Gagal menyimpan data surat masuk ke Supabase.'])->withInput();
            }

            return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan surat masuk:', ['error' => $e->getMessage()]);
            return back()->withErrors(['msg' => 'Error: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $suratMasuk = $this->supabase->getSuratMasukById($id);
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_agenda' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_scan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            $surat = $this->supabase->getSuratMasukById($id);

            if (!$surat) {
                return back()->withErrors(['msg' => 'Data surat masuk tidak ditemukan'])->withInput();
            }

            $fileScanUrl = $surat['file_scan_url'] ?? null;

            // Jika ada file baru, upload dan update url
            if ($request->hasFile('file_scan')) {
                // Hapus file lama di storage
                if ($fileScanUrl) {
                    $fileNameToDelete = $this->extractFileNameFromUrl($fileScanUrl);
                    $this->supabase->deleteFile($fileNameToDelete);
                }

                $fileScanUrl = $this->supabase->uploadFile($request->file('file_scan'));
            }

            $data = [
                'no_agenda' => $request->input('no_agenda'),
                'no_surat' => $request->input('no_surat'),
                'tanggal_surat' => $request->input('tanggal_surat'),
                'tanggal_terima' => $request->input('tanggal_terima'),
                'pengirim' => $request->input('pengirim'),
                'perihal' => $request->input('perihal'),
                'file_scan_url' => $fileScanUrl,
            ];

            $updateResult = $this->supabase->updateSuratMasuk($id, $data);

            if (!$updateResult) {
                return back()->withErrors(['msg' => 'Gagal memperbarui data surat masuk'])->withInput();
            }

            return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $suratMasuk = $this->supabase->getSuratMasukById($id);

            if (!$suratMasuk) {
                return back()->withErrors(['msg' => 'Data surat masuk tidak ditemukan']);
            }

            if (!empty($suratMasuk['file_scan_url'])) {
                $fileNameToDelete = $this->extractFileNameFromUrl($suratMasuk['file_scan_url']);
                $this->supabase->deleteFile($fileNameToDelete);
            }

            $deleted = $this->supabase->deleteSuratMasuk($id);

            if (!$deleted) {
                return back()->withErrors(['msg' => 'Gagal menghapus data surat masuk di Supabase']);
            }

            return redirect()->route('surat-masuk.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error: ' . $e->getMessage()]);
        }
    }

}
