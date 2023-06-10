<?php
namespace App\Http\Middleware;

use App\Http\Middleware\CekRole;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\kandidatController;
use App\Models\Kandidat;

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

Route::get('/', function () {
    return view('Welcome');
});

// Route::get('/dashboard', function () {
//     $data = Kandidat::paginate();
//     return view('dashboard')->with('data', $data);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route untuk pengguna (user)
Route::middleware(['auth', 'CekRole:voter'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'indexUser'])->name('user.dashboard');
    // Tambahkan route lain untuk pengguna di sini
});

// Route untuk admin
Route::middleware(['auth', 'CekRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'indexAdmin'])->name('admin.dashboard');
    // Tambahkan route lain untuk admin di sini
});

Route::resource('/kelas', kelasController::class);
Route::resource('/kandidat', kandidatController::class);

require __DIR__ . '/auth.php';