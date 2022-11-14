<x-guest-layout>
    <section class=" pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                @forelse ($products as $item)
                    <div class="px-2 md:w-1/3 sm:w-1/2 lg:w-1/4">
                        <div
                            class="mx-4 mb-10 lg:max-w-[380px] dark:border-gray-800 border dark:bg-gray-800 border-gray-100 p-4 border-solid">
                            <div class="mb-8 overflow-hidden rounded-lg">
                                <a href="{{ url('/product-overview/'.  $item->id) }}" class=""
                                    class="hover:opacity-60">
                                    <img src="{{ asset('storage/products/' . $item->photo) }}" alt="image"
                                        class="w-auto h-full" />
                            </div>
                            </a>
                            <div>
                                <div class="flex justify-between items-center">
                                    <p>${{ $item->original_price }}</p>
                                    <div class="flex text-yellow-500 space-x-2">
                                        <svg width="16" height="20" fill="currentColor">
                                            <path
                                                d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                        </svg>
                                        <svg width="16" height="20" fill="currentColor">
                                            <path
                                                d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                        </svg>
                                        <svg width="16" height="20" fill="currentColor">
                                            <path
                                                d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                        </svg>
                                        <svg width="16" height="20" fill="currentColor">
                                            <path
                                                d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                        </svg>
                                        <svg width="16" height="20" fill="currentColor">
                                            <path
                                                d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                        </svg>
                                    </div>
                                    <p>${{ $item->selling_price }}</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <x-button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                        </svg>
                                    </x-button>
                                    <x-button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </x-button>
                                </div>
                                <h3
                                    class="my-4 inline-block text-xl dark:text-gray-400 font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    {{ $item->name }}
                                </h3>
                                <p class="text-base text-body-color">
                                    {{-- {{ $item->description }} --}}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="h-screen flex flex-wrap justify-center">
                        <div class="w-full px-4">
                            <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                                <span class="mb-2 block text-lg font-semibold text-primary">
                                    لايوجد بضاعة لهذا المنتج
                                </span>
                                <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                                    {{ $category->name }}
                                </h2>
                                <p class="text-base text-body-color">
                                    {{-- There are many variations of passages of Lorem Ipsum available
                                    but the majority have suffered alteration in some form. --}}
                                </p>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-guest-layout>

<x-footer />
