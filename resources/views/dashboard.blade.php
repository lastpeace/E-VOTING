    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('/Source') }}/evot.png">
        <title>Aplikasi Evoting</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    </head>
    <x-app-layout>
        <div class="py-2">
            <div class="mx-auto sm:px-4 lg:px-4 lg">
                <div class="h-full rounded-t-3xl bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>Welcome, {{ Auth::user()->name }}!</p>
                    </div>
                </div>

            </div>
        </div>
    </x-app-layout>
