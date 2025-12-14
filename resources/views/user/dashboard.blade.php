<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto pb-32">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-black">
                    Dashboard User
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-10">

        {{-- STATISTIK CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 md:gap-6 lg:gap-6 mb-8">
            {{-- Card 1: Total Simulasi --}}
            <div
                class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start transition duration-300">
                <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                    Total Simulasi
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl text-[#00683E]">
                    {{ $totalSimulasi }}
                </h1>
                <p class="text-sm text-gray-500">Simulasi yang telah dibuat</p>
            </div>

            {{-- Card 2: Total Nominal Deposito --}}
            <div
                class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start transition duration-300">
                <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                    Total Nominal Deposito
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl text-[#00683E]">
                    Rp {{ number_format($totalNominal, 0, ',', '.') }}
                </h1>
                <p class="text-sm text-gray-500">Modal yang disimulasikan</p>
            </div>

            {{-- Card 3: Total Bunga Diterima --}}
            <div
                class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start transition duration-300">
                <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                    Total Bunga Diterima
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl text-[#00683E]">
                    Rp {{ number_format($totalBunga, 0, ',', '.') }}
                </h1>
                <p class="text-sm text-gray-500">Estimasi keuntungan</p>
            </div>

            {{-- Card 4: Total Saldo Akhir --}}
            <div
                class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start transition duration-300">
                <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                    Total Saldo Akhir
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl text-[#00683E]">
                    Rp {{ number_format($totalSaldoAkhir, 0, ',', '.') }}
                </h1>
                <p class="text-sm text-gray-500">Modal + Bunga</p>
            </div>
        </div>

        {{-- INFO BANK FAVORIT --}}
        @if($bankFavorit)
        <div class="bg-gradient-to-r from-[#00683E] to-[#00523B] border border-black/10 rounded-2xl p-6 mb-8 text-white">
            <h3 class="text-xl font-semibold mb-2">Bank Favorit</h3>
            <div class="flex items-center gap-4 mt-4">
                <div class="bg-white rounded-xl p-4">
                    <img src="{{ asset('storage/bank/' . $bankFavorit->bank->gambar) }}" 
                         alt="{{ $bankFavorit->bank->nama_bank }}"
                         class="h-16">
                </div>
                <div>
                    <p class="text-2xl font-bold">{{ $bankFavorit->bank->nama_bank }}</p>
                    <p class="text-sm opacity-90">Digunakan {{ $bankFavorit->total }}x dalam simulasi</p>
                </div>
            </div>
        </div>
        @endif

        {{-- SIMULASI TERAKHIR --}}
        @if($simulasiTerakhir->count() > 0)
        <div class="bg-white border border-black/20 rounded-2xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-[#1a1a1a]">Simulasi Terakhir</h3>
                <a href="{{ route('user.histori') }}" 
                   class="text-[#00683E] hover:underline text-sm font-medium">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-4">
                @foreach($simulasiTerakhir as $simulasi)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition duration-300">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/bank/' . $simulasi->bank->gambar) }}" 
                             alt="{{ $simulasi->bank->nama_bank }}"
                             class="h-20 object-contain">
                        <div>
                            <p class="font-semibold text-[#1a1a1a]">{{ $simulasi->bank->nama_bank }}</p>
                            <p class="text-sm text-gray-500">
                                {{ $simulasi->waktu_simulasi->format('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-[#00683E]">
                            Rp {{ number_format($simulasi->total_akhir, 0, ',', '.') }}
                        </p>
                        <p class="text-sm text-gray-500">{{ $simulasi->jangka_waktu_bulan }} Bulan</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-white border border-black/20 rounded-2xl p-12 text-center">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Simulasi</h3>
            <p class="text-gray-500 mb-6">Mulai buat simulasi deposito pertama Anda</p>
            <a href="{{ route('user.deposit') }}" 
               class="inline-block bg-[#00683E] hover:bg-[#00523B] text-white font-medium px-6 py-3 rounded-xl transition duration-300">
                Buat Simulasi Sekarang
            </a>
        </div>
        @endif

    </div>
</x-app-layout>