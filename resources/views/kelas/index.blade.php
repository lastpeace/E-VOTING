@extends('layouts.admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <title>E-Voting | Kelas</title>
</head>
@section('content')
    <div class="pt-2">
        <div class="mx-auto h-full bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('kelas.index') }}">Kelas</a>
            </div>
            <div class="mx-auto pt-4 text-center text-4xl font-bold uppercase tracking-wider">
                <h1>data kelas</h1>
            </div>
            <!--Container-->
            <div class="container mx-auto">
                <div class="pl-8 py-5 flex">
                    <a class="bg-blue-600 text-white p-2.5 rounded-full shadow-md hover:bg-blue-700 text-sm font-semibold transition-all ease-in-out ml-3"
                        href="{{ url('kelas/create') }}">Tambah Kelas</a>
                </div>
                <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5">
                    {{-- table --}}
                    <div class="shadow-lg p-4 rounded-lg">

                        <table class="table-auto w-full text-center bg-slate-100 my-4">
                            <thead class="bg-white border-t-2 h-10 border-slate-950">
                                <tr class=" border-b border-slate-300">
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data->firstItem(); ?>
                                @foreach ($data as $item)
                                    <tr class="bg-gray-100 border-b hover:bg-blue-100">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->nama_kelas }}</td>
                                        <td>
                                            <div class="container flex p-2 w-3/4 mx-auto">
                                                <div class="m-auto p-2">
                                                    <a class=" text-white bg-blue-600 p-2 rounded-lg"
                                                        href="{{ url('kelas/' . $item->id . '/show') }}">Lihat Detail</a>
                                                </div>
                                                <div class="m-auto p-2">
                                                    <a class="fa-solid fa-pen text-white bg-orange-600 p-2 rounded-lg"
                                                        href="{{ url('kelas/' . $item->id . '/edit') }}"></a>
                                                </div>
                                                <div class="mx-auto p-2">
                                                    <form class="m-auto"
                                                        onsubmit="return confirm('Yakin akan menghapus data?')"action="{{ url('kelas/' . $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="m-auto fa-solid fa-trash bg-red-600 p-2 text-white rounded-lg"
                                                            type="submit" name="submit"></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="py-2 border-black">
                        {!! $data->withQueryString()->links() !!}
                    </div>
                </div>
                <!--/container-->
            </div>
        </div>
    </div>
@endsection
