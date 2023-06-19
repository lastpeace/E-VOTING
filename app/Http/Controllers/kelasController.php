<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kelas;
use App\Models\User;

class kelasController extends Controller
{

    public function index()
    {
        $data = kelas::paginate(5);
        return view('kelas.index')->with('data', $data);
    }


    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_kelas', $request->kelas);

        $request->validate(
            [
                'kelas' => 'required|unique:kelas,nama_kelas'

            ],
            [
                'kelas.required' => 'Kelas Wajib diisi',
                'kelas.unique' => 'Nama Kelas sudah ada'
            ]
        );
        $data = [
            'nama_kelas' => $request->kelas
        ];
        Kelas::create($data);

        return redirect()->to('kelas')->with('Berhasil menambahkan kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = User::where('kelas_id', $id)->paginate(5);
        return view('kelas.show', compact('kelas', 'siswa'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = kelas::where('id', $id)->first();
        return view('kelas.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Session::flash('nama_kelas', $request->kelas);
        $request->validate(
            [
                'kelas' => 'required|unique:kelas,nama_kelas'

            ],
            [
                'kelas.required' => 'Kelas Wajib diisi',
                'kelas.unique' => 'Nama Kelas sudah ada'
            ]
        );
        $data = [
            'nama_kelas' => $request->kelas
        ];
        Kelas::where('id', $id)->update($data);

        return redirect()->to('kelas')->with('Berhasil melakukan update kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kelas::where('id', $id)->delete();
        return redirect()->to('kelas')->with('Kelas berhasil dihapus');
    }
}