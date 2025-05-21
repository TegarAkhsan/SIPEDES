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
            'kode_perihal' => 'required|string', // format: kode|perihal
            'tanggal_surat' => 'required|date',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'file_scan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            Log::info('Mulai proses simpan surat masuk');

            $fileScanUrl = $this->supabase->uploadFile($request->file('file_scan'));
            if (!$fileScanUrl) {
                throw new \Exception('Gagal mengupload file scan ke Supabase.');
            }
            Log::info('Hasil upload file:', ['url' => $fileScanUrl]);

            // Fungsi bersihkan input text
            $clean = function ($v) {
                if (!is_string($v)) return $v;
                $v = mb_convert_encoding($v, 'UTF-8', 'UTF-8');
                return preg_replace('/[\x00-\x1F\x7F]/u', '', $v);
            };

            // Ekstrak kode surat dan perihal dari input kode_perihal (format: kode|perihal)
            list($kodeSurat, $namaPerihal) = explode('|', $request->input('kode_perihal'));

            $data = [
                'no_agenda' => $clean($request->input('no_agenda')),
                'no_surat' => $clean($kodeSurat), // disimpan sebagai no_surat
                'tanggal_surat' => $request->input('tanggal_surat'),
                'tanggal_terima' => $request->input('tanggal_terima'),
                'pengirim' => $clean($request->input('pengirim')),
                'perihal' => $clean($namaPerihal), // disimpan sebagai perihal
                'file_scan_url' => $fileScanUrl,
            ];

            $jsonTest = json_encode($data);
            if ($jsonTest === false) {
                Log::error('json_encode error: ' . json_last_error_msg());
                return back()->withErrors(['msg' => 'Data mengandung karakter tidak valid UTF-8'])->withInput();
            }

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
