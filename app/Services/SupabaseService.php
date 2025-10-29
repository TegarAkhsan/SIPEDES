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
        $this->url = rtrim(env('SUPABASE_URL'), '/');
        $this->key = env('SUPABASE_SERVICE_ROLE_KEY', env('SUPABASE_KEY'));
        $this->bucket = env('SUPABASE_STORAGE_BUCKET', 'surat-masuk');
        $this->storageUrl = $this->url . '/storage/v1';

        Log::info('Supabase Config:', [
            'url' => $this->url,
            'bucket' => $this->bucket,
            'storageUrl' => $this->storageUrl
        ]);

        $this->client = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'verify' => false, // Disable SSL verification (DEVELOPMENT ONLY!)
        ]);

        $this->storageClient = new Client([
            'base_uri' => $this->storageUrl,
            'headers' => [
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
            ],
            'verify' => false, // Disable SSL verification (DEVELOPMENT ONLY!)
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

    public function uploadFile($file, $folder = 'uploads')
    {
        try {
            // Generate unique filename
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $path = "{$folder}/{$filename}";

            Log::info('=== UPLOAD FILE DEBUG START ===');
            Log::info('Attempting file upload:', [
                'bucket' => $this->bucket,
                'path' => $path,
                'mime' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'original_name' => $file->getClientOriginalName()
            ]);

            // Read file content
            $fileContent = file_get_contents($file->getRealPath());

            if ($fileContent === false) {
                throw new \Exception('Gagal membaca file content');
            }

            Log::info('File content loaded, size: ' . strlen($fileContent) . ' bytes');

            // Upload to Supabase Storage
            $uploadUrl = "{$this->storageUrl}/object/{$this->bucket}/{$path}";

            Log::info('Upload URL:', ['url' => $uploadUrl]);
            Log::info('Using API Key (first 20 chars):', ['key' => substr($this->key, 0, 20) . '...']);

            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification (DEVELOPMENT ONLY!)
            ])->withHeaders([
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Content-Type' => $file->getClientMimeType(),
                'x-upsert' => 'true',
            ])->withBody($fileContent, $file->getClientMimeType())
            ->post($uploadUrl);

            Log::info('Upload Response:', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body' => $response->body()
            ]);

            if (!$response->successful()) {
                Log::error('Upload file ke Supabase gagal:', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers()
                ]);
                throw new \Exception('HTTP ' . $response->status() . ': ' . $response->body());
            }

            // Return public URL (format lama yang sesuai dengan controller Anda)
            $publicUrl = "{$this->url}/storage/v1/object/public/{$this->bucket}/{$path}";

            Log::info('File uploaded successfully:', ['url' => $publicUrl]);
            Log::info('=== UPLOAD FILE DEBUG END ===');

            return $publicUrl; // Return string URL seperti di project lama

        } catch (\Exception $e) {
            Log::error('=== UPLOAD FILE ERROR ===');
            Log::error('Exception saat upload file ke Supabase:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    public function deleteFile($filePath)
    {
        try {
            // Jika filePath adalah URL penuh, extract path-nya
            if (strpos($filePath, 'http') === 0) {
                $parsedUrl = parse_url($filePath);
                $pathParts = explode('/object/public/' . $this->bucket . '/', $parsedUrl['path']);
                $filePath = end($pathParts);
            }

            Log::info('Deleting file:', ['path' => $filePath]);

            $response = $this->storageClient->delete("/object/{$this->bucket}/{$filePath}");

            Log::info('Delete response:', ['status' => $response->getStatusCode()]);

            return $response->getStatusCode() === 200 || $response->getStatusCode() === 204;
        } catch (\Exception $e) {
            Log::error("Supabase deleteFile error: " . $e->getMessage());
            return false;
        }
    }

    public function saveSuratMasuk(array $data)
    {
        try {
            Log::info('Data mentah sebelum encoding:', $data);

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

            Log::info('Supabase save response:', [
                'status' => $response->getStatusCode(),
                'body' => $response->getBody()->getContents()
            ]);

            $result = json_decode($response->getBody(), true);
            return $result && count($result) > 0 ? $result[0] : false;
        } catch (\Exception $e) {
            Log::error("Supabase saveSuratMasuk error:", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
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
            Log::info('Update data:', $data);

            // Bersihkan encoding data agar valid UTF-8
            $encodedData = $this->cleanUtf8Recursive($data);

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
        try {
            $response = $this->client->post('/rest/v1/penduduk', [
                'json' => [$data],
                'headers' => [
                    'Prefer' => 'return=representation',
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            return $result && count($result) > 0;
        } catch (\Exception $e) {
            Log::error("Supabase savePenduduk error: " . $e->getMessage());
            return false;
        }
    }
}
