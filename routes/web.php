<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan daftar pemilih
Route::get('/voters', [VoterController::class, 'index'])->name('voters.index');

// Rute untuk menampilkan formulir tambah pemilih
Route::get('/voters/create', [VoterController::class, 'create'])->name('voters.create');

// Rute untuk menyimpan data pemilih baru
Route::post('/voters', [VoterController::class, 'store'])->name('voters.store');

// Rute untuk menampilkan formulir edit pemilih
Route::get('/voters/{voter}/edit', [VoterController::class, 'edit'])->name('voters.edit');

// Rute untuk mengupdate data pemilih
Route::put('/voters/{voter}', [VoterController::class, 'update'])->name('voters.update');

// Rute untuk menghapus data pemilih
Route::delete('/voters/{voter}', [VoterController::class, 'destroy'])->name('voters.destroy');


