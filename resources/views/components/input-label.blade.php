@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md md:text-lg text-black/80']) }}>
    {{ $value ?? $slot }}
</label>
