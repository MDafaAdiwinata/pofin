<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-[#1a1a1a]">
                    Histori Deposito
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-8">

        {{-- Pesan Success --}}
        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col">
            {{-- FILTER & SEARCH SECTION --}}
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-6 sm:gap-10 rounded-2xl">
                <form method="GET" action="{{ route('user.histori') }}"
                    class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                    {{-- Filter Jangka Waktu --}}
                    <div class="max-w-2xl">
                        <select id="jangka_waktu" name="jangka_waktu" onchange="this.form.submit()"
                            class="bg-[#fff] border border-black/20 text-black text-md rounded-2xl block w-full px-4 py-3 cursor-pointer hover:bg-[#f5f5f5] transition duration-300">
                            <option value="">Semua Jangka Waktu</option>
                            <option value="1" {{ request('jangka_waktu') == '1' ? 'selected' : '' }}>1 Bulan
                            </option>
                            <option value="3" {{ request('jangka_waktu') == '3' ? 'selected' : '' }}>3 Bulan
                            </option>
                            <option value="6" {{ request('jangka_waktu') == '6' ? 'selected' : '' }}>6 Bulan
                            </option>
                            <option value="12" {{ request('jangka_waktu') == '12' ? 'selected' : '' }}>12 Bulan
                            </option>
                        </select>
                    </div>

                    {{-- Search Box --}}
                    <div class="max-w-2xl flex items-center">
                        <label for="search" class="sr-only">Search</label>
                        <div class="w-full">
                            <input type="text" id="search" name="search"
                                class="bg-[#fff] border border-black/20 text-black/80 text-md rounded-2xl block w-full px-4 py-3"
                                placeholder="Cari nama bank..." value="{{ request('search') }}" />
                        </div>
                        <button type="submit"
                            class="p-2.5 md:p-3 ms-2 text-sm font-medium hover:text-white text-black bg-transparent rounded-2xl border border-black transition duration-300 hover:bg-black/80 cursor-pointer">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
                <div class="flex gap-4 justify-end">
                    <a href="{{ route('user.histori.export-pdf', request()->query()) }}"
                        class="focus:outline-none text-white hover:scale-95 bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-2xl text-sm px-5 py-2.5 shadow-lg hover:shadow-none transition duration-300 cursor-pointer inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                        Export PDF
                    </a>
                    <a href="{{ route('user.histori.export-excel', request()->query()) }}"
                        class="focus:outline-none text-white hover:scale-95 bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-2xl text-sm px-5 py-2.5 shadow-lg hover:shadow-none transition duration-300 cursor-pointer inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                        Export Excel
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center mt-6">
                <div class="relative overflow-x-auto rounded-xl sm:rounded-2xl border border-black/10 w-full">
                    <table class="w-full text-md text-left rtl:text-right text-[#1a1a1a] border-collapse">
                        <thead class="text-lg text-[#1a1a1a] bg-[#475449]/20 uppercase border-b border-black/10">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Bank</th>
                                <th scope="col" class="px-6 py-3">Jumlah Deposito</th>
                                <th scope="col" class="px-6 py-3">Durasi</th>
                                <th scope="col" class="px-6 py-3">Suku Bunga</th>
                                <th scope="col" class="px-6 py-3">Saldo Akhir</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($simulations as $index => $simulation)
                                <tr
                                    class="bg-transparent border-b border-black/10 hover:bg-black/5 transition duration-300">
                                    {{-- Nomor --}}
                                    <th scope="row" class="px-6 py-4 font-medium text-[#1a1a1a] whitespace-nowrap">
                                        {{ $simulations->firstItem() + $index }}
                                    </th>

                                    {{-- Nama Bank --}}
                                    <td class="px-6 py-4 font-semibold">
                                        {{ $simulation->bank->nama_bank }}
                                    </td>

                                    {{-- Jumlah Deposito --}}
                                    <td class="px-6 py-4">
                                        Rp {{ number_format($simulation->nominal_deposito, 0, ',', '.') }}
                                    </td>

                                    {{-- Durasi --}}
                                    <td class="px-6 py-4">
                                        {{ $simulation->jangka_waktu_bulan }} Bulan
                                    </td>

                                    {{-- Suku Bunga --}}
                                    <td class="px-6 py-4">
                                        {{ number_format($simulation->bank->suku_bunga_dasar, 2) }}%
                                    </td>

                                    {{-- Saldo Akhir --}}
                                    <td class="px-6 py-4 font-semibold text-green-700">
                                        Rp {{ number_format($simulation->total_akhir, 0, ',', '.') }}
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="px-6 py-4">
                                        {{ $simulation->waktu_simulasi->format('d M Y, H:i') }}
                                    </td>

                                    {{-- Aksi Hapus --}}
                                    <td class="px-6 py-4 text-center">
                                        <button data-modal-target="modalHapus-{{ $simulation->id_simulasi }}"
                                            data-modal-toggle="modalHapus-{{ $simulation->id_simulasi }}"
                                            type="button"
                                            class="text-red-600 hover:text-white hover:bg-red-600 p-2 rounded-lg transition duration-300">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal Hapus untuk setiap simulasi --}}
                                <div id="modalHapus-{{ $simulation->id_simulasi }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-[#273E3D] rounded-2xl shadow-lg">
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-bold text-white">
                                                    Yakin ingin menghapus histori simulasi ini?
                                                </h3>
                                                <p class="mb-5 text-md text-gray-300">
                                                    {{ $simulation->bank->nama_bank }} - Rp
                                                    {{ number_format($simulation->nominal_deposito, 0, ',', '.') }}
                                                </p>
                                                <button data-modal-hide="modalHapus-{{ $simulation->id_simulasi }}"
                                                    type="button"
                                                    class="cursor-pointer py-2 px-4 text-md font-medium text-white focus:outline-none bg-black/0 rounded-xl border border-white/50 hover:text-white hover:bg-[#fff]/20 transition duration-300 focus:z-10">
                                                    Batalkan
                                                </button>
                                                <form
                                                    action="{{ route('histori.destroy', $simulation->id_simulasi) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="ms-2 text-white bg-red-600 hover:bg-red-800 transition duration-300 hover:scale-95 font-medium rounded-xl text-md inline-flex items-center px-5 py-2 text-center cursor-pointer">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                {{-- Empty State --}}
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="text-black/80 text-lg font-medium mb-2">Belum ada histori
                                                simulasi</p>
                                            <p class="text-black/60 text-md mb-4">Mulai simulasi deposito untuk melihat
                                                histori Anda</p>
                                            <a href="{{ route('user.deposit') }}"
                                                class="text-white bg-[#183120] hover:bg-[#22482e] rounded-xl text-md font-semibold px-6 py-2 transition duration-300 hover:scale-95">
                                                Buat Simulasi
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PAGINATION --}}
            @if ($simulations->hasPages())
                <div class="mt-6 flex justify-center">
                    {{ $simulations->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
