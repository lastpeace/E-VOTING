<?php
namespace App\Http\Middleware;

use App\Http\Middleware\CekRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\kandidatController;
use App\Http\Controllers\VoterController;
use App\Models\Kandidat;
use App\Http\Controllers\Auth\RegisteredUserController;

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
//     return view('/user/dashboard')->with('data', $data);
// })->middleware(['auth', 'CekRole:voter'])->name('user.dashboard');

// Route::get('/dashboard', function () {
//     $data = Kandidat::paginate();
//     return view('/admin/dashboard')->with('data', $data);
// })->middleware(['auth', 'CekRole:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        // Aksi untuk admin
        $data = Kandidat::paginate();
        return view('admin.dashboard')->with('data', $data);
    } elseif (Auth::user()->role === 'voter') {
        // Aksi untuk pengguna
        $data = Kandidat::paginate();
        return view('user.dashboard')->with('data', $data);
    } else {
        // Aksi jika peran tidak valid
        return redirect()->back()->with('error', 'Peran tidak valid');
    }
})->middleware(['auth'])->name('dashboard');

// // Route untuk admin
// Route::middleware(['auth', 'CekRole:admin'])->group(function () {
//     Route::get('/admin/dashboard', [HomeController::class, 'indexAdmin'])->name('admin.dashboard');
//     // Tambahkan route lain untuk admin di sini
// });
Route::resource('/voter', VoterController::class);
Route::resource('/kelas', kelasController::class);
Route::resource('/kandidat', kandidatController::class);

// Route::post('registeradmin', [RegisteredUserController::class, 'create'])->name('registeradmin');

Route::get('kelas/{id}/show', [kelasController::class, 'show'])->name('kelas.show');


// Route::get('/register', [RegisteredUserController::class, 'create'])
//     ->middleware(['guest'])
//     ->name('register');  

// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware(['guest']);
require __DIR__ . '/auth.php';