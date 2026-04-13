<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// dashboard default 
Route::get('/dashboard', function () {
    return redirect('/siswa/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD SISWA
    Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])
        ->name('siswa.dashboard');
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show']);
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit']);
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);

    // PENGADUAN (RESOURCE)
    Route::resource('pengaduan', PengaduanController::class);

    // KATEGORI
    Route::resource('kategori', KategoriController::class);

    // DASHBOARD ADMIN 
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/pengaduan', [PengaduanController::class, 'indexAdmin']);
    Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'show']);
    Route::resource('siswa', \App\Http\Controllers\SiswaController::class)
    ->middleware('auth');
});

require __DIR__.'/auth.php';