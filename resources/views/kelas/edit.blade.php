<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ url('kelas') }}">Kembali</a>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action=" {{ url('kelas/'.$data->id) }} " method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kelas" value=" {{ $data->nama_kelas }} "></td>
                </tr>
                <tr>
                    <td><input type="submit" name="create" ></td>
                </tr>
            </table>
        </form>
</body>
</html>