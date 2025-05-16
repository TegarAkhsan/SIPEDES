<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PendudukController;
// use App\Http\Controllers\FilesController;

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Surat Masuk dan Surat Keluar resource route (otomatis mencakup index, create, store, dll)
Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
Route::resource('surat-keluar', SuratKeluarController::class);

// Arsip (hanya index)
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');

// Data Penduduk (hanya index)
Route::get('penduduk', [PendudukController::class, 'index'])->name('penduduk.index');

// Halaman tentang desa
Route::view('tentang', 'tentang')->name('tentang');

// Route::get('files', [FilesController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';