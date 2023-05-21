<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Voter;

class AuthController extends Controller
{
    public function showVoterLoginForm()
    {
        return view('auth.voter-login');
    }

    public function voterLogin(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Cek jika pengguna adalah voter
        if (Auth::user()->role == 'voter') {
            return redirect()->intended('/voter-dashboard');
        }
    }

    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => 'Invalid credentials',
    ]);
}

    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('voter.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('voter.login')->with('success', 'You have been logged out.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:voters',
            'password' => 'required|confirmed',
        ]);

        $voter = new Voter();
        $voter->name = $request->input('name');
        $voter->nim = $request->input('nim');
        $voter->email = $request->input('email');
        $voter->password = Hash::make($request->input('password'));
        $voter->save();

        return redirect('/')->with('success', 'Registration successful. Please login.');
    }



}



?>
