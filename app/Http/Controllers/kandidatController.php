<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Support\Facades\File;

class kandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kandidat::paginate(2);
        return view('kandidat.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kandidat' => 'required',
                'foto' => 'mimes:jpg,png,jpeg|image|max:10000',
                'visi' => 'required',
                'misi' => 'required'
            ],
            [
                'nama_kandidat.required' => 'Nama Wajib diisi',
                'foto.required' => 'Foto wajib diisi',
                'visi.required' => 'Visi Wajib diisi',
                'misi.required' => 'Misi Wajib diisi'
            ]
        );
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);
        $data = [
            'nama_kandidat' => $request->nama_kandidat,
            'foto' => $foto_nama,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];
        Kandidat::create($data);
        return redirect()
            ->to('kandidat')
            ->with('success', 'Berhasil menambahkan kandidat');
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
        $data = Kandidat::where('id_calon', $id)->first();
        return view('kandidat.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kandidat' => 'required',
                'foto' => 'mimes:jpg,png,jpeg|image|max:10000',
                'visi' => 'required',
                'misi' => 'required'
            ],
            [
                'nama_kandidat.required' => 'Nama Wajib diisi',
                'foto.mimes' => 'Foto hanya boleh berekstensi jpg, png, jpeg dan berukuran <10mb',
                'visi.required' => 'visi Wajib diisi',
                'misi.required' => 'misi Wajib diisi'
            ]
        );

        $data = [
            'nama_kandidat' => $request->nama_kandidat,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg,png,jpeg|image|max:10000'
            ], [
                'foto.mimes' => 'Foto hanya boleh berekstensi jpg, png, jpeg dan berukuran <10mb'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = kandidat::where('id_calon', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            $data = [
                'foto' => $foto_nama,
            ];
        }

        Kandidat::where('id_calon', $id)->update($data);

        return redirect()->to('kandidat')->with('success', 'Berhasil melakukan update kandidat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = kandidat::where('id_calon', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        kandidat::where('id_calon', $id)->delete();
        return redirect()->to('kandidat')->with('success', 'Kandidat berhasil dihapus');
    }
}