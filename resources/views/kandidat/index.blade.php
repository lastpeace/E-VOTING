<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ url('dashboard') }}">Kembali</a>
   <a href='{{ url('kandidat/create') }}'>Tambah Kandidat</a>

   
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Kandidat</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->nama_kandidat}}</td>
                <td>{{$item->visi}}</td>
                <td>{{$item->misi}}</td>
                <td>
                    @if($item->foto)
                        <img style="max-width:50px;max-height:50px;"src="{{ url('foto').'/'.$item->foto }}" alt="">
                     @endif
                </td>
                <td>
                    <a href="{{ url('kandidat/'.$item->id_calon.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('kandidat/'.$item->id_calon) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++?>
            @endforeach
        </table>
   
</body>
</html>