@extends('layouts.user')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/Source') }}/evot.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <style>
        .tinymce-container ul {
            list-style-type: disc;
            /* Add other styling as needed */
        }

        .tinymce-container ol {
            list-style-type: decimal;
            /* Add other styling as needed */
        }
    </style>
    <title>E-Voting | Home</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->
</head>
@section('content')
    <div class="pt-2">
        @if (Auth::user()->isVote == 0)
            <div class="mx-auto h-auto bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="ml-4 px-6 text-xl font-semibold tracking-wider">
                    Selamat Datang, {{ Auth::user()->name }}
                </div>
                @if (Session::has('success'))
                    <div class="mx-20">
                        <div class="container bg-green-200 px-2 py-1 mt-2 rounded-lg text-justify">
                            <div class="m-5 text-green-600 font-semibold">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mx-10 my-20">
                    <form action=" {{ url('/dashboard') }}" method="POST">
                        @csrf
                        <div class="mx-auto grid md:grid-cols-3">
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <div class="mx-auto">

                                    <input type="radio" id="{{ $item->nama_kandidat }}" name="id_calon"
                                        value="{{ $item->id_calon }}" class="hidden peer" required>
                                    <label for="{{ $item->nama_kandidat }}"
                                        class="inline-flex items-center justify-between p-5 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 shadow-lg">
                                        <div class="">
                                            <div class="text-lg font-semibold text-center mb-2">
                                                {{ $item->nama_kandidat }}
                                            </div>
                                            <div class="">
                                                @if ($item->foto)
                                                    <img class="mx-auto w-[300px] h-[400px] object-cover"
                                                        src="{{ url('foto') . '/' . $item->foto }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </label>

                                    <div class="my-2 shadow-lg max-w-[342px]" id="accordion-collapse"
                                        data-accordion="collapse">
                                        <h2 id="accordion-collapse-heading-1">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-2 focus:ring-gray-200 hover:bg-gray-100"
                                                data-accordion-target="#accordion-collapse-body-{{ $item->id_calon }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-collapse-body-{{ $item->id_calon }}">
                                                <span>Visi</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{ $item->id_calon }}" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-1">
                                            <div class="p-5 border border-b-0 border-gray-200 tinymce-container mb-2">
                                                <div class="mx-5 text-justify">
                                                    {!! $item->visi !!}
                                                </div>
                                            </div>
                                        </div>
                                        <h2 id="accordion-collapse-heading-2">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-2 focus:ring-gray-200 hover:bg-gray-100"
                                                data-accordion-target="#accordion-collapse-body-{{ $item->nama_kandidat }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-collapse-body-{{ $item->nama_kandidat }}">
                                                <span>Misi</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{ $item->nama_kandidat }}" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-2">
                                            <div class="p-5 border border-b-0 border-gray-200 d tinymce-container mb-2">
                                                <div class="mx-5 text-justify">
                                                    {!! $item->misi !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                </div>
                            @endforeach
                            <input type="hidden" name="id_user" value=" {{ Auth::user()->id }}">
                            <div></div>
                        </div>
                        <div class="my-4 w-1/2 mx-auto">
                            <button
                                class="bg-blue-500 p-3 rounded-full text-white font-semibold hover:bg-blue-600 hover:shadow-lg transition-all md:col-end-3 w-full">Vote</button>
                        </div>
                    </form>
                </div>
                <div class="bg-white">
                    &nbsp;
                </div>
            </div>
        @else
            <div class="mx-auto h-auto  bg-white rounded-t-[50px]">
                <div class="ml-4 p-6 text-slate-400 text-sm">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </div>
                <div class="ml-4 px-6 text-xl font-semibold tracking-wider">
                    Selamat Datang, {{ Auth::user()->name }}
                </div>
                <div class="mx-10">
                    <div
                        class="bg-green-200 rounded-lg mx-auto shadow-lg text-center font-bold uppercase text-green-600 mt-5 p-8 container">
                        <h1>Terimakasih, Anda Sudah Melakukan Voting</h1>

                    </div>
                </div>
                <div class="mx-10 my-5">
                    <form action=" {{ url('/dashboard') }}" method="POST">
                        @csrf
                        <div class="mx-auto grid md:grid-cols-3">
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <div class="mx-auto">

                                    <input type="radio" id="{{ $item->nama_kandidat }}" name="id_calon"
                                        value="{{ $item->id_calon }}" class="hidden peer" disabled>
                                    <label for="{{ $item->nama_kandidat }}"
                                        class="inline-flex items-center justify-between p-5 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 shadow-lg">
                                        <div class="">
                                            <div class="text-lg font-semibold text-center mb-2">
                                                {{ $item->nama_kandidat }}
                                            </div>
                                            <div class="">
                                                @if ($item->foto)
                                                    <img class="mx-auto w-[300px] h-[400px] object-cover"
                                                        src="{{ url('foto') . '/' . $item->foto }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </label>

                                    <div class="my-2 shadow-lg max-w-[342px]" id="accordion-collapse"
                                        data-accordion="collapse">
                                        <h2 id="accordion-collapse-heading-1">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-2 focus:ring-gray-200 hover:bg-gray-100"
                                                data-accordion-target="#accordion-collapse-body-{{ $item->id_calon }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-collapse-body-{{ $item->id_calon }}">
                                                <span>Visi</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{ $item->id_calon }}" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-1">
                                            <div class="p-5 border border-b-0 border-gray-200 tinymce-container mb-2">
                                                <div class="mx-5 text-justify">
                                                    {!! $item->visi !!}
                                                </div>
                                            </div>
                                        </div>
                                        <h2 id="accordion-collapse-heading-2">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-2 focus:ring-gray-200 hover:bg-gray-100"
                                                data-accordion-target="#accordion-collapse-body-{{ $item->nama_kandidat }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-collapse-body-{{ $item->nama_kandidat }}">
                                                <span>Misi</span>
                                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{ $item->nama_kandidat }}" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-2">
                                            <div class="p-5 border border-b-0 border-gray-200 d tinymce-container mb-2">
                                                <div class="mx-5 text-justify">
                                                    {!! $item->misi !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                </div>
                            @endforeach
                            <input type="hidden" name="id_user" value=" {{ Auth::user()->id }}">
                            <div></div>
                            <div class="my-4 w-full">
                                <button
                                    class="bg-red-500 p-3 rounded-full text-white font-semibold hover:bg-red-600 hover:shadow-lg transition-all md:col-end-3 w-full cursor-pointer hidden"
                                    disabled>Anda Sudah Voting</button>
                            </div>
                    </form>
                </div>
                <div class="bg-white">
                    &nbsp;
                </div>
            </div>
        @endif
    </div>

@endsection
