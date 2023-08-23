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
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/selesai', 'selesai')->name('selesai');
        Route::get('/akan-selesai', 'akanSelesai')->name('akan-selesai');
    });

    Route::get('/input-data', [InputDataController::class, 'index'])->name('input-data');
    Route::post('/input-data', [InputDataController::class, 'store']);

    Route::controller(DetailController::class)->group(function () {
        Route::get('/{nik}/detail', 'index')->name('detail');
        Route::post('/{nik}/detail/berhenti', 'berhenti')->name('detail.berhenti');
        Route::post('/{nik}/detail/edit', 'editDetail')->name('detail.edit');
    
        Route::get('/{nik}/detail/tambah-kontrak', 'tambahKontrak')->name('detail.tambah-kontrak');
        Route::post('/{nik}/detail/tambah-kontrak', 'storeKontrak');
        // Route::Post('/detail/{id}/tambah-kontrak', 'storeKontrak');
    });

    Route::controller(OrganisasiController::class)->group(function () {
        Route::get('/divisi', 'divisi')->name('divisi');
        Route::post('/divisi/tambah', 'tambahDivisi')->name('divisi.tambah');
        Route::post('/divisi/edit', 'editDivisi')->name('divisi.edit');
        Route::post('/divisi/hapus/', 'hapusDivisi')->name('divisi.hapus');
    
        Route::get('/departemen', 'departemen')->name('departemen');
        Route::post('/departemen/tambah', 'tambahDepartemen')->name('departemen.tambah');
        Route::post('/departemen/edit', 'editDepartemen')->name('departemen.edit');
        Route::post('/departemen/hapus/', 'hapusDepartemen')->name('departemen.hapus');

        Route::get('/bagian', 'bagian')->name('bagian');
        Route::post('/bagian/tambah', 'tambahBagian')->name('bagian.tambah');
        Route::post('/bagian/edit', 'editBagian')->name('bagian.edit');
        Route::post('/bagian/hapus/', 'hapusBagian')->name('bagian.hapus');
    });

    Route::get('/coba', function() {
        return view('coba');
    });
});
