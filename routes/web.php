<?php

use App\Http\Controllers\TempPkwtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

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
// //     return view('dashboard');
// // });

Route::get('/', [TempPkwtController::class, 'home'])->name('dashboard');
Route::get('/tambah-data', [TempPkwtController::class, 'tambahData'])->name('tambah-data');
Route::post('/tambah-data', [TempPkwtController::class, 'store']);



Route::resource('karyawan', KaryawanController::class);
