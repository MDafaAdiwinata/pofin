<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pofin Deposito Bank</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.svg') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-jakarta_sans h-[2000px]">

    {{-- navbar --}}
    <x-navbar></x-navbar>

    {{-- Hero Section --}}
    <section class="bg-[#F6F6F8] bg-center bg-no-repeat bg-cover flex justify-center">
        <div class="px-4 mx-auto container py-32 lg:py-48 flex flex-col">
            <h1 class="text-[#1a1a1a] font-bold text-start text-2xl md:text-3xl lg:text-4xl">
                Jelajahi Bank Mitra Kami
            </h1>

            <form class="flex items-center w-full mt-4 md:mt-8">
                <label for="search" class="sr-only">
                    Search
                </label>
                <input type="text" id="search" name="q"
                    class="bg-[#fff] border border-black/10 text-[#1a1a1a] text-md rounded-xl md:rounded-2xl block w-full py-2 md:py-3 px-3 md:px-4"
                    placeholder="Cari Bank..." required />
                <button type="submit"
                    class="p-3 ms-2 text-sm md:text-md font-medium text-[#fff] bg-[#1a1a1a]/80 rounded-2xl">
                    <svg class="w-5 md:w-6 h-5 md:h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 items-center justify-center mt-10 mx-auto">

                {{-- Card Bank --}}
                @forelse ($banks as $bank)
                    <div
                        class="bg-[#fff] cursor-pointer hover:bg-[#fff]/50 transition duration-300 hover:-translate-y-4 block w-fit p-4 md:p-6 border border-black/10 rounded-xl md:rounded-2xl">
                        <a href="#">
                            <img class="rounded-base" src="{{ asset('storage/bank/' . $bank->gambar) }}"
                                alt="" />
                        </a>
                        <a href="#">
                            <h5 class="mt-6 mb-2 text-lg md:text-2xl font-bold">
                                {{ $bank->nama_bank }}
                            </h5>
                        </a>
                        <p class="font-light text-md md:text-lg">
                            {{ $bank->deskripsi }}
                        </p>
                    </div>

                @empty
                    <p class="text-center text-lg font-light col-span-full py-2">
                        Tidak ada bank yang tersedia saat ini.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Cta Daftar --}}
    <x-cta-daftar></x-cta-daftar>

    {{-- Footer --}}
    <x-footer></x-footer>

</body>

</html>
