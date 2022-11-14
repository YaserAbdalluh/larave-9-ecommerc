<div>
    <div class="flex cat-links items-center py-3 font-bold mr-4">
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
                    <a href="{{ url('/products/' . $this->product->category->id) }}"
                        class="text-blue-500 transition hover:text-gray-500">
                        {{ $product->category->name }}
                    </a>
                </li>
                <li>
                    >
                </li>
                <li>
                    <a href="{{ url('/product-overview/' . $product->id) }}"
                        class="text-blue-500 transition hover:text-gray-500">
                        تفاصيل المنتج
                    </a>
                </li>
                <li>
                    >
                </li>
                <li>
                    <p class="text-blue-500 transition hover:text-gray-500">
                        {{ $this->product->name }}
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800">
        <div class="pt-6">
            <div
                class=" max-w-full mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-2 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">

                <!-- Options -->
                <div class="mt-4 mb-8 lg:mt-0 lg:row-span-3">
                    {{-- <h2 class="sr-only">Product information</h2> --}}
                    <h1
                        class="text-2xl font-bold mb-4 tracking-tight text-gray-900 dark:text-gray-400 sm:tracking-tight sm:text-3xl">
                        {{ $product->name }}
                    </h1>
                    <span class="flex">
                        <p class="text-md font-semibold"> اسم المحل:</p>
                        <span>{{ $product->store_name }}</span>
                    </span>
                    <!-- Reviews -->
                    <div class="mt-11">
                        <h3 class="sr-only"></h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <!-- Heroicon name: solid/star -->
                                <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <!-- Heroicon name: solid/star -->
                                <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <!-- Heroicon name: solid/star -->
                                <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <!-- Heroicon name: solid/star -->
                                <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <p class="sr-only">4 out of 5 stars</p>
                            <a href="#" class="ml-3 text-sm font-medium text-indigo-400 hover:text-indigo-500">117
                                reviews
                            </a>
                        </div>
                    </div>

                    <form class="mt-10">
                        <!-- Colors -->
                        <div>
                            <div class="flex justify-between">
                                <x-label class="mb-3 text-lg font-semibold">الكمية</x-label>
                                <x-label class="mb-3 text-lg font-semibold">السعر</x-label>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex mb-5">
                                    <x-button wire:click="incrementQty" wire:loading.attr="disabled">
                                        <x-icon.plus />
                                    </x-button>
                                    <x-input wire:model="count" value="{{ $this->count }}" readonly
                                        class="w-12 items-center" />
                                    <x-button wire:click="decrementQty">
                                        <x-icon name="minus" class="w-5 h-5" />
                                    </x-button>
                                </div>
                                <p class="tracking-tight text-3xl text-gray-900 dark:text-gray-400">
                                    {{ $product->selling_price }} ريال
                                </p>
                            </div>
                        </div>
                        <!-- Sizes -->

                        {{-- add to cart --}}
                        <x-button class="rounded-full mt-16" type="button" wire:loading.attr="disabled"
                            wire:click.prefetch="addToCart({{ $product->id }})" primary>
                            أضافة الى السلة
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </x-button>
                    </form>
                </div>
                <div class="app-figure" id="zoom-fig" wire:ignore>
                    <a id="Zoom-1" class="MagicZoom w-80"
                        title="Show your product in stunning detail with Magic Zoom."
                        href="{{ asset('storage/products/' . $product->photo) }}"
                        data-image="{{ asset('storage/products/' . $product->photo) }}">
                        <img src="{{ asset('storage/products/' . $product->photo) }}"
                            srcset="{{ asset('storage/products/' . $product->photo) }}" alt="" />
                    </a>
                    <div class="selectors">
                        <a class="mt-11" data-zoom-id="Zoom-1"
                            href="{{ asset('storage/products/' . $product->photo) }}"
                            data-image="{{ asset('storage/products/' . $product->photo) }}">
                            <img srcset="{{ asset('storage/products/' . $product->photo) }}"
                                src="{{ asset('storage/products/' . $product->photo) }}" />
                        </a>
                        <a data-zoom-id="Zoom-1" href="{{ asset('storage/images/image1/' . $product->photo1) }}"
                            data-image="{{ asset('storage/images/image1/' . $product->photo1) }}">
                            <img srcset="{{ asset('storage/images/image1/' . $product->photo1) }}"
                                src="{{ asset('storage/images/image1/' . $product->photo1) }}" />
                        </a>
                        <a data-zoom-id="Zoom-1" href="{{ asset('storage/images/image2/' . $product->photo2) }}"
                            data-image="{{ asset('storage/images/image2/' . $product->photo2) }}">
                            <img srcset="{{ asset('storage/images/image2/' . $product->photo2) }}"
                                src="{{ asset('storage/images/image2/' . $product->photo2) }}" />
                        </a>
                        <a data-zoom-id="Zoom-1" href="{{ asset('storage/images/image3/' . $product->photo3) }}?h=1400"
                            data-image="{{ asset('storage/images/image3/' . $product->photo3) }}?h=400"
                            data-zoom-image-2x="{{ asset('storage/images/image3/' . $product->photo3) }}?h=2800"
                            data-image-2x="{{ asset('storage/images/image3/' . $product->photo3) }}?h=800">
                            <img srcset="{{ asset('storage/images/image3/' . $product->photo3) }}?h=120 2x"
                                src="{{ asset('storage/images/image3/' . $product->photo3) }}" />
                        </a>
                        <a data-zoom-id="Zoom-1" href="{{ asset('storage/images/image4/' . $product->photo4) }}?h=1400"
                            data-image="{{ asset('storage/images/image4/' . $product->photo4) }}?h=400"
                            data-zoom-image-2x="{{ asset('storage/images/image4/' . $product->photo4) }}?h=2800"
                            data-image-2x="{{ asset('storage/images/image4/' . $product->photo4) }}?h=800">
                            <img srcset="{{ asset('storage/images/image4/' . $product->photo4) }}?h=120 2x"
                                src="{{ asset('storage/images/image4/' . $product->photo4) }}" />
                        </a>
                        <a data-zoom-id="Zoom-1" href="{{ asset('storage/images/image5/' . $product->photo5) }}"
                            data-image="{{ asset('storage/images/image5/' . $product->photo5) }}"
                            data-zoom-image-2x="{{ asset('storage/images/image5/' . $product->photo5) }}"
                            data-image-2x="{{ asset('storage/images/image5/' . $product->photo5) }}">
                            <img srcset="{{ asset('storage/images/image5/' . $product->photo5) }}"
                                src="{{ asset('storage/images/image5/' . $product->photo5) }}" />
                        </a>
                    </div>
                </div>
                <div class="lg:col-span-5 lg:border-r lg:border-gray-300 lg:pr-8">
                    <h1
                        class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-400 sm:tracking-tight sm:text-3xl">
                        تفاصيل المنتج
                    </h1>
                </div>
                <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <!-- Description and details -->
                    <div>
                        <h3 class="pb-4">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900 dark:text-gray-400">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-400">

                        </h3>

                        <div class="mt-4">
                            <ul role="list" class="pl-4 list-disc text-sm space-y-2">

                            </ul>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900 dark:text-gray-400">

                        </h2>

                        <div class="mt-4 space-y-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</div>
