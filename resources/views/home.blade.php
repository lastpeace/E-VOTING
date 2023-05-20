<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>SELAMAT DATANG SEMUANYA</h1>
        <p>Silahkan lakukan vote dengan jujur dan tertib</p>
        <a href="{{ route('voters.index') }}" class="btn btn-primary">VOTERS</a>
    </div>
@endsection
