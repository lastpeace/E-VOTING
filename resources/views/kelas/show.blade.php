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


    <title>E-Voting | VOTER</title>
</head>
@section('content')
    <div class="pt-2">

        <div class="mx-auto h-full bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('kelas.index') }}">Kelas</a> >
                <a href="{{ url('kelas/' . $kelas->id . '/show') }}">detail</a>
            </div>
            <div class="mx-auto pt-4 text-center text-4xl font-bold uppercase tracking-wider">
                <h1>Data Siswa</h1>
            </div>

            <!--Container-->
            <div class="container mx-auto">
                <div class="pl-8 py-5 flex">
                    <a class="bg-red-600 text-white p-2.5 rounded-full shadow-md hover:bg-red-700 text-sm font-semibold transition-all ease-in-out"
                        href="{{ route('kelas.index') }}">Kembali</a>
                </div>
                <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5">
                    {{-- table --}}
                    <div class="shadow-lg p-4 rounded-lg">

                        <table class="table-auto w-full text-center bg-slate-100 my-4">
                            <thead class="bg-white border-t-2 h-10 border-slate-950">
                                <tr class=" border-b border-slate-300">
                                    <th>No</th>
                                    <th>Nama Voter</th>
                                    <th>Email</th>
                                    <th>isVote</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $siswa->firstItem(); ?>
                                @foreach ($siswa as $index => $item)
                                    <tr class="bg-gray-100 border-b hover:bg-blue-100 h-16">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if ($item->isVote == 0)
                                            <td>Belum Voting</td>
                                        @else
                                            @if ($item->isVote == 1)
                                                <td>Sudah Voting</td>
                                            @endif
                                        @endif
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="py-2 border-black">
                        {!! $siswa->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
            <!--/container-->
        </div>
    </div>
@endsection
