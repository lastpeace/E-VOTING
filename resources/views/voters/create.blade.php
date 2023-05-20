<!-- resources/views/voters/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Pemilih</h1>

    <form action="{{ route('voters.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
