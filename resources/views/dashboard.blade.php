<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('لوحة القيادة') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 flex justify-start ">
                {{-- <x-jet-welcome /> --}}
                <x-button primary>
                    <a href="{{ route('list-item') }}">Selling Product</a>
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
