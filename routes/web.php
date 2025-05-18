<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AdminController;

// Ubah root '/' ke view welcome langsung
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'Role:admin'])->prefix('admin')->group(function () {
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::post('/user', [AdminController::class, 'storeUser'])->name('admin.user.store');
    Route::delete('/user/{id}', [AdminController::class, 'destroyUser'])->name('admin.user.destroy');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/tarif', [AdminController::class, 'tarif'])->name('admin.tarif');
    Route::put('/tarif/{id}', [AdminController::class, 'updateTarif'])->name('admin.tarif.update');
});


Route::middleware(['auth', 'Role:petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    Route::get('/masuk', [PetugasController::class, 'createMasuk'])->name('petugas.masuk');
    Route::post('/masuk', [PetugasController::class, 'storeMasuk']);
    Route::get('/keluar', [PetugasController::class, 'createKeluar'])->name('petugas.keluar');
    Route::post('/keluar/{id}', [PetugasController::class, 'storeKeluar']);
    Route::get('/petugas/struk/{id}', [PetugasController::class, 'struk'])->name('petugas.struk');
    Route::post('/petugas/struk/{id}/selesai', [PetugasController::class, 'selesaiBayar'])->name('petugas.selesaiBayar');

});
