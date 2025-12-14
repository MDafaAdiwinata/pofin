<section class="space-y-6">
    <header>
        <h2 class="text-lg md:text-xl mb-2 font-semibold text-black/80">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-md md:text-lg text-black/60">
            {{ __('Sebelum menghapus akun, pastikan Anda sudah menyimpan data penting Anda') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Hapus Akun') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg md:text-xl mb-2 font-semibold text-black/80">
                {{ __('Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-md md:text-lg text-black/60">
                {{ __('Setelah akun dihapus, semua data akan hilang permanen. Masukkan password Anda untuk mengonfirmasi penghapusan akun.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batalkan') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
