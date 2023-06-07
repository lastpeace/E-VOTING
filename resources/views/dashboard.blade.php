    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('/Source') }}/evot.png">
        <title>Aplikasi Evoting</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    </head>
    <x-app-layout>
        <div class="pt-2">
            <div class="mx-auto">
                <div class="h-full rounded-t-[50px] bg-white overflow-hidden shadow-sm">
                    <div class="ml-4 p-6 text-slate-400 text-sm">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="text-center text-4xl font-bold uppercase tracking-wider">
                        Statistik Vote
                    </div>
                    <div class="flex flex-row mx-10 mt-4 font-semibold text-lg">
                        <div class="basis-1/2">
                            Total Vote
                        </div>
                        <div class="basis-1/2 text-end">
                            @php
                            $date = Carbon\Carbon::now('Asia/jakarta')->toDateString();
                            $newDate = Carbon\Carbon::createFromFormat('Y-m-d', $date)
                            ->format('m/d/Y');
                            echo $newDate;
                            @endphp
                        </div>
                    </div>
                    <div class="mx-10 font-semibold text-xl">
                        10/100
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>