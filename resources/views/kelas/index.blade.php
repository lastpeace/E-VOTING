<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <a href='{{ url('kelas/create') }}'>Tambah Kelas</a>

   
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->nama_kelas}}</td>
                <td>
                    <a href="{{ url('kelas/'.$item->id.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('kelas/'.$item->id) }}" method="POST">
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