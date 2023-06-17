@extends('layouts.admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <title>E-Voting | voter</title>
</head>
@section('content')
    <div class="pt-2 h-auto sm">
        <div class="mx-auto h-auto sm bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('voter.index') }}">Voter</a> >
                <a href="{{ url('voter/' . $data->id . '/edit') }}">Edit</a>
            </div>
            <div class="container mx-auto">
                <div class="p-8">
                    <form action=" {{ url('voter/' . $data->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block font-medium text-md" for="name">Nama voter</label>
                            <input class="placeholder:italic rounded-full h-7 w-full" type="text" name="name"
                                placeholder="Masukkan voter" value=" {{ $data->name }} ">
                        </div>
                        <div>
                            <label class="block font-medium text-md" for="email">email</label>
                            <input class="rounded-[30px] w-full placeholder:italic" name="email" id="email"
                                type="email" cols="30" rows="10"
                                placeholder="Masukkan email">{{ $data->email }}
                        </div>
                        <div>
                            <label class="block font-medium text-md" for="password">password</label>
                            <input class="rounded-[30px] w-full placeholder:italic" name="password" id="password"
                                type="password" cols="30" rows="10"
                                placeholder="Masukkan password">{{ $data->password }}
                        </div>
                        @if ($errors->any())
                            <div class="text-red-500 text-sm">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="text-end mt-1">
                            <a class="bg-red-500 text-white py-2.5 px-4 rounded-full shadow-md hover:bg-red-600 text-sm font-semibold transition-all ease-in-out cursor-pointer mt-1"
                                href="{{ route('voter.index') }}">Back</a>
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
