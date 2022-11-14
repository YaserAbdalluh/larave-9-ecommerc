<div>
    <div class="py-20 dark:bg-gray-700 bg-gray-50">
        <div dir="rtl" class="items-end lg:flex-row flex justify-center" id="cart">
            <div
                class="lg:w-7/12 md:w-8/12 w-full lg:px-8 px-11 md:px-6 lg:ml-64 md:py-8 py-4 bg-white dark:bg-gray-800 overflow-y-hidden overflow-x-hidden h-auto">
                @forelse ($cart as $item)
                    <div wire:key="{{ $loop->index }}">
                        @if ($item->product)
                            <div>
                                <div
                                    class="items-center pt-5 text-gray-500 hover:text-gray-600 dark:text-white cursor-pointer">
                                    <div class="flex justify-around">
                                        <p class="text-md pl-2 leading-none dark:hover:text-gray-200">
                                            اسم المحل:
                                            <span class="font-bold">{{ $item->product->store_name }}</span>
                                        </p>
                                        <p class="text-md pl-2 leading-none dark:hover:text-gray-200">
                                            رقم الهاتف :
                                            <span class="font-bold">{{ $item->product->phone }}</span>
                                        </p>
                                        <p class="text-md pl-2 leading-none dark:hover:text-gray-200">
                                            العنوان:
                                            <span class="font-bold">{{ $item->product->location }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="md:flex items-strech py-8 md:py-10 lg:py-8">
                                    <div class="md:w-4/12 flex justify-center 2xl:w-1/4 w-full">
                                        <img src="{{ asset('storage/products/' . $item->product->photo) }}"
                                            alt="Black Leather Bag"
                                            class="h-full object-center object-cover md:block hidden" />
                                        <img src="{{ asset('storage/products/' . $item->product->photo) }}"
                                            alt="Black Leather Bag"
                                            class="md:hidden w-3/4 h-3/4 flex justify-center object-center object-cover" />
                                    </div>
                                    <div class="md:pr-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                        <p
                                            class="lg:text-xl text-3xl font-black leading-10 text-gray-800 dark:text-white pt-3">
                                            {{ $item->product->name }}
                                        </p>
                                        <div class="flex items-center justify-end w-full pt-1">
                                            <div class="flex mb-5">
                                                <x-button wire:loading.attr="disabled"
                                                    wire:click="incrementQty({{ $item->id }})"
                                                    wire:loading.attr="disabled">
                                                    <x-icon.plus />
                                                </x-button>
                                                <x-input type="text" value="{{ $item->qty }}" readonly
                                                    class="w-12 items-center" />
                                                <x-button wire:loading.attr="disabled"
                                                    wire:click="decrementQty({{ $item->id }})">
                                                    <x-icon name="minus" class="w-5 h-5" />
                                                </x-button>
                                            </div>
                                        </div>
                                        <p class="text-sm leading-5 text-gray-600 dark:text-white pt-2">
                                            {{ $item->product->description }}
                                        </p>
                                        <div class="flex items-center justify-between pt-5">
                                            <div class="flex itemms-center">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="deleteCart({{ $item->id }})"
                                                    class="text-md leading-5 text-red-500 rounded-md font-semibold hover:bg-red-200 p-2 cursor-pointer">
                                                    <span wire:loading.remove
                                                        wire:target="deleteCart({{ $item->id }})">
                                                        حذف
                                                    </span>
                                                    <span wire:loading wire:target="deleteCart({{ $item->id }})">
                                                        ..حذف
                                                    </span>
                                                </button>
                                            </div>
                                            <p class="text-base font-black leading-none text-gray-800 dark:text-white">
                                                ${{ $item->product->original_price * $item->qty }}
                                            </p>
                                            @php
                                                $totalPrice += $item->product->original_price * $item->qty;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-inherit"></div>
                            </div>
                        @endif
                        <div
                            class="lg:w-96 lg:fixed top-36 left-10 px-2 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 ">
                            <div
                                class="flex flex-col h-auto lg:px-8 md:px-7 px-4 lg:py-15 md:py-10 py-3 justify-between">
                                <div>
                                    <div class="flex items-center justify-between pt-1">
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center font-semibold pb-6 justify-between lg:pt-2 pt-20">
                                        <p class="text-2xl leading-normal text-gray-800 dark:text-white">الاجمالي:</p>
                                        <p
                                            class="text-2xl space-x-2 font-bold leading-normal text-right text-gray-800 dark:text-white">
                                            {{ $totalPrice }}
                                            <span class="pr-1">ريال</span>
                                        </p>
                                    </div>
                                    <a href="{{ url('/order/order-product') }}">
                                        <button
                                            class="text-base font-semibold leading-none w-full py-3 mt-6 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white rounded-full dark:hover:bg-gray-700">
                                            تأكيدالطلب
                                        </button>
                                    </a>
                                    <div class=" pt-5">
                                        <a href="/">
                                            <p
                                                class="text-base text-center leading-none w-full py-3 bg-blue-500 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white rounded-full dark:hover:bg-gray-500">
                                                مواصلةالتسوق
                                            </p>
                                        </a>
                                        {{-- <p class="text-base leading-none text-gray-800 dark:text-white">$30</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-1/2">
                        <x-card class="flex justify-center mt-2 dark:bg-gray-600 shadow-md rounded-md">
                            <p class="text-lg font-bold">
                                لا توجد بضاعة
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </x-card>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <x-footer />
</div>
{{-- <script>
    Livewire.on('CarAddedUbdated', cartId => {
        alert('A post was deleted with the id of: ' + cartId);
    })
</script> --}}
