@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-transparent border border-[#000]/30 text-[#000]/80 text-md rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2']) }}>
