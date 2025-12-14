<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login/Register Akun</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/logo.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-jakarta_sans text-gray-900 antialiased bg-[#f6f6f8]">
    <div class="h-screen flex flex-col justify-center items-center px-4">
        <div class="flex items-end justify-between w-full sm:max-w-md">
            <a href="/" class="ms-4 hover:underline text-md md:text-lg lg:text-xl flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-90deg-left w-5 h-5" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                </svg>
                Kembali
            </a>
            <img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="" class="w-20 h-20">
        </div>

        <div class="w-full sm:max-w-md mt-6 px-5 md:px-6 py-4 border border-black/10 overflow-hidden rounded-xl bg-[#fff]">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
