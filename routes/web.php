<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PendudukController;

// Beranda dan Tentang (Tanpa Login)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('tentang', 'tentang')->name('tentang');

// Semua route yang butuh login
Route::middleware(['auth'])->group(function () {
    
    // Surat Masuk (index dan store)
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
    Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');

    // Surat Keluar (full resource route: index, create, store, etc.)
    Route::resource('surat-keluar', SuratKeluarController::class);

    // Arsip (index)
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');

    // Penduduk (index)
    Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
});

// Tentang Desa Setro
Route::get('/tentang-desa-setro', function () {
    return view('tentang-desa-setro');
})->name('tentang-desa-setro');

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

require __DIR__.'/auth.php';