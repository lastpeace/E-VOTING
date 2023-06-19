@extends('layouts.user')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/Source') }}/evot.png">
    <title>E-Voting | Home</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
</head>
@section('content')
    <div class="pt-2">
        @if (Auth::user()->isVote == 0)
            <div class="mx-auto h-auto bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="ml-4 px-6 text-xl font-semibold tracking-wider">
                    Selamat Datang, {{ Auth::user()->name }}
                </div>
                <div class="mx-10 my-20">
                    <form action=" {{ url('/dashboard') }}" method="POST">
                        @csrf
                        <div class="mx-auto">
                            <ul class="grid grid-cols-1 xl:ml-24 gap-3 md:grid-cols-3">

                                <?php $i = $data->firstItem(); ?>
                                @foreach ($data as $item)
                                    <li class="mx-8 sm:mx-28 md:mx-auto xl:mx-0">
                                        <input type="radio" id="{{ $item->nama_kandidat }}" name="id_calon"
                                            value="{{ $item->id_calon }}" class="hidden peer" required>
                                        <label for="{{ $item->nama_kandidat }}"
                                            class="inline-flex items-center justify-between p-5 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 shadow-lg">
                                            <div class="">
                                                <div class="text-lg font-semibold text-center mb-2">
                                                    {{ $item->nama_kandidat }}
                                                </div>
                                                <div class="">
                                                    @if ($item->foto)
                                                        <img class="mx-auto w-[300px]"
                                                            src="{{ url('foto') . '/' . $item->foto }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                        </label>
                                        <div class="mt-2 ml-2">
                                            <p class="font-semibold">Visi</p>
                                        </div>
                                        <hr class="w-3/4 py-2 mt-2 ml-2 border-black">
                                        <div class="ml-2">
                                            <p>{!! $item->visi !!}</p>
                                        </div>
                                        <div class="mt-2 ml-2">
                                            <p class="font-semibold">Misi</p>
                                        </div>
                                        <hr class="w-3/4 py-2 mt-2 ml-2 border-black">
                                        <div class="ml-2">
                                            <p>{!! $item->misi !!}</p>
                                        </div>
                                    </li>
                                    <?php $i++; ?>
                                @endforeach
                            </ul>
                            <input type="hidden" name="id_user" value=" {{ Auth::user()->id }}">
                            <div class="my-4 grid sm:grid-cols-3">
                                <div class="">
                                </div>
                                <button
                                    class="bg-blue-500 p-3 rounded-full text-white font-semibold hover:bg-blue-600 hover:shadow-lg transition-all md:col-end-3">Vote</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="bg-white">
                &nbsp;
            </div>
    </div>
@else
    <div class="mx-auto h-full  bg-white rounded-t-[50px]">
        <div class="ml-4 p-6 text-slate-400 text-sm">
            <a href="{{ url('dashboard') }}">Dashboard</a>
        </div>
        <div class="ml-4 px-6 text-xl font-semibold tracking-wider">
            Selamat Datang, {{ Auth::user()->name }}
        </div>
        <div
            class="bg-green-300 rounded-lg mx-60 shadow-lg px-10 py-52 text-center my-14 text-6xl font-bold uppercase text-green-800">
            <h1>Terimakasih Sudah Voting</h1>
        </div>
    </div>
    @endif
    </div>

@endsection
