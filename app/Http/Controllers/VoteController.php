<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\User;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'id_calon' => 'required',
                'id_user' => 'required',
            ],
            [
                'id_calon.require' => 'Silahkan Pilih Calon!!!',
            ],
        );
        $data = [
            'calon_id' => $request->id_calon,
        ];
        Vote::create($data);

        User::where('id', $request->id_user)->update(['isVote' => 1]);
        return redirect()
            ->to('dashboard')
            ->with('success', 'Terimakasih Telah Melakukan Voting');
    }
}