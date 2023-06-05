<!-- resources/views/welcome.blade.php -->

@extends('layouts.app2')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@section('content')
<div class="grid h-screen place-items-center">
    <div class="w-1/2 m-auto bg-white h-1/2 text-center rounded-lg shadow-2xl grid place-items-center" name="header">
        <div class="w-full font-sans">
            <h1 class="font-bold sm:text-2xl md:text-3xl lg:text-4xl xl:text-6xl">Website <span
                    class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">E-Voting</span>
                Untuk Tugas Pemrograman Web
                II</h1>
            <p class="mb-4 mt-4">Selamat Datang diwebsite E-VOTING</p>
            <div class="">
                <a class=" bg-slate-300 py-2 px-4 rounded-full shadow-md hover:bg-slate-950 hover:text-white hover:py-2.5 hover:px-8 hover:text-lg hover:shadow-xl transition-colors"
                    href="{{ route('login') }}" role="button">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection