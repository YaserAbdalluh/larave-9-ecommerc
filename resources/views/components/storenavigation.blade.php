<div class="w-full text-gray-200 bg-gray-700 dark:text-gray-200 ">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen px-4  md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center my-4 justify-between pl-4">
            <a href="/"
                class="text-lg font-bold text-gray-200 uppercase  rounded-sm dark:text-white focus:outline-none focus:shadow-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <!-- Cart -->
            <div class="mr-10 flow-root lg:ml-6 hover:text-blue-100">
                <a href="{{ route('shopping-cart') }}" class="group -m-2 p-2 flex items-center">
                    <!-- Heroicon name: outline/shopping-bag -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-14" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        class="ml-2 top-2 lg:right-20 bg-red-100 absolute font-bold text-red-500 rounded-full px-1 group-hover:text-red-800"
                        style="font-size: 23px">@livewire('frontend.cart.cart-count')</span>
                    <span class="sr-only">items in cart, view bag</span>
                </a>
            </div>
            <div>
                <x-jet-dropdown align="left" width="48">
                    @if (Route::has('login'))
                        <x-slot name="trigger">
                            @auth
                                <div>
                                    <a class="flex py-1 px-8 text-gray-300 text-lg font-bold hover:bg-gray-600 border-gray-300 border-solid hover:text-primary lg:ml-12 lg:inline-flex"
                                        href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        {{ Auth::user()->name }}</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('تسجيل الخروج') }}
                                </x-jet-dropdown-link>
                            @else
                                <div>
                                    <a class="flex py-1 text-gray-400 dark:text-gray-300 hover:bg-gray-600 rounded-lg font-semibold text-lg  hover:text-primary lg:ml-12 lg:inline-flex"
                                        href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        تسجيل دخول
                                    </a>
                                </div>
                            @endauth
                        </x-slot>
                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('تسجيل الخروج') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    @endif
                </x-jet-dropdown>

                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    </x-slot>
                    <x-slot name="content">
                    </x-slot>
                </x-jet-dropdown>
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>
                    <x-slot name="content">
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('تسجيل الخروج') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
            <button
                class="absolute lg:hidden left-4 top-8 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 "
                @click="open = !open" :class="open && 'navbarTogglerActive'" id="navbarToggler">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
            </button>
        </div>
        <div>
            <a class="flex py-2 text-gray-300  font-semibold text-lg  hover:text-primary lg:ml-12 lg:inline-flex"
                href="{{ url('customer-seller') }}">Seller</a>
        </div>

        <div class="flex justify-center md:ml-28 mt-3 item-center lg:w-1/2 lg:mt-3 mb-3">
            <button
                class="btn px-6 py-2.5 bg-yellow-500 rounded-r-lg  text-white font-medium text-xs leading-tight uppercase shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                type="button" id="button-addon2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                    </path>
                </svg>
            </button>
            <input type="search"
                class="flex-auto min-w-0 block w-full rounded-l-lg px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                placeholder="Search" aria-label="Search" aria-describedby="button-addon2">

        </div>

        <nav :class="!open && ''" id="navbarCollapse"
            class=" left-4 top-40 w-full ml-5 rounded-lg divide-x-2 max-w-[250px] border-y-rounded-lg px-6 shadow-lg lg:static lg:block lg:w-96 lg:max-w-1/2 ">
            <ul class="block lg:flex justify-end">
                @if (Route::has('login'))
                    @auth
                        <div class="flex">
                            <a class="pt-2 text-gray-200 text-lg font-bold hover:text-gray-400 lg:ml-12 lg:inline-flex"
                                href="{{ route('list-item') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ Auth::user()->name }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <div class="text-lg dark:bg-gray-600 font-bold text-gray-200 "
                                    href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('تسجيل الخروج') }}
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="flex">
                            <li>
                                <a class="flex lg:hidden py-2 ml-2 text-gray-200  font-semibold text-lg  hover:text-primary lg:ml-12"
                                    href="{{ route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    تسجيل دخول
                                </a>
                            </li>
                            <div class="border-r px-2 border-zinc-400 "></div>
                            @if (Route::has('register'))
                                <li>
                                    <a class="flex py-2 text-gray-300  font-semibold text-lg  hover:text-primary lg:ml-12 lg:inline-flex"
                                        href="{{ route('register') }}">
                                        انشاء حساب
                                    </a>
                                </li>
                            @endif
                        </div>
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
</div>
