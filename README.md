# 💌 SI-PEDES — Sistem Persuratan Elektronik Desa Setro
<img width="1920" height="932" alt="Screenshot (1615)" src="https://github.com/user-attachments/assets/eaa5e600-da9b-41ca-9101-e5b33da22d30" />



> **SI-PEDES** (Sistem Persuratan Elektronik Desa Setro) adalah aplikasi berbasis web yang dikembangkan untuk mengelola proses administrasi surat-menyurat secara digital di tingkat desa.  
> Aplikasi ini dibangun menggunakan **Laravel 11** dan **Tailwind CSS**, dengan tujuan memudahkan perangkat desa dalam pencatatan, pengarsipan, dan pencarian surat secara efisien dan terstruktur.

---

## 🚀 Daftar Isi
- [Fitur Utama](##-fitur-utama)
- [Teknologi yang Digunakan](##-teknologi-yang-digunakan)
- [Struktur Proyek](#-struktur-proyek)
- [Instalasi dan Konfigurasi](#-instalasi-dan-konfigurasi)
- [Struktur Database](#-struktur-database)
- [Alur Sistem](#-alur-sistem)
- [Panduan Penggunaan](#-panduan-penggunaan)
- [Kontributor dan Pengembang](#-kontributor-dan-pengembang)
- [Lisensi](#-lisensi)

---

## 🌟 Fitur Utama

| Modul | Deskripsi |
|-------|------------|
| **Surat Masuk** | Pencatatan surat masuk beserta informasi kode surat, pengirim, tanggal, dan perihal. Dapat diunggah dalam bentuk file PDF. |
| **Surat Keluar** | Pencatatan dan pengarsipan surat keluar, dilengkapi dengan nomor surat otomatis dan sistem kode arsip. |
| **Arsip Surat** | Sistem penyimpanan dan pencarian arsip berdasarkan kategori, tanggal, atau kode surat. |
| **Data Penduduk** | Integrasi data penduduk untuk kebutuhan surat keterangan, pengantar, dan administrasi lainnya. |
| **Pencarian Cepat** | Fitur pencarian real-time berbasis AJAX untuk menemukan surat atau arsip dengan cepat. |
| **Manajemen Pengguna** | Pengaturan akun admin dan operator desa, lengkap dengan otentikasi Laravel Breeze. |
| **Dashboard Statistik** | Tampilan visual data surat masuk/keluar per bulan menggunakan chart interaktif. |
| **Desain Responsif** | Dibangun menggunakan Tailwind CSS untuk tampilan yang ringan dan adaptif di berbagai perangkat. |

---

## 🧩 Teknologi yang Digunakan

| Kategori | Teknologi |
|-----------|------------|
| **Backend Framework** | [Laravel 11](https://laravel.com/) |
| **Frontend Framework** | [Tailwind CSS](https://tailwindcss.com/) |
| **Autentikasi** | Laravel Breeze |
| **Database** | MySQL / MariaDB |
| **Template Engine** | Blade |
| **JavaScript Library** | Alpine.js & AJAX |
| **Chart Visualization** | Chart.js / ApexCharts |
| **Version Control** | Git & GitHub |

---

## ⚙️ Instalasi dan Konfigurasi

### 1️⃣ Persyaratan Sistem
Pastikan sudah terinstal:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL / MariaDB
- Git

### 2️⃣ Clone Repository
git clone https://github.com/username/sipedes.git
cd sipedes

### 3️⃣ Instal Dependensi
```
composer install
npm install
npm run dev
```

### 4️⃣ Konfigurasi Environment
```
cp .env.example .env
php artisan key:generate
```

Edit bagian database:
```
DB_DATABASE=sipedes_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Migrasi dan Seeder
```
php artisan migrate --seed
```

### 6️⃣ Jalankan Server
```
php artisan serve
```

🔄 Alur Sistem

1. Admin login → masuk ke dashboard.
2. Tambah surat masuk/keluar → isi form lengkap + upload file (PDF).
3. Sistem menyimpan data ke database dan menautkan ke arsip.
4. Operator dapat mencari surat berdasarkan kata kunci.
5. Dashboard menampilkan statistik surat masuk dan keluar per periode.

🧭 Panduan Penggunaan
- 👤 Login
```
Email: admin@sipedes.local
Password: password
```

📬 Surat Masuk
- Klik menu Surat Masuk → Tambah Data
- Isi form lengkap (kode surat, pengirim, perihal, tanggal, lampiran)
- Klik Simpan

📤 Surat Keluar
- Klik Surat Keluar → Tambah Surat
- Pilih Kode Arsip - Keperluan
- Sistem otomatis memisahkan kode & keperluan saat penyimpanan

🔍 Arsip & Pencarian
- Gunakan kolom pencarian untuk mencari berdasarkan kata kunci, kode surat, atau tanggal
- Arsip tersimpan otomatis setiap ada surat masuk/keluar

👨‍💻 Kontributor dan Pengembang

Project Owner & Lead Developer:
🧑‍💼 Tegar Eka Pambudi El Akhsan

🪪 Lisensi

Proyek ini dilisensikan di bawah MIT License
.
Silakan gunakan, modifikasi, dan distribusikan dengan tetap mencantumkan atribusi pengembang asli.


PREVIEW

<img width="1920" height="932" alt="Screenshot (1615)" src="https://github.com/user-attachments/assets/45af0cf2-8571-4ef4-9f7c-2181d271ac8d" />

<img width="1920" height="925" alt="Screenshot (1617)" src="https://github.com/user-attachments/assets/6e6d2ea9-7a06-4673-bf26-471ee77effea" />

<img width="1920" height="925" alt="Screenshot (1622)" src="https://github.com/user-attachments/assets/6fadecae-1699-494f-a393-e97b808f3c6c" />
