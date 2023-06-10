<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexUser()
    {
        $data = User::paginate();
        return view('user.dashboard')->with('data', $data);
    }


    public function indexAdmin()
    {
        $data = User::paginate();
        return view('admin.dashboard')->with('data', $data);
    }
}