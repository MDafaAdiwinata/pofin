<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pofin Deposito Tentang</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.svg') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-jakarta_sans bg-[#fff] h-[2000px]">

    {{-- navbar --}}
    <x-navbar></x-navbar>

    {{-- Hero Section --}}
    <section style="background-image: url('/img/bg-hero-about.png')"
        class="bg-center bg-no-repeat h-screen bg-cover flex items-center justify-center">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-6 text-3xl font-bold text-[#202020] md:text-5xl lg:text-6xl">
                Transparansi Deposito <br> untuk Semua, Bersama Pofin
            </h1>
            <p class="my-6 mb-8 font-normal text-[#000000]/60 text-md md:text-lg lg:text-xl sm:px-16 lg:px-48">
                Pofin adalah platform yang membantu Anda membandingkan deposito bank dan melihat simulasi hasilnya
                dengan cepat dan jelas, sehingga memudahkan Anda mengambil keputusan finansial yang lebih tepat.
            </p>
            <div class="flex flex-col sm:flex-row sm:justify-center sm:space-y-0">
                <a href=""
                    class="inline-flex justify-center bg-[#E0FC6A] hover:bg-red-400 hover:text-white items-center shadow-sm py-2 md:py-2.5 px-4 md:px-5 sm:ms-4 text-md md:text-lg font-medium text-center text-[#1a1a1a] rounded-xl md:rounded-2xl transition duration-300 border border-black/10">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>


    {{-- Vision and Mision --}}
    <section class="bg-[#F3F3F6] flex items-center justify-center py-24 text-center" id="section-diskon">
        <div class="container px-6 mx-auto">
            <h1 class="text-[#1a1a1a] font-bold text-2xl md:text-3xl lg:text-4xl">
                Visi dan Misi Kami
            </h1>

            {{-- Card Vision and Mision --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 mt-12 md:mt-16">

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
                        Visi Kami
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Menjadi platform perbandingan deposito paling terpercaya dan
                        mudah diakses, yang membantu masyarakat merencanakan keuangan dengan lebih bijak dan terarah.
                    </div>
                </div>

                {{-- Card 2 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-all w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Misi Kami
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Misi Pofin adalah menyediakan platform simulasi deposito yang sederhana, akurat, dan transparan
                        untuk membantu pengguna membuat keputusan finansial dengan lebih percaya diri.
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
