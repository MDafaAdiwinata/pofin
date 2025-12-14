<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="flex items-center justify-between mt-6 sm:mt-4">
            <a href="{{ route('admin.kelola-user') }}"
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
                    Edit User
                </h1>
            </div>
            @include('admin.partials.delete-user')

        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-8 md:mb-12">
        <div class="flex flex-col pb-24">
            <form enctype="multipart/form-data" action="{{ route('admin.user.update', $user) }}" method="POST"
                class="flex flex-col md:flex-row gap-6 md:gap-12 mx-auto w-full">
                @csrf
                @method('PUT')

                <!-- INPUT FORM -->
                <div class="w-full md:w-1/2 mx-auto">
                    <div class="mt-4">
                        <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                        <x-text-input id="nama_lengkap" class="block mt-2 w-full" type="text" name="nama_lengkap"
                            :value="$user->nama_lengkap" required />
                        <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-2 w-full" type="text" name="username"
                            :value="$user->username" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-2 w-full" type="email" name="email"
                            :value="$user->email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="role" :value="__('Peran')" />

                        <select id="role" name="role"
                            class="text-md cursor-pointer mt-2 bg-transparent border border-[#000]/30 text-[#000]/80 rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full px-2 py-2">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                User
                            </option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </div>


                    <div class="flex items-center justify-between w-full mt-6">
                        <x-primary-button class="ms-auto">
                            {{ __('Simpan') }}
                        </x-primary-button>

                    </div>

                </div>
            </form>
        </div>

    </div>
</x-app-layout>
