@extends('layouts.admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <title>E-Voting | Kelas</title>
</head>
@section('content')
    <div class="pt-2 h-full">
        <div class="mx-auto h-full bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('kelas.index') }}">Kelas</a> >
                <a href="{{ url('kelas.create') }}">Create</a>
            </div>
            <div class="container mx-auto">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="bg-red-200 text-red-600 text-sm mx-auto w-3/4 p-4 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action=" {{ url('kelas') }} " method="POST">
                        @csrf
                        <div>
                            <label class="block font-medium text-md" for="kelas">Kelas</label>
                            <input class="rounded-full h-7 w-full" type="text" name="kelas"
                                value=" {{ Session::get('nama_kelas') }}" placeholder="Masukkan Kelas">
                        </div>
                        <div class="text-end mt-1">
                            <a class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                                href="{{ route('kelas.index') }}">Back</a>
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
