<!-- resources/views/candidates/create.blade.php -->

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

@extends('layouts.app2')
@section('content')
    <x-app-layout>
        <h1>Tambah Calon</h1>

        <form class="table table-bordered table-striped" method="POST" action="{{ route('candidates.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required autofocus>
            </div>

            <div class="form-group">
                <label for="position">Posisi:</label>
                <input type="text" name="position" id="position" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </x-app-layout>
@endsection
