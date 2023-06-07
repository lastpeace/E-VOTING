<!-- resources/views/welcome.blade.php -->

@extends('layouts.app2')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@section('content')
<div class="grid h-screen place-items-center">
    <div class="w-3/4 my-1/2 bg-white h-1/2 text-center rounded-lg shadow-2xl flex items-center justify-center" name="header">
        <div class="w-full font-sans px-8">
            <h1 class="font-bold text-3xl sm:text-4xl md:text-6xl lg:text-6xl xl:text-6xl">Website <span
                    class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">E-Voting</span>
                Untuk Tugas Pemrograman Web
                II</h1>
            <p class="mb-2 mt-2">Selamat Datang di Website E-VOTING</p>
            <div class="p-2">
                <a class="bg-slate-300 py-2 px-4 rounded-full shadow-md hover:bg-slate-950 hover:text-white hover:px-6 hover:py-2.5 hover:shadow-xl hover:font-bold transition-all"
                    href="{{ route('login') }}" role="button">
                    {{ __('Login') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection