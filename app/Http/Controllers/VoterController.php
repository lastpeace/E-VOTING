<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class VoterController extends Controller
{
    /**
     * Display a listing of the voters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = Voter::all();

        return view('voters.index', compact('voters'));
    }

    /**
     * Show the form for creating a new voter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voters.create');
    }

    /**
     * Store a newly created voter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:voters',
        ]);

        Voter::create($request->all());

        return redirect()->route('voters.index')->with('success', 'Voter created successfully.');
    }

    /**
     * Show the form for editing the specified voter.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        return view('voters.edit', compact('voter'));
    }

    /**
     * Update the specified voter in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:voters,nim,' . $voter->id,
        ]);

        $voter->update($request->all());

        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }

    /**
     * Remove the specified voter from storage.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        $voter->delete();

        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }

    public function dashboard()
{
    // Ambil data pengguna yang sedang login
    $user = auth()->user();

    // Tampilkan halaman dasbor pengguna Voter
    return view('voter.dashboard', compact('user'));
}
    

}
