<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SupabaseService
{
    protected $client;
    protected $storageClient;
    protected $url;
    protected $key;
    protected $storageUrl;
    protected $bucket;

    private function cleanUtf8String($value)
    {
        if (!is_string($value)) return $value;

        // Hapus karakter tidak valid UTF-8
        $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');

        // Hapus karakter kontrol ASCII (kecuali tab, LF, CR)
        return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value);
    }

    public function __construct()
    {   
        // Pastikan URL Supabase dari .env benar
        $this->url = rtrim(env('SUPABASE_URL', 'https://ospsoqynvssrrhjtccmx.supabase.co'), '/');
        $this->key = env('SUPABASE_KEY');
        $this->bucket = env('SUPABASE_STORAGE_BUCKET', 'public');
        $this->storageUrl = $this->url . '/storage/v1/object';

        $this->client = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        $this->storageClient = new Client([
            'base_uri' => $this->storageUrl,
            'headers' => [
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
            ],
        ]);
    }

    public function getAllSuratMasuk()
    {
        try {
            $response = $this->client->get('/rest/v1/surat_masuk', [
                'query' => ['select' => '*']
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error("Supabase getAllSuratMasuk error: " . $e->getMessage());
            return [];
        }
    }

    public function uploadFile($file)
    {
        try {
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = "uploads/{$filename}";
            $fileContent = file_get_contents($file->getRealPath());

            $response = Http::withHeaders([
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => $file->getClientMimeType(),
            ])->withBody($fileContent, $file->getClientMimeType())
            ->put("{$this->storageUrl}/{$this->bucket}/{$path}");

            if (!$response->successful()) {
                Log::error('Upload file ke Supabase gagal: ' . $response->body());
                return false;
            }

            return "{$this->url}/storage/v1/object/public/{$this->bucket}/{$path}";
        } catch (\Exception $e) {
            Log::error('Exception saat upload file ke Supabase: ' . $e->getMessage());
            return false;
        }
    }





    public function deleteFile($filePath)
    {
        try {
            $response = $this->storageClient->delete("/object/{$this->bucket}/{$filePath}");
            return $response->getStatusCode() === 204;
        } catch (\Exception $e) {
            Log::error("Supabase deleteFile error: " . $e->getMessage());
            return false;
        }
    }
    public function saveSuratMasuk(array $data)
    {
        try {
            // Tambahkan di sini
            if (isset($data['file_scan_url'])) {
                $data['file_scan'] = $data['file_scan_url'];
                unset($data['file_scan_url']);
            }
            Log::error('Data mentah sebelum encoding: ' . json_encode($data, JSON_UNESCAPED_UNICODE));

            // Bersihkan encoding data agar valid UTF-8
            $encodedData = $this->cleanUtf8Recursive($data);

            $jsonTest = json_encode($encodedData, JSON_UNESCAPED_UNICODE);
            if ($jsonTest === false) {
                $jsonError = json_last_error_msg();
                Log::error("json_encode gagal: " . $jsonError);
                throw new \Exception("json_encode gagal: " . $jsonError);
            }

            $response = $this->client->post('/rest/v1/surat_masuk', [
                'json' => $encodedData,
                'headers' => [
                    'Prefer' => 'return=representation',
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            return $result && count($result) > 0 ? $result[0] : false;
        } catch (\Exception $e) {
            Log::error("Supabase saveSuratMasuk error: " . $e->getMessage());
            return false;
        }
    }

    private function cleanUtf8Recursive($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->cleanUtf8Recursive($value);
            }
            return $data;
        }
        return $this->cleanUtf8String($data);
    }



    public function getSuratMasukById($id)
    {
        try {
            $response = $this->client->get('/rest/v1/surat_masuk', [
                'query' => ['id' => "eq.{$id}", 'select' => '*'],
            ]);
            $result = json_decode($response->getBody(), true);
            return $result && count($result) > 0 ? $result[0] : null;
        } catch (\Exception $e) {
            Log::error("Supabase getSuratMasukById error: " . $e->getMessage());
            return null;
        }
    }

    public function updateSuratMasuk($id, array $data)
    {
        try {
            Log::error('Data mentah sebelum encoding: ' . json_encode($data, JSON_UNESCAPED_UNICODE));

            // Bersihkan encoding data agar valid UTF-8
            $encodedData = array_map(function ($value) {
                return $this->cleanUtf8String($value);
            }, $data);

            // Cek json_encode secara manual untuk mendeteksi error encoding
            $jsonTest = json_encode($encodedData, JSON_UNESCAPED_UNICODE);
            if ($jsonTest === false) {
                $jsonError = json_last_error_msg();
                Log::error("json_encode gagal: " . $jsonError);
                throw new \Exception("json_encode gagal: " . $jsonError);
            }

            $response = $this->client->patch("/rest/v1/surat_masuk?id=eq.{$id}", [
                'json' => $encodedData,
                'headers' => [
                    'Prefer' => 'return=representation',
                ],
            ]);
            $result = json_decode($response->getBody(), true);
            return $result !== null;
        } catch (\Exception $e) {
            Log::error("Supabase updateSuratMasuk error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteSuratMasuk($id)
    {
        try {
            $response = $this->client->delete("/rest/v1/surat_masuk?id=eq.{$id}", [
                'headers' => [
                    'Prefer' => 'return=representation',
                ],
            ]);
            return $response->getStatusCode() === 204 || $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            Log::error("Supabase deleteSuratMasuk error: " . $e->getMessage());
            return false;
        }
    }


    public function saveSuratKeluar(array $data)
    {
        try {
            Log::info('[SupabaseService] Data yang dikirim ke Supabase:', $data);

            // Bersihkan UTF-8 jika perlu
            $encodedData = $this->cleanUtf8Recursive($data);

            // Cek validitas JSON
            $jsonTest = json_encode($encodedData, JSON_UNESCAPED_UNICODE);
            if ($jsonTest === false) {
                $jsonError = json_last_error_msg();
                Log::error("json_encode gagal: " . $jsonError);
                throw new \Exception("json_encode gagal: " . $jsonError);
            }

            $response = $this->client->post('/rest/v1/surat_keluar', [
                'json' => $encodedData,
                'headers' => [
                    'Prefer' => 'return=representation',
                ],
            ]);

            Log::info('[SupabaseService] Response status:', [$response->getStatusCode()]);
            Log::info('[SupabaseService] Response body:', [$response->getBody()->getContents()]);

            $result = json_decode($response->getBody(), true);
            return $result && count($result) > 0 ? $result[0] : false;
        } catch (\Exception $e) {
            Log::error('[SupabaseService] Exception saat menyimpan data surat keluar:', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    public function savePenduduk($data)
    {
        $response = $this->client
            ->from('penduduk') // nama tabel di Supabase
            ->insert([$data])
            ->execute();

        return $response['status'] === 201; // atau sesuaikan jika format respon berbeda
    }
}
