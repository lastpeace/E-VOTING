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


Route::get('/', [HomeController::class, 'index'])->name('');

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


use App\Http\Controllers\AuthController;

Route::get('/voter-login', [AuthController::class, 'showVoterLoginForm'])->name('voter.login.form');
Route::post('/voter-login', [AuthController::class, 'voterLogin'])->name('voter.login');
Route::get('/dashboard', [VoterController::class, 'dashboard'])->name('voter.dashboard');


Route::get('/admin-login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login.form');
Route::post('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.login');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
