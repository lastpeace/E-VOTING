@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Voter Dashboard</h1>
        <p>Welcome, {{ $user->name }}!</p>
        <!-- Tambahkan konten dasbor lainnya sesuai kebutuhan -->
    </div>
@endsection
