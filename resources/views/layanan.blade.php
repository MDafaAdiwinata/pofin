<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pofin Deposito Layanan</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/logo.svg') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-jakarta_sans h-[2000px]">

    {{-- navbar --}}
    <x-navbar></x-navbar>

    {{-- Jumbotron Layanan --}}
    <section class="bg-center bg-no-repeat h-[720px] flex items-center justify-center" style="background-image: url('/img/bg-banner-layanan.png')">
        <div class="px-6 mx-auto container flex flex-col items-center justify-center py-24 lg:py-42">
            <h1 class="text-white font-bold text-3xl lg:text-5xl xl:text-6xl w-2/3 text-center mb-6">
                Layanan Kami
            </h1>
        </div>
    </section>

    {{-- Card --}}
    <section class="flex items-center justify-center text-center" id="section-diskon">
        <div class="container px-6 mx-auto">
            {{-- Card Why Choose --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8">

                {{-- Card 1 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-check-fill w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Simulasi Deposito
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Hitung estimasi bunga dan total nilai deposito secara cepat dan akurat.
                    </div>
                </div>

                {{-- Card 2 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-check-fill w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Informasi Terpercaya
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Akses data ringkas mengenai bank - bank mitra yang tersedia di Pofin.
                    </div>
                </div>

                {{-- Card 3 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-check-fill w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Keamanan Terjamin
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Seluruh data pengguna diproses  dan disimpan dengan standar  keamanan tinggi.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cta Daftar --}}
    <x-cta-daftar></x-cta-daftar>

    {{-- Footer --}}
    <x-footer></x-footer>

    <script>
        // Script Bg transparant/ada
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector("nav");

            if (window.scrollY > 0) {
                navbar.classList.add("bg-[#f5f5f5]/80");
                navbar.classList.remove("bg-transparent");
            } else {
                navbar.classList.remove("bg-[#f5f5f5]/80");
                navbar.classList.add("bg-transparent");
            }
        });
    </script>

</body>

</html>
