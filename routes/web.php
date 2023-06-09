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
use App\Models\Vote;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return view('Welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        // Aksi untuk admin
        // $vote = Vote::all();
        $userAdmin = User::select(User::raw('COUNT(role) as total_admin'))->where('role', 'admin')->get();
        $userTotal = User::count();
        $voteTotal = Vote::count();
        $kandidat = Kandidat::all();
        return view('admin.dashboard', compact('kandidat', 'voteTotal', 'userTotal', 'userAdmin'));
    } elseif (Auth::user()->role === 'voter') {
        // Aksi untuk pengguna
        $data = Kandidat::paginate();
        return view('user.dashboard')->with('data', $data);
    } else {
        // Aksi jika peran tidak valid
        return redirect()
            ->back()
            ->with('error', 'Peran tidak valid');
    }
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::resource('/voter', VoterController::class);
Route::post('/updateVote', [VoterController::class, 'updateVote'])->name('updateVote');
Route::resource('/kelas', kelasController::class);
Route::resource('/kandidat', kandidatController::class);

Route::post('dashboard', [VoteController::class, 'store']);

Route::get('kelas/{id}/show', [kelasController::class, 'show'])->name('kelas.show');

require __DIR__ . '/auth.php';