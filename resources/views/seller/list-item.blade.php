<x-frontpage-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('عرض البضاعة') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 border-solid shadow overflow-hidden  sm:rounded-lg">
                @livewire('sell.customer-list-item')
            </div>
        </div>
    </div>
</x-frontpage-layout>