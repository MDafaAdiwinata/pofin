<x-app-layout>
    <!-- Main Content Dashboard -->
    <div class="px-4 md:px-4 lg:px-8 container mx-auto">
        <div class="grid grid-cols-2 gap-4 mt-6 sm:mt-4">
            <div class="flex items-center justify-start h-10 md:h-20">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold text-[var(--txt-primary2)]">
                    Profile
                </h1>
            </div>
            <div class="flex items-center justify-end h-10 md:h-20">
                <h1 class="text-end text-md md:text-lg lg:text-xl font-light text-black/60">
                    <span id="clock" class="font-bold"></span>
                </h1>
            </div>
        </div>

        <hr class="w-full border border-[var(--txt-primary2)]/20 mt-6 sm:mt-2 mb-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 lg:gap-6">
            <div class="p-6 lg:p-8 bg-white rounded-xl lg:rounded-2xl border border-black/20">
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 lg:p-8 bg-white rounded-xl lg:rounded-2xl border border-black/20">
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 lg:p-8 bg-white rounded-xl lg:rounded-2xl border border-black/20 h-fit">
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
