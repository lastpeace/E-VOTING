<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-VOTING</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-cyan-500 to-blue-500">
    <div class="min-h-screen">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>