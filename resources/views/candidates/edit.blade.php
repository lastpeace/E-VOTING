<!-- resources/views/candidates/edit.blade.php -->

@extends('layouts.app2')

@section('content')
    <h1>Edit Calon</h1>

    <form action="{{ route('candidates.update', $candidate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $candidate->name }}">
        </div>

        <div class="form-group">
            <label for="position">Posisi</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ $candidate->position }}">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control">{{ $candidate->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
