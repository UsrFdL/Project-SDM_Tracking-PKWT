<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDataController;
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
// //     return view('home');
// // });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/input-data', [InputDataController::class, 'index'])->name('input-data');
Route::post('/input-data', [TempPkwtController::class, 'store']);



Route::resource('karyawan', KaryawanController::class);
