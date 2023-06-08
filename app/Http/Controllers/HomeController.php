<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user = '1') {
            return redirect('indexadmin');
        }
    }
    public function indexUser()
    {
        return view('indexUser');
    }
    public function indexAdmin()
    {
        return view('indexAdmin');
    }

}