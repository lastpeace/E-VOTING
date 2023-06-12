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
            @if(count($data))
            <div class="mx-auto h-auto bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="text-center text-4xl font-bold uppercase tracking-wider">
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
                    10/100
                </div>
                <div class="container mx-auto px-6 py-5 sm:flex sm:gap-7 w-full">
                    <?php $i = $data->firstItem(); ?>
                    @foreach ($data as $item)
                    <div class="mx-auto rounded-lg shadow-lg my-5 bg-white">
                        <p class="uppercase text-center text-2xl font-semibold py-5">{{ $item->nama_kandidat }}
                        </p>
                        @if ($item->foto)
                        <img class="mx-auto w-[300px]" src="{{ url('foto') . '/' . $item->foto }}" alt="">
                        @endif
                        <p class="text-center mx-auto font-bold py-5 text-lg">Jumlah Vote : 1</p>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                    
                </div>
            </div>
            @else
            <div class="mx-auto h-full bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="text-center text-4xl font-bold uppercase tracking-wider">
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
                    10/100
                </div>
                <div class="container mx-auto px-6 py-5 sm:flex sm:gap-7 w-full">
                    <div class="mx-auto my-5 text-center font-bold uppercase text-5xl text-white bg-red-600 hover:bg-red-700 shadow-lg p-5 rounded-lg cursor-default">
                        !! DATA KOSONG !! 
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endsection