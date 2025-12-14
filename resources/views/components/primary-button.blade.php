<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center px-5 py-2 bg-[#000]/80 border border-transparent rounded-xl font-bold text-md text-white hover:bg-[#034739] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
