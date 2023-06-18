<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = user::paginate();
        return view('voter.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelasList = Kelas::all();
        return view('voter.create')->with('kelas', $kelasList);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'email' => 'required',
    //             'password' => 'required'
    //         ],
    //         [
    //             'name.required' => 'Nama Wajib diisi',
    //             'email.required' => 'email wajib diisi',
    //             'password.required' => 'pass Wajib diisi',
    //         ]
    //     );

    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
    //     user::create($data);

    //     return redirect()->to('voter')->with('Berhasil menambahkan Voter');
    // }
    public function decrypt()
    {
        $decrypted = Crypt::decryptString('password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'kelas_id' => ['required', 'exists:' . Kelas::class . ',id'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->to('voter')->with('Berhasil menambahkan voter');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::where('id', $id)->first();
        return view('voter.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ],
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        user::where('id', $id)->update($data);

        return redirect()->to('voter')->with('Berhasil melakukan update user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = user::where('id', $id)->first();
        user::where('id', $id)->delete();
        return redirect()->to('voter')->with('Voter berhasil dihapus');
    }
}