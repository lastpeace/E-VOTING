<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/19f53fb20b.js" crossorigin="anonymous"></script>
    <title>E-Voting | Kelas</title>
</head>
<x-app-layout>
    <div class="pt-2 h-full">
        <div class="mx-auto h-full bg-white rounded-t-[50px]">
            <div class="ml-4 pl-6 pt-6 text-slate-400 text-sm">
                <a href="{{ route('dashboard') }}">Dashboard</a> >
                <a href="{{ route('kelas.index') }}">Kelas</a>  
            </div>
            <div class="container mx-auto">
                <div class="p-8">
                    <a class="bg-blue-600 text-white p-2.5 rounded-full shadow-md hover:bg-blue-700 text-sm font-semibold transition-all ease-in-out"
                        href="{{ url('kelas/create') }}">Tambah Kelas</a>
                </div>
                <div class="mx-auto sm:w-full">
                    <table class="mx-auto table-auto border border-collapse w-3/4" >
                        <tr>
                            <th class="border">No</th>
                            <th class="border">Nama Kelas</th>
                            <th class="border w-1/3 sm:w-1/4 md:w-1/5 lg:w-1/6">Aksi</th>
                        </tr>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td class="border text-center">{{$i}}</td>
                            <td class="borde text-center">{{$item->nama_kelas}}</td>
                            <td class="border">
                                    <div class="container flex p-2 w-3/4 mx-auto">
                                        <div class="m-auto">
                                            <a class="fa-solid fa-pen text-white bg-orange-600 p-2 rounded-lg" href="{{ url('kelas/'.$item->id.'/edit') }}"></a>
                                        </div>
                                        <div class="mx-auto">
                                            <form class="m-auto" onsubmit="return confirm('Yakin akan menghapus data?')"
                                                action="{{ url('kelas/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="m-auto fa-solid fa-trash bg-red-600 p-2 text-white rounded-lg" type="submit" name="submit"></button>
                                            </form>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                        <?php $i++?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>