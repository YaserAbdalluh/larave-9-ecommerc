<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-orange-300 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>