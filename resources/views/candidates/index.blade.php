<!-- resources/views/candidates/index.blade.php -->

@extends('layouts.app2')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>
@section('content')
    <x-app-layout>
    @section('content')
        <h1 style="text-align: center">Daftar Calon</h1>

        <a href="{{ route('candidates.create') }}" class="btn btn-primary mb-2">Tambah Calon</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->position }}</td>
                        <td>{{ $candidate->description }}</td>
                        <td>
                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus calon ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>
@endsection
