<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-black">
                    Simulasi Deposito
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-6">

        {{-- Pesan Success --}}
        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col items-center pb-32">
            {{-- Form Input Deposit --}}
            <form action="{{ route('deposit.calculate') }}" method="POST" class="flex flex-col w-full bg-[#fff] border border-black/10 p-6 rounded-2xl mt-2">
                @csrf
                <h2 class="text-lg md:text-xl mb-1 md:mb-2 font-semibold text-black/80">
                    {{ __('Hitung Pendapatan Deposito Anda') }}
                </h2>

                <p class="text-md md:text-lg text-black/60">
                    {{ __('Tentukan Jumlah dan Waktu Deposito Anda untuk melihat perbandingan hasil dari bank BCA, BRI, dan Mandiri') }}
                </p>

                <hr class="border border-black/5 w-full my-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">
                    
                    {{-- Input Nominal Deposito --}}
                    <div class="mb-5">
                        <label for="nominal_deposito" class="block mb-2 text-md font-medium text-[#1a1a1a]">
                            Jumlah Deposito
                        </label>
                        <input type="text" id="nominal_deposito" name="nominal_deposito"
                            class="bg-white border border-black/20 text-[#1a1a1a] text-md rounded-xl block w-full p-3"
                            placeholder="Contoh: 100.000.000" 
                            value="{{ old('nominal_deposito', isset($nominal_deposito) ? number_format($nominal_deposito, 0, ',', '.') : '') }}"
                            required />
                        @error('nominal_deposito')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Pilih Jangka Waktu --}}
                    <div class="mb-6">
                        <label for="jangka_waktu_bulan" class="block mb-2 text-md font-medium text-[#1a1a1a]">
                            Jangka Waktu
                        </label>
                        <select id="jangka_waktu_bulan" name="jangka_waktu_bulan"
                            class="border border-black/20 text-[#1a1a1a] text-md rounded-xl block w-full p-3 cursor-pointer"
                            required>
                            <option value="">Pilih Jangka Waktu</option>
                            <option value="1" {{ old('jangka_waktu_bulan', $jangka_waktu_bulan ?? '') == '1' ? 'selected' : '' }}>1 Bulan</option>
                            <option value="3" {{ old('jangka_waktu_bulan', $jangka_waktu_bulan ?? '') == '3' ? 'selected' : '' }}>3 Bulan</option>
                            <option value="6" {{ old('jangka_waktu_bulan', $jangka_waktu_bulan ?? '') == '6' ? 'selected' : '' }}>6 Bulan</option>
                            <option value="12" {{ old('jangka_waktu_bulan', $jangka_waktu_bulan ?? '') == '12' ? 'selected' : '' }}>12 Bulan</option>
                        </select>
                        @error('jangka_waktu_bulan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                {{-- Tombol Hitung --}}
                <button type="submit"
                    class="text-white bg-[#183120] hover:bg-[#22482e] rounded-2xl text-md md:text-lg font-bold w-fit px-5 py-2 ms-auto hover:scale-95 transition duration-300">
                    Hitung
                </button>
            </form>

            {{-- HASIL PERHITUNGAN & CARD BANK (Tampil setelah pencet HITUNG) --}}
            @if(isset($results) && count($results) > 0)
            <div class="flex flex-col w-full">
                {{-- FORM UNTUK SAVE SIMULASI --}}
                <form id="saveForm" action="{{ route('deposit.save') }}" method="POST">
                    @csrf
                    {{-- Hidden inputs untuk data yang akan disimpan --}}
                    <input type="hidden" name="id_bank" id="selected_bank">
                    <input type="hidden" name="nominal_deposito" value="{{ $nominal_deposito }}">
                    <input type="hidden" name="jangka_waktu_bulan" value="{{ $jangka_waktu_bulan }}">
                    <input type="hidden" name="bunga_diterima" id="selected_bunga">
                    <input type="hidden" name="total_akhir" id="selected_total">

                    {{-- Card Bank --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                        @php
                            // Cari total_akhir tertinggi untuk rekomendasi
                            $maxTotalAkhir = collect($results)->max('total_akhir');
                        @endphp
                        
                        @foreach($results as $result)
                        <div class="bank-card bg-[#fff] cursor-pointer hover:bg-[#fff]/90 transition-all duration-300 border-2 border-black/10 hover:border-green-600 rounded-xl md:rounded-2xl p-4 md:p-6 relative"
                            data-bank-id="{{ $result['id_bank'] }}"
                            data-bunga="{{ $result['bunga_diterima'] }}"
                            data-total="{{ $result['total_akhir'] }}"
                            onclick="selectCard(this)">
                            
                            {{-- Badge Rekomendasi Bank (jika total_akhir tertinggi) --}}
                            @if($result['total_akhir']== $maxTotalAkhir)
                            <div class="absolute top-0 right-0 mt-3 mr-3">
                                <span class="inline-flex items-center gap-1 bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold shadow-md">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    Rekomendasi Bank
                                </span>
                            </div>
                            @endif
                            
                            {{-- Logo Bank --}}
                            <div class="flex justify-center mb-4">
                                <img class="rounded-base object-contain" 
                                     src="{{ asset('storage/bank/' . $result['gambar']) }}" 
                                     alt="{{ $result['nama_bank'] }}" />
                            </div>
                            
                            {{-- Nama Bank --}}
                            <h5 class="mt-6 mb-2 text-lg md:text-2xl font-bold text-center">
                                {{ $result['nama_bank'] }}
                            </h5>
                            
                            {{-- Suku Bunga --}}
                            <p class="font-light text-md md:text-lg text-center">
                                Suku Bunga: {{ $result['suku_bunga'] }}%
                            </p>
                            
                            <hr class="border border-black/20 my-4">
                            
                            {{-- Total Akhir --}}
                            <p class="font-bold text-lg md:text-xl">
                                Total Akhir: Rp {{ number_format($result['total_akhir'], 0, ',', '.') }}
                            </p>
                            
                            {{-- Bunga Didapat --}}
                            <p class="font-semibold text-md md:text-lg mt-2 text-green-700">
                                Bunga didapat: Rp {{ number_format($result['bunga_diterima'], 0, ',', '.') }}
                            </p>

                            {{-- Indikator Selected --}}
                            <div class="selected-indicator hidden mt-4 text-center">
                                <span class="inline-block bg-green-600 text-white px-4 py-1 rounded-full text-sm font-bold">
                                    ✓ Dipilih
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- TOMBOL SIMPAN SIMULASI --}}
                    <button type="submit" id="saveButton" disabled
                        class="mt-8 text-white bg-[#183120] hover:bg-[#22482e] rounded-2xl text-md md:text-lg font-bold w-fit px-5 py-2 ms-auto hover:scale-95 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100">
                        Simpan Simulasi
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    {{-- JAVASCRIPT --}}
    <script>
        // Format input rupiah
        const nominalInput = document.getElementById('nominal_deposito');
        
        nominalInput.addEventListener('input', function(e) {
            // Ambil hanya angka
            let value = e.target.value.replace(/\D/g, '');
            // Format dengan titik pemisah ribuan
            e.target.value = formatRupiah(value);
        });

        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Logic memilih card bank
        function selectCard(card) {
            // Ambil semua card
            const allCards = document.querySelectorAll('.bank-card');
            
            // Reset semua card ke state default
            allCards.forEach(c => {
                c.classList.remove('border-green-800', 'border-4', 'bg-green-50');
                c.classList.add('border-black/10', 'border-2');
                // Sembunyikan indikator selected
                const indicator = c.querySelector('.selected-indicator');
                if (indicator) indicator.classList.add('hidden');
            });

            // Highlight card yang dipilih
            card.classList.remove('border-black/10', 'border-2');
            card.classList.add('border-green-800', 'border-4', 'bg-green-50');
            
            // Tampilkan indikator selected
            const indicator = card.querySelector('.selected-indicator');
            if (indicator) indicator.classList.remove('hidden');

            // Ambil data dari card yang dipilih
            const bankId = card.dataset.bankId;
            const bunga = card.dataset.bunga;
            const total = card.dataset.total;

            // Set nilai ke hidden input
            document.getElementById('selected_bank').value = bankId;
            document.getElementById('selected_bunga').value = bunga;
            document.getElementById('selected_total').value = total;

            // Enable tombol simpan
            document.getElementById('saveButton').disabled = false;
            
            console.log('Bank dipilih:', bankId, 'Bunga:', bunga, 'Total:', total);
        }
    </script>
</x-app-layout>