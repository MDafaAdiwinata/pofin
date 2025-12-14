<section class="space-y-6">

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-user')">{{ __('Hapus Bank') }}</x-danger-button>

    <x-modal name="confirm-delete-user" focusable>
        <div class="p-6">
            <form method="post" action="{{ route('user.destroy', $user) }}">
                @csrf
                @method('DELETE')

                <h2 class="text-lg md:text-xl mb-2 font-semibold text-black/80">
                    {{ __('Anda yakin ingin menghapus Data Bank ini?') }}
                </h2>
                <p class="mt-1 text-md md:text-lg text-black/60">
                    {{ __('Setelah data dihapus, semua data akan hilang permanen.') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Batalkan') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Hapus') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
