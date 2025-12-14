<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pofin Deposito Kontak</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/logo.svg') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-jakarta_sans h-[2000px]">

    {{-- navbar --}}
    <x-navbar></x-navbar>

    {{-- Hero  --}}
    <section class="bg-center bg-no-repeat bg-[#F6F6F8] bg-cover flex flex-col">
        <div class="px-4 mx-auto container text-center py-32 lg:py-40">
            <h1 class="mb-2 md:mb-6 text-3xl font-bold text-[#202020] md:text-4xl lg:text-5xl">
                Hubungi Kami
            </h1>
            <p class="font-normal text-[#000000]/60 text-md md:text-lg lg:text-xl xl:text-2xl sm:px-16 lg:px-48">
                Tim Pofin siap membantu Anda kapan saja. Jangan ragu untuk menghubungi kami melalui formulir, email,
                atau media sosial yang tersedia.
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-16">
                <!-- Informasi Kontak -->
                <div class="bg-[#fff] rounded-2xl p-6 md:p-8 border border-black/10">
                    <h2 class="text-lg md:text-xl lg:text-2xl text-start font-semibold text-[#1a1a1a]">
                        Informasi kontak
                    </h2>

                    <div class="mt-10 text-start space-y-8 md:space-y-16 md:ms-6">

                        <!-- Step 1 -->
                        <div class="flex flex-col md:flex-row items-start gap-4">
                            <div
                                class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope-fill w-6 md:w-8 h-6 md:h-8"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                                    Email
                                </h3>
                                <p class="text-[#1a1a1a]/80 text-md md:text-lg lg:text-xl mt-1">
                                    pofin@gmail.com
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col md:flex-row items-start gap-4">
                            <div
                                class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-telephone-fill w-6 md:w-8 h-6 md:h-8"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                                    Telepon
                                </h3>
                                <p
                                    class="text-[#1a1a1a]/80 text-md md:text-lg lg:text-xl mt-1 hover:underline cursor-pointer">
                                    +6257 6554 4476
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col md:flex-row items-start gap-4">
                            <div
                                class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-geo-alt-fill w-6 md:w-8 h-6 md:h-8"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                                    Lokasi
                                </h3>
                                <p class="text-[#1a1a1a]/80 text-md md:text-lg lg:text-xl mt-1">
                                    Sawah Baru, Kec. Ciputat, <br> Kota Tangerang Selatan, Banten 15412
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 border border-gray-200">

                    <h2 class="text-lg md:text-xl lg:text-2xl text-start font-semibold text-[#1a1a1a]">
                        Kirimkan Pesan kepada Kami
                    </h2>

                    <form action="#" method="POST" class="mt-10 space-y-5">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <input type="text" placeholder="Nama Lengkap"
                                class="w-full px-3 py-2.5 border border-black/20 rounded-xl md:rounded-2xl focus:outline-none">
                            <input type="email" placeholder="Email"
                                class="w-full px-3 py-2.5 border border-black/20 rounded-xl md:rounded-2xl focus:outline-none">
                        </div>

                        <input type="text" placeholder="Subjek"
                            class="w-full px-3 py-2.5 border border-black/20 rounded-xl md:rounded-2xl focus:outline-none">

                        <textarea rows="6" placeholder="Pesan Anda"
                            class="w-full px-4 py-3 border border-black/20 rounded-xl md:rounded-2xl resize-none focus:outline-none"></textarea>

                        <button type="submit"
                            class="w-full bg-[#3f4c3c] hover:bg-[#2f3a2d] text-white font-semibold py-3 rounded-2xl transition duration-300 hover:scale-95">
                            Kirim
                        </button>
                    </form>
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
