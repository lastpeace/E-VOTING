<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();

        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);

        Candidate::create($validatedData);

        return redirect()->route('candidates.index')->with('success', 'Calon berhasil ditambahkan.');
    }

    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);

        $candidate->update($validatedData);

        return redirect()->route('candidates.index')->with('success', 'Calon berhasil diperbarui.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Calon berhasil dihapus.');
    }
}