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

    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>

    <title>E-Voting | Kandidat</title>
</head>
@section('content')
    <div class="pt-2">
        @if (count($data))
            <div class="mx-auto h-auto bg-white rounded-t-[50px]">
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


                        <!--Card-->
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 lg:w-full rounded shadow bg-white">

                            <table id="example" class="stripe hover"
                                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Nama Kandidat</th>
                                        <th data-priority="3">Visi</th>
                                        <th data-priority="4">Misi</th>
                                        <th data-priority="5">Foto</th>
                                        <th data-priority="6">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $data->firstItem(); ?>
                                    @foreach ($data as $item)
                                        <tr>
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
                                                            action="{{ url('kandidat/' . $item->id_calon) }}"
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
                        </div>
                        <!--/Card-->
                    </div>
                    <!--/container-->
                    <!-- jQuery -->
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                    <!--Datatables -->
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                    <script>
                        $(document).ready(function() {

                            var table = $('#example').DataTable({
                                    responsive: true
                                })
                                .columns.adjust()
                                .responsive.recalc();
                        });
                    </script>
                </div>
            </div>
        @else
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
                        <!--Card-->
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 lg:w-full rounded shadow bg-white">

                            <table id="example" class="stripe hover"
                                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th data-priority="1">No</th>
                                        <th data-priority="2">Nama Kandidat</th>
                                        <th data-priority="3">Visi</th>
                                        <th data-priority="4">Misi</th>
                                        <th data-priority="5">Foto</th>
                                        <th data-priority="6">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $data->firstItem(); ?>
                                    @foreach ($data as $item)
                                        <tr>
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
                                                            action="{{ url('kandidat/' . $item->id_calon) }}"
                                                            method='POST'>
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
                        </div>
                        <!--/Card-->
                    </div>
                    <!--/container-->
                    <!-- jQuery -->
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                    <!--Datatables -->
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                    <script>
                        $(document).ready(function() {

                            var table = $('#example').DataTable({
                                    responsive: true
                                })
                                .columns.adjust()
                                .responsive.recalc();
                        });
                    </script>
                </div>
            </div>
        @endif
    </div>
@endsection
