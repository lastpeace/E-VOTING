<!-- resources/views/voters/index.blade.php -->
<head>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
@extends('layouts.app')

@section('content')
    <h1>Daftar Pemilih</h1>

    <a href="{{ route('voters.create') }}" class="btn btn-primary mb-3">Tambah Pemilih</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Status Pemilihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voters as $voter)
                <tr>
                    <td>{{ $voter->id }}</td>
                    <td>{{ $voter->name }}</td>
                    <td>{{ $voter->nim }}</td>
                    <td>{{ $voter->has_voted ? 'Sudah Memilih' : 'Belum Memilih' }}</td>
                    <td>
                        <a href="{{ route('voters.edit', $voter->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('voters.destroy', $voter->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus pemilih ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
