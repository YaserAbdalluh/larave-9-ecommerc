<x-frontpage-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('العملاء') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-solid shadow-lg overflow-hidden  sm:rounded-lg">
                @livewire('sell.list-item-customer')
            </div>
        </div>
    </div>
</x-frontpage-layout>