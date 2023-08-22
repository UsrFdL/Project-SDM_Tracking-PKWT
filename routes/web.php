<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\TempPkwtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\OrganisasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// // Route::get('/', function () {
// //     return view('home');
// // });
Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/selesai', [HomeController::class, 'selesai'])->name('selesai');
    Route::get('/akan-selesai', [HomeController::class, 'akanSelesai'])->name('akan-selesai');

    Route::get('/input-data', [InputDataController::class, 'index'])->name('input-data');
    Route::post('/input-data', [InputDataController::class, 'store']);

    Route::get('/{nik}/detail', [DetailController::class, 'index'])->name('detail');
    Route::post('/{nik}/detail/berhenti', [DetailController::class, 'berhenti'])->name('detail.berhenti');
    Route::post('/{nik}/detail/edit', [DetailController::class, 'editDetail'])->name('detail.edit');

    Route::get('/{nik}/detail/tambah-kontrak', [DetailController::class, 'tambahKontrak'])->name('detail.tambah-kontrak');
    Route::post('/{nik}/detail/tambah-kontrak', [DetailController::class, 'storeKontrak']);
    // Route::Post('/detail/{id}/tambah-kontrak', [DetailController::class, 'storeKontrak']);

    Route::get('/divisi', [OrganisasiController::class, 'divisi'])->name('divisi');
    Route::post('/divisi/hapus/', [OrganisasiController::class, 'hapusDivisi'])->name('divisi.hapus');
    Route::post('/divisi/edit', [OrganisasiController::class, 'editDivisi'])->name('divisi.edit');
    Route::post('/divisi/tambah', [OrganisasiController::class, 'tambahDivisi'])->name('divisi.tambah');

    Route::get('/departemen', [OrganisasiController::class, 'departemen'])->name('departemen');
    Route::get('/bagian', [OrganisasiController::class, 'bagian'])->name('bagian');
});
