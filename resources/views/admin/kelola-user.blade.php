<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-[#1a1a1a]">
                    Kelola User
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-black/5 mt-6 sm:mt-2 mb-8">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-6 sm:gap-10 rounded-2xl">
                <form class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="max-w-2xl flex items-center">
                        <label for="search" class="sr-only">Search</label>
                        <div class="w-full">
                            <input type="text" id="search" name="search"
                                class="bg-[#fff] border border-black/20 text-black/80 text-md md:text-lg rounded-2xl block w-full px-4"
                                placeholder="Cari" value="" />
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
                <div class="flex flex-col items-end justify-center">
                    <a href="{{ route('admin.user.create-user') }}"
                        class="focus:outline-none text-white hover:scale-95 bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-2xl text-md px-5 py-2.5 shadow-lg hover:shadow-none transition duration-300 cursor-pointer">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center mt-6">
                <div class="relative overflow-x-auto rounded-xl sm:rounded-2xl border border-black/10 w-full">
                    <table class="w-full text-md text-left rtl:text-right text-[#1a1a1a] border-collapse">
                        <thead class="text-lg text-[#1a1a1a] bg-[#475449]/20 uppercase border-b border-black/10">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Peran</th>
                                <th scope="col" class="px-6 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr
                                    class="bg-transparent border-b border-black/10 hover:bg-black/5 transition duration-300">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-[var(--txt-primary2)] whitespace-nowrap">
                                        {{ $user->id_user }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->nama_lengkap }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4 text-right space-y-2">
                                        <a href="{{ route('user.edit-user', $user->id_user) }}"
                                            class="font-medium text-md sm:text-lg text-yellow-600 hover:underline">
                                            UBAH
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
