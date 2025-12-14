<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="flex items-center justify-between mt-6 sm:mt-4">
            <a href="{{ route('admin.kelola-bank') }}"
                class="ms-4 hover:underline text-md md:text-lg lg:text-xl flex items-center justify-center gap-3 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-90deg-left w-5 h-5 group-hover:-translate-x-2 transition duration-300"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                </svg>
                <span class="hidden md:block">Kembali</span>
            </a>
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-[#1a1a1a]">
                    Tambah Bank
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-8 md:mb-12">
        <div class="flex flex-col" x-data="{ imageUrl: '/noimage.png' }">
            <form enctype="multipart/form-data" action="{{ route('bank.store') }}" method="POST"
                class="flex flex-col md:flex-row gap-8 md:gap-12">

                @csrf

                <!-- IMAGE PREVIEW -->
                <div class="w-full md:w-1/2 rounded-2xl">
                    <img :src="imageUrl" class="rounded-xl w-full h-auto object-cover" alt="">
                </div>

                <!-- FORM INPUTS -->
                <div class="w-full md:w-1/2">

                    <div class="mt-2">
                        <label class="block mb-2 text-lg font-medium text-[#1a1a1a]" for="gambar">
                            Unggah Gambar
                        </label>
                        <input
                            class="block w-full text-md text-[#1a1a1a]/80 border border-black/30 rounded-xl cursor-pointer px-3 py-2 focus:outline-none"
                            id="gambar" type="file" name="gambar" accept="image/*"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <p class="mt-1 text-md text-black/60">PNG, JPG or JPEG (MAX. 300x300px).</p>
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama_bank" :value="__('Nama Bank')" />
                        <x-text-input id="nama_bank" class="block mt-2 w-full" type="text" name="nama_bank"
                            :value="old('nama_bank')" placeholder="contoh: Bank BCA" required />
                        <x-input-error :messages="$errors->get('nama_bank')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="kode_bank" :value="__('Kode Bank')" />
                        <x-text-input id="kode_bank" class="block mt-2 w-full" type="text" name="kode_bank"
                            :value="old('kode_bank')" placeholder="Contoh: BCA" required />
                        <x-input-error :messages="$errors->get('kode_bank')" class="mt-2" />
                    </div>

                    <div class="mt-6" x-data="sukuBunga()">
                        <x-input-label for="suku_bunga_dasar" value="Suku Bunga (%)" />
                        <x-text-input id="suku_bunga_dasar" type="text" class="block mt-2 w-full" x-model="display"
                            @input="format" placeholder="Contoh: 2,50" required />
                        <input type="hidden" name="suku_bunga_dasar" :value="raw">
                        <x-input-error :messages="$errors->get('suku_bunga_dasar')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="is_active" :value="__('Status')" />
                        <select id="is_active" name="is_active"
                            class="text-md cursor-pointer mt-2 bg-transparent border border-[#000]/30 text-[#000]/80 text-md rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2">
                            <option value="nonaktif" {{ old('is_active') == 'nonaktif' ? 'selected' : '' }}>Non Aktif
                            </option>
                            <option value="aktif" {{ old('is_active') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-2 w-full" placeholder="Deskripsi Bank..."
                            name="deskripsi" required>
                            {{ old('deskripsi') }}
                        </x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="flex flex-col items-end mt-8 ms-auto">
                        {{ __('Tambah') }}
                    </x-primary-button>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>
