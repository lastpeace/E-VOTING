@extends('layouts.user')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/Source') }}/evot.png">
    <title>E-Voting | Home</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
</head>
@section('content')
    @if (Auth::user()->isVote == 0)
        <div class="pt-2">
            <div class="mx-auto h-full bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="ml-4 px-6 text-xl font-semibold tracking-wider">
                    Selamat Datang, {{ Auth::user()->name }}
                </div>
                <div class="flex flex-row mx-10 mt-4 font-semibold justify-center">
                    <div>
                        <h1 class=" text-4xl uppercase">Pemira 2023</h1>
                    </div>
                </div>
                <div class="mx-10 font-semibold text-xl">
                    10/100
                </div>
                <div class="container mx-auto px-6 py-5 sm:flex sm:gap-7 w-full">
                    <form action=" {{ url('/dashboard') }}" method="POST">
                        @csrf
                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">How much do you expect to use
                            each month?</h3>
                        <ul class="grid w-full gap-6 md:grid-cols-2">

                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <li>
                                    <input type="radio" id="{{ $item->nama_kandidat }}" name="id_calon"
                                        value="{{ $item->id_calon }}" class="hidden peer" required>
                                    <label for="{{ $item->nama_kandidat }}"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="div">
                                                @if ($item->foto)
                                                    <img class="mx-auto w-[300px]"
                                                        src="{{ url('foto') . '/' . $item->foto }}" alt="">
                                                @endif
                                            </div>
                                            <div class="w-full text-lg font-semibold">{{ $item->nama_kandidat }}</div>
                                            <div class="w-full"></div>
                                        </div>
                                    </label>
                                </li>
                                <?php $i++; ?>
                            @endforeach
                        </ul>
                        <input type="hidden" name="id_user" value=" {{ Auth::user()->id }}">
                        <button>Submit</button>
                    </form>

                </div>
            </div>
        </div>
    @else
        Anda sudah Voting
    @endif
@endsection
