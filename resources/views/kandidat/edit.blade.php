<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ url('kandidat') }}">Kembali</a>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action=" {{ url('kandidat/'.$data->id_calon) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>Nama Kandidat</td>
                    <td>:</td>
                    <td><input type="text" name="nama_kandidat" value=" {{ $data->nama_kandidat }} "></td>
                </tr>
                <tr>
                    <td>
                    @if ($data->foto)
                        <img style="max-height: 50px; max-width:50px;" src="{{ url('foto').'/'.$data->foto }}" alt="">
                    @endif
                </td>
                    <td>Upload foto</td>
                    <td><input type="file" name="foto" id="foto" accept="image/*"></td>
                </tr>
                <tr>
                    <td>Visi</td>
                    <td>:</td>
                    <td><textarea name="visi" id="" cols="30" rows="10" > {{ $data->visi }} "</textarea></td>
                </tr>
                <tr>
                    <td>Misi</td>
                    <td>:</td>
                    <td><textarea name="misi" id="" cols="30" rows="10"> {{ $data->misi }}"</textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="create" ></td>
                </tr>
            </table>
        </form>
</body>
</html>