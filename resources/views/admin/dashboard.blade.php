@extends('layouts.admin')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/Source') }}/evot.png">
    <title>E-Voting | Admin</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
</head>
@section('content')
    <div class="pt-2">
        @if (count($kandidat))
            <div class="mx-auto h-auto bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="text-center text-4xl font-bold uppercase tracking-wider mx-10 ">
                    Statistik Vote Admin
                </div>
                <div class="flex flex-row mx-10 mt-4 font-semibold text-lg">
                    <div class="basis-1/2">
                        Total Vote
                    </div>
                    <div class="basis-1/2 text-end">
                        @php
                            $date = Carbon\Carbon::now('Asia/jakarta')->toDateString();
                            $newDate = Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
                            echo $newDate;
                        @endphp
                    </div>
                </div>
                <div class="mx-10 font-semibold text-xl">
                    @foreach ($userAdmin as $user)
                        {{ $voteTotal }}/{{ $userTotal - $user->total_admin }}
                    @endforeach
                </div>
                <div class="ml-4 px-6 mt-5">
                    <form class="w-auto" action="{{ route('updateVote') }}" method="post"
                        onsubmit="return confirm('Yakin akan mereset vote?')">
                        @csrf
                        <button
                            class="bg-red-600 text-white p-2.5 rounded-full shadow-md hover:bg-red-700 text-sm font-semibold transition-all ease-in-out"
                            type="submit">Reset Vote</button>
                    </form>
                </div>
                <div class="grid md:grid-cols-3 gap-5 md:gap-0 mx-16 mt-5 mb-20">
                    @foreach ($kandidat as $item)
                        <div class="mx-auto rounded-lg shadow-lg bg-white w-3/4">
                            <p class="uppercase text-center text-2xl font-semibold pt-5">
                                {{ $item->nama_kandidat }}
                            </p>
                            @if ($item->foto)
                                <img class="p-4 mx-auto w-[300px] h-[400px] object-cover"
                                    src="{{ url('foto') . '/' . $item->foto }}" alt="">
                            @endif
                            @php
                                $vote = App\Models\Vote::where('calon_id', $item->id_calon)->count();
                            @endphp
                            <p class="text-center mx-auto font-bold py-5 text-lg">Jumlah Vote :
                                {{ $vote }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white">
                    &nbsp;
                </div>
            @else
                <div class="mx-auto h-full bg-white rounded-t-[50px]">
                    <div class="ml-4 p-6 text-slate-400 text-sm">
                        <a href="{{ url('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="text-center text-4xl font-bold uppercase tracking-wider mx-10 ">
                        Statistik Vote Admin
                    </div>
                    <div class="flex flex-row mx-10 mt-4 font-semibold text-lg">
                        <div class="basis-1/2">
                            Total Vote
                        </div>
                        <div class="basis-1/2 text-end">
                            @php
                                $date = Carbon\Carbon::now('Asia/jakarta')->toDateString();
                                $newDate = Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
                                echo $newDate;
                            @endphp
                        </div>
                    </div>
                    <div class="mx-10 font-semibold text-xl">
                        @foreach ($userAdmin as $user)
                            {{ $voteTotal }}/{{ $userTotal - $user->total_admin }}
                        @endforeach
                    </div>
                    <div class="ml-4 px-6 mt-5">
                        <form class="w-auto" action="{{ route('updateVote') }}" method="post"
                            onsubmit="return confirm('Yakin akan mereset vote?')">
                            @csrf
                            <button
                                class="bg-red-600 text-white p-2.5 rounded-full shadow-md hover:bg-red-700 text-sm font-semibold transition-all ease-in-out"
                                type="submit">Reset Vote</button>
                        </form>
                    </div>
                    <div class="mx-20">
                        <div class="container  capitalize p-20 text-center text-xl  rounded-lg mx-auto shadow-lg">
                            Tidak ada data, tambah data kandidat <a
                                class="underline decoration-sky-500 text-sky-500 underline-offset-2 hover:decoration-sky-700 hover:text-sky-700"
                                href="{{ route('kandidat.index') }}">disini</a>
                        </div>
                    </div>
                    <div class="">
                        &nbsp;
                    </div>
        @endif
    </div>
    </div>
@endsection
