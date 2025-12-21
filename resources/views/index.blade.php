<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pofin Deposito</title>

    {{-- Website Logo --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.svg') }}" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-jakarta_sans bg-[#fff] h-[2000px]">

    {{-- navbar --}}
    <x-navbar></x-navbar>

    <section class="w-full bg-[#F8FAF9] flex h-screen items-center justify-center">
        <div class="max-w-screen-2xl mx-auto px-6 flex flex-col lg:flex-row items-center justify-between gap-10">

            <!-- LEFT TEXT CONTENT -->
            <div class="w-full lg:w-1/2">
                <div class="w-auto inline-flex items-center p-1 pe-2 mb-4 text-sm rounded-full bg-[#2F6B52]/10 border border-[#2F6B52]/40"
                    role="alert">
                    <div
                        class="bg-[#2F6B52]/15 font-semibold p-2 md:px-3 md:py-1 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-info-circle md:hidden w-5 h-5" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                        <span class="hidden md:block">Update</span>
                    </div>
                    <div class="ms-2 text-sm">
                        Pofin melakukan perbaikan bug pada beberapa fitur.
                        <button data-modal-target="modal-update" data-modal-toggle="modal-update" href="#"
                            class="font-medium underline hover:no-underline">
                            Cek Selengkapnya
                        </button>
                    </div>
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg>
                </div>
                <!-- Judul Besar -->
                <h1 class="text-4xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold leading-12 text-[#1a1a1a]">
                    Rencanakan <span class="text-[#2F6B52]">Deposito</span>
                </h1>
                <h1
                    class="my-2 md:my-4 text-4xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold leading-12 text-[#1a1a1a]">
                    Anda <span class="text-[#B04A33]">dengan</span> Cerdas
                </h1>
                <h1 class="text-4xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold leading-12 text-[#1a1a1a]">
                    dan Akurat
                </h1>

                <!-- Sub Text -->
                <p class="text-[#404040] text-md md:text-lg lg:text-xl xl:text-2xl font-light leading-relaxed my-6">
                    Pofin adalah platform simulasi deposito bank terdepan yang membantu Anda
                    membandingkan dan memilih produk deposito terbaik untuk tujuan keuangan Anda.
                </p>

                <!-- Buttons -->
                <div class="flex items-center gap-4 md:gap-6 mt-6 md:mt-10">
                    <a href="/register"
                        class="bg-[#034739] hover:bg-red-700 text-[#F6F6F8] text-start hover:shadow text-sm md:text-lg font-semibold px-4 md:px-6 py-2 md:py-2.5 rounded-xl md:rounded-2xl hover:bg-[#034739]/90 hover:scale-95 transition duration-500 animate-wiggle-scale">
                        Mulai Deposito
                    </a>

                    <a href="#cara_kerja" class="font-normal text-[#1a1a1a] hover:underline text-sm md:text-lg">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="w-full lg:w-1/2 justify-end hidden lg:flex">
                <img src="{{ asset('img/img-jumbotron-landing.png') }}" alt="Ilustrasi Grafik" class="object-contain" />
            </div>

        </div>
    </section>

    {{-- Modal Update --}}
    <x-modal-update></x-modal-update>

    {{-- Why Choose --}}
    <section class="bg-[#F3F3F6] flex items-center justify-center py-20 text-center" id="section-diskon">
        <div class="container px-6 mx-auto">
            <h1 class="text-[#1a1a1a] font-bold text-2xl md:text-3xl lg:text-4xl">
                Mengapa Memilih Pofin?
            </h1>
            <p class="text-[#1a1a1a]/60 text-md md:text-2xl lg:text-2xl mt-4 w-full md:w-1/2 mx-auto">
                Kami menyediakan alat berbasis data akurat untuk
                membantu keputusan finansial Anda.
            </p>

            {{-- Card Why Choose --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8 mt-16">

                {{-- Card 1 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-check-circle w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Akurat dan Terkini
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Dapatkan data suku bunga deposito
                        terbaru dari berbagai bank terkemuka
                        di Indonesia
                    </div>
                </div>

                {{-- Card 2 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left-right w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Perbandingan Mudah
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Bandingkan hasil simulasi dari beberapa
                        produk deposito secara berdampingan
                        dalam satu layar.
                    </div>
                </div>

                {{-- Card 3 --}}
                <div
                    class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-6 md:px-8 py-6 text-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-shield-shaded w-8 md:w-10 h-8 md:h-10 text-[#00683E] mb-4 md:mb-6 mt-2"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                    </svg>
                    <h1 class="my-2 md:my-1.5 font-bold text-lg md:text-xl lg:text-2xl text-[#00683E]">
                        Aman dan Terpercaya
                    </h1>
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Platform kami dirancang dengan standar
                        keamanan tinggi untuk melindungi data Anda
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagaimana cara kerjanya - Section --}}
    <section class="py-20" id="cara_kerja">
        <div class="container mx-auto px-8">
            <h1 class="text-[#1a1a1a] font-bold text-2xl md:text-3xl lg:text-4xl text-center">
                Bagaimana Cara Kerjanya?
            </h1>
            <div class="mt-10 md:mt-16 grid grid-cols-1 lg:grid-cols-2 items-center justify-center gap-6">
                <img src="{{ asset('img/img-cara-kerja.png') }}" class="hidden lg:block w-full lg:w-[600px] "
                    alt="Image Help">
                <div class="space-y-16">

                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row items-start gap-4">
                        <div
                            class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-bank w-6 md:w-8 h-6 md:h-8" viewBox="0 0 16 16">
                                <path
                                    d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">Pilih Bank</h3>
                            <p class="text-[#1a1a1a]/80 text-md md:text-lg mt-1">
                                Pilih bank dan produk deposito yang Anda minati dari daftar mitra kami.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row items-start gap-4">
                        <div
                            class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-file-earmark-medical w-6 md:w-8 h-6 md:h-8" viewBox="0 0 16 16">
                                <path
                                    d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                                Isi Detail Deposito
                            </h3>
                            <p class="text-[#1a1a1a]/80 text-md md:text-lg mt-1">
                                Masukkan Jumlah dana, tenor, dan informasi
                                lain yang diperlukan untuk simulasi.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row items-start gap-4">
                        <div
                            class="w-12 md:w-14 h-12 md:h-14 bg-[#008C6F]/20 rounded-xl flex items-center justify-center text-[#034739]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-activity w-6 md:w-8 h-6 md:h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                                Lihat Hasil Deposito
                            </h3>
                            <p class="text-[#1a1a1a]/80 text-md md:text-lg mt-1">
                                Dapatkan proyeksi bunga dan keuntungan
                                secara instan dan bandingkan hasilnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni Section --}}
    <section class="bg-[#F3F3F6] flex items-center justify-center py-20 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-center text-2xl md:text-3xl font-bold text-[#1a1a1a]">
                Apa Kata Mereka?
            </h1>
            <div class="mt-14 grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">
                <!-- CARD 1 (PUTIH) -->
                <div
                    class="bg-[#1a1a1a] rounded-2xl md:rounded-3xl p-6 md:p-8 border border-black/20 flex flex-col h-full">
                    <p class="text-[#ccc] text-md md:text-lg text-start leading-relaxed flex-grow">
                        “Saya suka dengan platform Pofin, karena memudahkan saya
                        dalam membandingkan presentase bunga antar bank!. Semoga
                        semakin berkembang untuk Pofin!. salam Investasi”
                    </p>

                    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-3 pt-8">
                        <img src="{{ asset('img/pelanggan-1.png') }}" alt=""
                            class="w-10 md:w-12 rounded-full">
                        <span class="font-semibold text-lg md:text-xl text-[#F6F6F8]">
                            Alba Maps
                        </span>
                    </div>
                </div>


                <!-- CARD 2 -->
                <div class="bg-[#F6F6F8] border border-black/20 rounded-3xl p-6 md:p-8 flex flex-col h-full">
                    <p class="text-[#1a1a1a]/80 text-start text-md md:text-lg leading-relaxed flex-grow">
                        “Pofin benar-benar membantu saya memahami perbandingan bunga tanpa ribet. Tampilannya
                        sederhana,
                        datanya jelas, dan prosesnya cepat. Semoga Pofin terus berinovasi ke depannya!”
                    </p>

                    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-3 pt-8">
                        <img src="{{ asset('img/pelanggan-2.png') }}" alt=""
                            class="w-10 md:w-12 rounded-full">
                        <span class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                            Darell IEM
                        </span>
                    </div>
                </div>
            </div>

            <div
                class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] xl:grid-cols-[2fr_0.5fr] gap-4 justify-center mt-6 lg:mt-10">
                <div class="bg-[#F6F6F8] border border-black/20 rounded-3xl p-6 md:p-8 flex flex-col h-full">
                    <p class="text-[#000]/80 text-md md:text-lg text-start leading-relaxed flex-grow">
                        “Sebagai pemula yang baru belajar mengatur keuangan, Pofin sangat membantu saya membandingkan
                        bunga dari berbagai bank dengan cepat dan jelas. Informasinya lengkap dan mudah dipahami, jadi
                        saya lebih percaya diri memilih produk keuangan yang tepat. Semoga Pofin terus berkembang dan
                        menghadirkan fitur baru yang bermanfaat!”
                    </p>

                    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-3 pt-8">
                        <img src="{{ asset('img/pelanggan-3.png') }}" alt=""
                            class="w-10 md:w-12 rounded-full">
                        <span class="font-semibold text-lg md:text-xl text-[#1a1a1a]">
                            Oppa Nabil
                        </span>
                    </div>
                </div>
                <div class="w-full mx-auto flex items-center justify-center text-center">
                    <img src="{{ asset('img/img-rating.png') }}" class="hidden lg:block"
                        alt="Image Rating - Section REVIEW">
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-20">
        <div class="container mx-auto px-8">
            <h1 class="text-center text-2xl md:text-3xl font-bold text-[#1a1a1a]">
                Frequently Asked Questions
            </h1>
            <div class="w-full md:w-5/6 lg:w-2/3 mx-auto mt-14 md:mt-20">
                {{-- Accordion --}}
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-[#1a1a1a]"
                    data-inactive-classes="text-gray-500 dark:text-gray-400" class="space-y-6">

                    {{-- Item Accordion 1 --}}
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-[#1a1a1a]/50 border-b border-black/50 gap-3"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <span class="text-[#1a1a1a] text-lg md:text-xl">
                                Apa itu Pofin?
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-bla">
                            <p class="mb-2 text-md md:text-lg text-[#1a1a1a]/80">
                                Pofin adalah platform informasi keuangan
                                yang membantu pengguna memantau dan
                                membandingkan data suku bunga secara
                                praktis dan terpercaya.
                            </p>
                        </div>
                    </div>

                    {{-- Item Accordion 2 --}}
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-[#1a1a1a]/50 border-b border-black/50 gap-3"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span class="text-[#1a1a1a] text-lg md:text-xl">
                                Apakah layanan Pofin Berbayar?
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-280 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-bla">
                            <p class="mb-2 text-md md:text-lg text-[#1a1a1a]/80">
                                Tidak, seluruh layanan utama Pofin dapat
                                digunakan secara gratis.
                            </p>
                        </div>
                    </div>

                    {{-- Item Accordion 3 --}}
                    <h2 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-[#1a1a1a]/50 border-b border-black/50 gap-3"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span class="text-[#1a1a1a] text-lg md:text-xl">
                                Seberapa Akurat data Suku Bunga Pofin?
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-380 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-bla">
                            <p class="mb-3 text-md md:text-lg text-[#1a1a1a]/80">
                                Data suku bunga Pofin diperbarui secara
                                berkala dan bersumber dari referensi
                                resmi yang tepercaya.
                            </p>
                        </div>
                    </div>

                    {{-- Item Accordion 4 --}}
                    <h2 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-[#1a1a1a]/50 border-b border-black/50 gap-3"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span class="text-[#1a1a1a] text-lg md:text-xl">
                                Apakah data pribadi saya Aman?
                            </span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-380 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-bla">
                            <p class="mb-3 text-md md:text-lg text-[#1a1a1a]/80">
                                Ya, Pofin menjaga keamanan data pribadi
                                pengguna dengan sistem perlindungan dan
                                kebijakan privasi yang ketat.
                            </p>
                        </div>
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
