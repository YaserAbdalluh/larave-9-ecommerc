<div class="mt-7 overflow-x-auto">
    <table class="w-full whitespace-nowrap">
        <thead>
            <div class="m-3 p-3 text-lg font-bold">
                {{-- {{ $order->store_name }} --}}
            </div>
        </thead>
        <div>
            <tbody>

                @forelse ($order as $item)
                    @if ($item->product)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td>
                            <div class="mr-5">
                                <div
                                    class="bg-gray-200 rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                    {{ $item->id }}
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-3">
                                <p class="flex text-base font-medium leading-none mr-2">
                                    {{ $item->product->name }}
                                    <x-icon name="link" class="h-4 w-4 text-blue-600" />
                                </p>
                            </div>
                        </td>
                        <td>
                            <p class="font-bold">اسم الزبون : {{ $item->name }}</p>
                        </td>
                        <td class="pl-1">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">
                                    {{ $item->product->original_price * $item->qty }} ريال
                                </p>
                            </div>
                        </td>
                        <td class="pl-1">
                            <div class="flex items-center">
                                <p class="text-sm font-bold leading-none text-gray-600 ml-2">
                                    {{ $item->phone_number }}
                                </p>
                            </div>
                        </td>
                        <td class="px-1">
                            <div class="flex items-center">
                                <x-icon name="calculator" class="h-6 w-6" />
                                <p class="text-sm leading-none text-gray-600 ml-2">
                                <div>
                                    {{ $item->qty }}
                                </div>
                                </p>
                            </div>
                        </td>
                        <td class="pr-1">
                            <button
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                <div>
                                    {{ $item->created_at }}
                                </div>
                            </button>
                        </td>
                        <td class="">
                            <button
                                class="focus:ring-2 h-18 w-20 pt-1 focus:ring-red-300 text-sm leading-none text-gray-600 rounded hover:bg-gray-200 focus:outline-none">
                                <img src="{{ asset('storage/products/' . $item->product->photo) }}" alt="">
                            </button>
                        </td>
                        <td>
                            <div class="relative px-1 pt-2">
                                <div tabindex="0" wire:click='deleteOrder({{ $item->id }})'
                                    class="focus:outline-none flex justify-center text-red-400 py-1 rounded-md cursor-pointer hover:text-red-700">
                                    <x-icon name="archive" class="h-6 w-6" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    <tr class="h-3"></tr>
                @empty
                    <p class="flex justify-center py-5 font-bold text-lg">No Customers</p>
                @endforelse
            </tbody>
    </table>
</div>
