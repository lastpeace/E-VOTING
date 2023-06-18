{{-- <x-guest-layout>
    <form method="POST" action="{{ route('voter.store') }}">
        @csrf @method('POST')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="kelas_id" :value="__('Kelas')" />
            <select id="kelas_id" name="kelas_id" class="block mt-1 w-full">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.admin')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <!-- Insert the blade containing the TinyMCE configuration and source script -->
    <x-head.tinymce-config />
    <title>E-Voting | Voter</title>
</head>

<body>
    @section('content')
        <div class="pt-2">
            <div class="mx-auto h-screen bg-white rounded-t-[50px]">
                <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                    <a href="{{ route('dashboard') }}">Dashboard</a> >
                    <a href="{{ route('voter.index') }}">Voter</a> >
                    <a href="{{ url('voter.create') }}">Create</a>
                </div>
                <div class="my-10 text-center text-4xl uppercase font-bold tracking-wider">
                    Tambah Data User
                </div>
                @if ($errors->any())
                    <div class="bg-red-200 text-red-600 text-sm mx-auto w-3/4 p-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container mx-auto">
                    <div class="p-8">
                        <form action=" {{ route('voter.store') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label class="block font-medium text-md" for="name">Nama Voter</label>
                                    <input class="placeholder:italic rounded-full h-10 w-full" type="text" name="name"
                                        placeholder="Masukkan Nama">
                                </div>
                                <div>
                                    <label class="block font-medium text-md" for="email">Email</label>
                                    <input class="placeholder:italic rounded-full h-10 w-full" type="email" name="email"
                                        placeholder="Masukkan Email Voter">
                                </div>
                                <div>
                                    <label class="block font-medium text-md" for="password">Password</label>
                                    <input class="placeholder:italic rounded-full h-10 w-full" type="password"
                                        name="password" placeholder="Masukkan Password">
                                </div>
                                <div>
                                    <label class="block font-medium text-md" for="name">Kelas</label>
                                    <select id="kelas_id" name="kelas_id" class="w-full rounded-full">
                                        <option value=""> -- Pilih Kelas -- </option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                            </div>
                            <div class="text-end mt-10">
                                <a
                                    class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"href="{{ route('voter.index') }}">Back</a>
                                <input
                                    class="bg-green-500 text-white p-2.5 rounded-full shadow-md hover:bg-green-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                                    type="submit" name="create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
