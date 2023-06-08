<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.page');
        } else {
            return redirect()->route('user.page');
        }
    }

}