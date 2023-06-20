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
    <!-- ini buat select2 -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                                    <label class="block font-medium text-md mb-2" for="name">Kelas</label>
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
    <script>
        $(document).ready(function() {
            $('#kelas_id').select2();
        });
    </script>
</body>

</html>
