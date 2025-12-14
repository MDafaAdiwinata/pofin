<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto pb-32">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-black">
                    Dashboard Admin
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-10">

        {{-- CARD STATISTIK UTAMA --}}
        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4 md:gap-6 lg:gap-6">
            {{-- Card Total Pengguna --}}
            <div class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between w-full">
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Total Pengguna
                    </div>
                    <svg class="w-8 h-8 text-[#00683E]/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl xl:text-5xl text-[#00683E]">
                    {{ $totalUsers }}
                </h1>
                <p class="text-sm text-gray-500">User terdaftar (role: user)</p>
            </div>

            {{-- Card Total Bank --}}
            <div class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between w-full">
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Total Bank
                    </div>
                    <svg class="w-8 h-8 text-[#00683E]/30" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1H8a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl xl:text-5xl text-[#00683E]">
                    {{ $totalBanks }}
                </h1>
                <p class="text-sm text-gray-500">Bank aktif tersedia</p>
            </div>

            {{-- Card Total Simulasi --}}
            <div class="w-auto bg-[#FFF] border border-black/20 rounded-2xl flex flex-col justify-center items-start px-4 sm:px-6 md:px-8 py-4 md:py-6 text-start hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between w-full">
                    <div class="text-[#1a1a1a]/80 font-light text-md md:text-lg xl:text-xl">
                        Total Simulasi
                    </div>
                    <svg class="w-8 h-8 text-[#00683E]/30" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h1 class="sm:my-2 md:my-6 font-bold text-2xl sm:text-4xl xl:text-5xl text-[#00683E]">
                    {{ $totalSimulations }}
                </h1>
                <p class="text-sm text-gray-500">Simulasi telah dibuat</p>
            </div>
        </div>

        {{-- STATISTIK TAMBAHAN --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">
            {{-- Card Total Nominal Deposito --}}
            <div class="bg-gradient-to-r from-green-700 to-green-500 rounded-2xl p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white text-sm font-light mb-2">Total Nominal Deposito</p>
                        <h2 class="text-3xl font-bold">
                            Rp {{ number_format($totalNominal, 0, ',', '.') }}
                        </h2>
                        <p class="text-white text-md mt-2">Akumulasi dari semua simulasi</p>
                    </div>
                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            {{-- Card Bank & User Populer --}}
            <div class="bg-white border border-black/20 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Populer</h3>
                
                {{-- Bank Paling Populer --}}
                @if($popularBank)
                <div class="mb-4 pb-4 border-b border-gray-200">
                    <p class="text-sm text-gray-500 mb-2">Bank Paling Populer</p>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-gray-800">{{ $popularBank->bank->nama_bank }}</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $popularBank->total }} simulasi
                        </span>
                    </div>
                </div>
                @endif

                {{-- User Paling Aktif --}}
                @if($activeUser)
                <div>
                    <p class="text-sm text-gray-500 mb-2">User Paling Aktif</p>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-gray-800">{{ $activeUser->user->nama_lengkap }}</span>
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $activeUser->total }} simulasi
                        </span>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- SIMULASI TERBARU --}}
        <div class="mt-10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Simulasi Terbaru</h3>
                <a href="{{ route('admin.kelola-simulasi') }}" 
                   class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center gap-2">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="bg-white border border-black/20 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-lg font-bold text-black/80 uppercase">User</th>
                            <th class="px-6 py-3 text-left text-lg font-bold text-black/80 uppercase">Bank</th>
                            <th class="px-6 py-3 text-left text-lg font-bold text-black/80 uppercase">Nominal</th>
                            <th class="px-6 py-3 text-left text-lg font-bold text-black/80 uppercase">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($recentSimulations as $sim)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $sim->user->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $sim->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-semibold text-gray-800">{{ $sim->bank->nama_bank }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Rp {{ number_format($sim->nominal_deposito, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $sim->waktu_simulasi->diffForHumans() }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                Belum ada simulasi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>