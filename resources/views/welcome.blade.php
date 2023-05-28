<!-- resources/views/welcome.blade.php -->

@extends('layouts.app2')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content')
    <div class="jumbotron" name="header" style="text-align: center;">
        <h1>Website Voting Untuk Tugas Pemweb2</h1>
        <p>Selamat Datang diwebsite E-VOTING</p>
        <p>
            <button class="button-54"><a class="btn btn-primary btn-lg" style="color: black; " href="{{ route('login') }}"
                    role="button">Login</a></button>
            {{-- <button class="button-54"><a class="btn btn-success btn-lg" style="color: black; "
                        href="{{ route('login') }}" role="button">Daftar</a></button> --}}
        </p>
        </form>
    </div>
@endsection

<!-- HTML !-->
<style>
    .button-54 {
        font-family: "Open Sans", sans-serif;
        font-size: 16px;
        letter-spacing: 2px;
        text-decoration: none;
        text-transform: uppercase;
        color: #000;
        cursor: pointer;
        border: 3px solid;
        padding: 0.25em 0.5em;
        box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
        position: relative;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-54:active {
        box-shadow: 0px 0px 0px 0px;
        top: 5px;
        left: 5px;
    }

    @media (min-width: 768px) {
        .button-54 {
            padding: 0.25em 0.75em;
        }
    }

    /* public/css/welcome.css */
    body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
    }

    .container {
        align-content: center;
        height: 100%;
        max-width: 800px;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
        display: flex;

    }

    .jumbotron {
        background-color: grey;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .jumbotron h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: black;
    }

    .jumbotron p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: black;
    }
</style>
