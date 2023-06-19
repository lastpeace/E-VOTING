@extends('layouts.admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <title>E-Voting | Kandidat</title>
</head>
@section('content')
    <div class="pt-2">
        <div class="mx-auto h-full bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('kandidat.index') }}">Candidate</a>
            </div>
            <div class="mx-auto pt-4 text-center text-4xl font-bold uppercase tracking-wider">
                <h1>data kandidat</h1>
            </div>
            <div class="container mx-auto">
                <div class="p-8">
                    <a class="bg-blue-600 text-white p-2.5 rounded-full shadow-md hover:bg-blue-700 text-sm font-semibold transition-all ease-in-out"
                        href="{{ url('kandidat/create') }}">Tambah Kandidat</a>
                </div>
                <!--Container-->
                <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5">
                    {{-- table --}}
                    <div class="shadow-lg p-4 rounded-lg">

                        <table class="table-fixed w-full text-center bg-slate-100 my-4">
                            <thead class="bg-white border-t-2 h-10 border-slate-950">
                                <tr class=" border-b border-slate-300">
                                    <th>No</th>
                                    <th>Nama Kandidat</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data->firstItem(); ?>
                                @foreach ($data as $item)
                                    <tr class="bg-gray-100 border-b hover:bg-blue-100">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->nama_kandidat }}</td>
                                        <td>{!! $item->visi !!}</td>
                                        <td>{!! $item->misi !!}</td>
                                        <td>
                                            @if ($item->foto)
                                                <img class="w-100 h-100" src="{{ url('foto') . '/' . $item->foto }}"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="container flex p-2 w-3/4 mx-auto">
                                                <div class="m-auto p-2">
                                                    <a class="fa-solid fa-pen text-white bg-orange-600 p-2 rounded-lg"
                                                        href="{{ url('kandidat/' . $item->id_calon . '/edit') }}"></a>
                                                </div>
                                                <div class="mx-auto p-2">
                                                    <form class="m-auto"
                                                        onsubmit="return confirm('Yakin akan menghapus data?')"
                                                        action="{{ url('kandidat/' . $item->id_calon) }}" method="POST">
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
                    <!--/Card-->
                </div>

            </div>
            <!--/container-->
        </div>
    </div>

    </div>
@endsection
