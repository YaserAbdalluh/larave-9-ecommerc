<div>
    <div x-data="checkoutPage()" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 space-y-8">
        <div class="flex items-center">
            <figure class="text-sm md:text-5xl leading-tight md:leading-snug">
                {{-- 🖥️📱 --}}
            </figure>
            <div>
                <ul class="flex items-center text-md md:text-md text-gray-500 space-x-1">
                    <li>
                        <a href="{{ url('/') }}" class="text-blue-500 flex transition hover:text-gray-500">
                            <x-icon name="home" class="h-4 w-4 mx-1 mt-1" />
                            <span>الرئيسة</span>
                        </a>
                    </li>
                    <li>
                        >
                    </li>
                    <li>
                        <a href="{{ url('/shopping-cart') }}" class="text-blue-500 transition hover:text-gray-500">
                            السلة
                        </a>
                    </li>
                    <li>
                        >
                    </li>
                    <li>
                        <a href="" class="text-blue-500 transition hover:text-gray-500">
                            تأكيد الطلب
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col space-y-10 md:space-y-16 md:flex-row md:space-x-10 lg:space-x-16 md:items-start">
            <div class="w-full lg:w-7/12 mx-5 space-y-4">
                <p class="font-medium text-2xl">
                    تفاصيل عملية الشراء
                </p>
                <x-errors dir="ltr" class="" />
                <div x-data="{}" x-init="() => setTimeout(() => $refs.autofocus.focus(), 250)">
                    <label for="name" class="text-sm font-medium">
                        الاسم <span class="text-red-500">*</span>
                    </label>
                    <x-jet-input id="name" x-ref="autofocus" type="text" class="mt-1 block w-2/3"
                        wire:model.defer="name" />
                    <x-jet-input-error ref-input-error for="name" class="mt-2" />
                </div>
                <div>
                    <label for="phone" class="text-sm font-medium">
                        رقم الهاتف<span class="text-red-500">*</span>
                    </label>
                    <x-jet-input id="phone" type="number" class="mt-1 block w-2/3"
                        wire:model.defer="phone_number" />
                    <x-jet-input-error ref-input-error for="phone" class="mt-2" />
                </div>
                <div>
                    <label for="address" class="text-sm font-medium">
                        العنوان <span class="text-red-500">*</span>
                    </label>
                    <x-jet-input id="address" type="text" class="mt-1 block w-2/3"
                        wire:model.defer="location_addr" />
                    <x-jet-input-error ref-input-error for="address" class="mt-2" />
                </div>
            </div>
            <div
                class="w-full lg:w-5/12 border border-gray-100 dark:text-gray-600 bg-white rounded-lg shadow-lg p-5 space-y-5">
                <ul class="text-sm divide-y space-y-3">
                    <ul class="flex justify-between ml-5 font-semibold border-b-secondary-800">
                        <li>البضاعة</li>
                        <li>الكمية</li>
                        <li>السعر</li>
                    </ul>
                    @forelse ($orders as $item)
                        @if ($item->product)
                            <li class="flex justify-between items-center space-x-10 pt-3">
                                <div class="flex-1 space-y-1">
                                    <div class="text-sm flex justify-between space-x-1">
                                        <p>{{ $item->product->name }}</p>
                                        <p>{{ $item->qty }}</p>
                                        <i class="mdi mdi-close"></i>
                                    </div>
                                </div>
                                <p class="text-sm font-black leading-none text-gray-800 dark:text-white">
                                    ${{ $item->product->original_price * $item->qty }}
                                </p>
                                @php
                                    $totalPrice += $item->product->original_price * $item->qty;
                                @endphp
                            </li>
                        @endif
                    @empty
                    @endforelse
                    <div class="flex justify-between pl-3 items-center pt-3">
                        <p class="font-bold">الاجمالي</p>
                        <p class="text-md font-bold leading-normal text-right text-gray-800 dark:text-white">
                            {{ $totalPrice }}
                            <span class="pr-1">ريال</span>
                        </p>
                    </div>
                </ul>
                <div class="rounded-lg bg-gray-50 p-3">
                    <form class="w-full" wire:ignore>
                        <div
                            class="h-10 px-3 flex items-center border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm bg-white mb-3">
                            <div class="flex-1 text-sm text-gray-500" id="card-element"> </div>
                        </div>
                        <p id="card-error" role="alert" class="mb-3 text-sm text-red-500"></p>
                        <p class="mb-3 text-md font-bold text-gray-500">طرق الدفع المتاحة</p>
                        <p class="mb-3 text-sm text-indigo-500 mr-2">-عند استلام البضاعة</p>
                        <x-button red type="button" wire:click="addToCartOrder"
                            class="justify-center rounded-full w-full py-3">
                            <div class="spinner hidden" id="spinner">
                                تاكيد الطلب...
                            </div>
                            <span id="button-text">تأكيد الطلب</span>
                        </x-button>
                        <p class="mb-3 text-sm text-indigo-500 pt-4">- أو عن بطاقات الدفع الالكترونية</p>
                        <x-button primary type="button" x-on:click="submitPayment"
                            class="justify-center rounded-full w-full py-3">
                            <div class="spinner hidden" id="spinner">
                                PayPal
                            </div>
                            <span id="button-text" class="text-lg font-bold">PayPal</span>
                        </x-button>
                    </form>
                </div>

                @if (App::environment('local'))
                    {{-- <x-test-payment-cards/> --}}
                @endif
            </div>
        </div>
    </div>
</div>
