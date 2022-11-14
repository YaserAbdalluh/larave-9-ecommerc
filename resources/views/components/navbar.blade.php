<div x-data="{ openMenu: false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'" class="dark:bg-slate-600">
    <header class="items-center dark:bg-slate-600 dark:text-gray-300 bg-gray-50 shadow-md py-3 px-4">
        <!-- Logo -->
        {{--
        <x-jet-authentication-card-logo /> --}}
        <div class="flex-row flex justify-between">
            {{-- cart --}}
            <div class="mr-3 flex justify-between lg:ml-10 p-1 rounded-md border-solid">
                <a href="{{ route('shopping-cart') }}" class="group  -m-1 rounded-md px-1 flex items-center">
                    <!-- Heroicon name: outline/shopping-bag -->
                    <x-icon name="shopping-cart" class="w-10 h-10" />
                    <span
                        class="ml-2 top-2 lg:right-22 bg-red-100 absolute font-bold text-red-500 rounded-full px-1 group-hover:text-red-800"
                        style="font-size: 23px">@livewire('frontend.cart.cart-count')</span>
                    <span class="sr-only">items in cart, view bag</span>
                </a>
                <nav class="hidden md:flex font-semibold  p-1 rounded-md">
                    <x-dropdown align="right">
                        @if (Route::has('login'))
                        @auth
                        <x-slot name="trigger">
                            <div class="flex text-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                                {{ Auth::user()->name }}
                            </div>
                        </x-slot>
                        <a href="{{ route('list-item') }}" class="text-md" icon="user"
                            label="{{ Auth::user()->name }}" />
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown.item href="{{ route('logout') }}" @click.prevent="$root.submit();" icon="logout"
                                separator label="{{ __('تسجيل الخروج') }}" />
                        </form>
                        <x-dropdown.item href="{{ url('seller/customer-register') }}" separator icon="bookmark"
                            class="text-md" label="{{ __('البائع') }}:{{ Auth::user()->name }}">
                        </x-dropdown.item>
                        @else
                        <x-slot name="trigger">
                            <div class="flex text-md border-2 p-1 hover:border-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                                {{ __('تسجيل دخول') }}
                            </div>
                        </x-slot>
                        <x-dropdown.item href="{{ route('login') }}" icon="login" class="text-md"
                            label="{{ __('تسجيل دخول') }}" />

                        @if (Route::has('register'))
                        <x-dropdown.item href="{{ route('register') }}" icon="user" class="text-md" separator
                            label="{{ __('انشاء حساب') }}" />
                        @endif
                        <x-dropdown.item href="{{ url('seller/customer-register') }}" separator icon="bookmark"
                            class="text-md" label="{{ __('البائع') }}">
                        </x-dropdown.item>
                        @endauth
                        @endif
                    </x-dropdown>
                </nav>
                <div class="sticky text-gray-200 mt-1 mx-2 ">
                    <x-toggletheme />
                </div>
            </div>
            <div class="relative flex items-start w-full justify-center">
                <div class="relative max-w-2xl w-full bg-dark-700 px-8 pb-1">
                    <div
                        class="relative w-full border-b border-gray-400 border-opacity-50 overflow-hidden transition-all duration-500 focus-within:border-gray-900">
                        <div>
                            <input
                                class="flex-1 w-full pr-8  py-1 tracking-wide dark:text-gray-300 text-gray-500 placeholder-blue-500 bg-transparent focus:outline-none"
                                placeholder="Search" aria-label="Search in the documentation">
                            <svg class="absolute inset-y-0 right-0 mt-1 w-5 h-5 dark:text-gray-300 text-gray-500 pointer-events-none"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row flex justify-start">
                <div class="mt-1 cursor-pointer hover:text-red-300 mx-4">
                </div>
                <!-- Mobile Menu Toggle -->
                <a href="/" class="text-lg font-bold  p-1 rounded-md">TaizShop</a>

                <button class="flex flex-col  p-1 items-center align-middle" @click="openMenu = !openMenu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Main Navigations -->
    </header>
    {{--
    <!-- Pop Out Navigation --> backdrop-blur-lg --}}
    <nav class="fixed top-0 right-0 bottom-0 left-0 z-10" :class="openMenu ? 'visible' : 'invisible'" x-cloak>
        <div class="absolute flex inset-0 bg-gray-600 opacity-70"></div>
        <!-- UL Links -->
        <ul class="absolute flex flex-col lg:w-1/5 top-0 right-0 bottom-0 w-2/3 py-4  bg-white dark:bg-slate-700 dark:text-gray-200 drop-shadow-2xl z-10 transition-all"
            :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
            <div class="flex-1 text-lg">
                @if (Route::has('login'))
                @auth
                <li class="border-b border-inherit">
                    <a href="{{ url('/user-profile') }}" class="block p-4">
                        <div class="flex justify-center text-md">
                            @if (Route::has('login'))
                            @auth
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                                class="rounded-full h-20 w-20 object-cover">
                            @else
                            <x-icon name="user" class="w-14 h-14 rounded-full hover:bg-indigo-200" />
                            @endauth
                            @endif
                        </div>
                        <p class="flex justify-center hover:text-blue-400 py-1">
                            {{ Auth::user()->name }}
                        </p>
                    </a>
                </li>
                <li class="border-b border-inherit">
                    <a href="{{ url('seller/customer-register') }}" class="block p-4 hover:bg-indigo-200" aria-current="true">
                        <div class="flex text-md px-3">
                            <x-icon name="bookmark" class="w-7 h-7" />
                            <p class="pr-2">{{ __('البائع') }}</p>
                        </div>
                    </a>
                </li>
                <li class="border-b border-inherit">
                    <a href="{{ route('list-item') }}" class="block p-4 hover:bg-indigo-200">
                        <div class="flex text-md px-3">
                            <x-icon name="user" class="w-7 h-7" />
                            <p class="pr-2">{{ Auth::user()->name }}</p>
                        </div>
                    </a>
                </li>
                <li class="border-b border-inherit hover:bg-indigo-200">
                    <div class="flex">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block p-4" separator>
                                <div class="flex text-md px-3">
                                    <x-icon name="logout" class="w-7 h-7" />
                                    <p class="pr-2">{{ __('تسجيل الخروج') }}</p>
                                </div>
                            </a>
                        </form>
                    </div>
                </li>
                @else
                <li class="border-b border-inherit">
                    <a href="{{ route('login') }}" class="block p-4">
                        <div class="flex justify-center text-md">
                            <x-icon name="user" class="w-14 h-14 rounded-full hover:bg-indigo-200" />
                        </div>
                        <p class="flex justify-center hover:text-blue-400 py-1">{{ __('الملف الشخصي') }}</p>
                    </a>
                </li>
                <li class="border-b border-inherit">
                    <a href="{{ route('login') }}" class="block p-4 hover:bg-indigo-200">
                        <div class="flex text-md px-3">
                            <x-icon name="login" class="w-7 h-7" />
                            <p class="pr-2">{{ __('تسجيل دخول') }}</p>
                        </div>
                    </a>
                </li>
                <li class="border-b border-inherit">
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block p-4 hover:bg-indigo-200" separator>
                        <div class="flex text-md px-3">
                            <x-icon name="plus" class="w-7 h-7" />
                            <p class="pr-2">{{ __('انشاء حساب') }}</p>
                        </div>
                    </a>
                    @endif
                </li>
                <li class="border-b border-inherit">
                    <a href="{{ url('seller/customer-register') }}" class="block p-4 hover:bg-indigo-200">
                        <div class="flex text-md px-3">
                            <x-icon name="bookmark" class="w-7 h-7" />
                            <p class="pr-2">{{ __('البائع') }}</p>
                        </div>
                    </a>
                    
                </li>
                @endauth
                @endif
            </div>

            <div class="flex-shrink-0 flex text-lg font-bold border-t border-indigo-700 p-4">
                <div class="flex-shrink-0 w-10/12 group block">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-sm leading-5 dark:text-gray-200 font-bold text-gray-700">
                                Dark Mode
                            </p>

                            <p
                                class="text-xs leading-4 font-medium text-indigo-300 group-hover:text-indigo-100 transition ease-in-out duration-150">
                                {{-- View profile --}}
                            </p>
                        </div>
                    </div>
                    <div>
                        @if (Route::has('login'))@auth
                        <img class="inline-block h-9 w-9 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}">
                        @endauth
                        @endif
                    </div>
                </div>
                <div class="sticky text-gray-200 ">
                    <x-toggletheme />
                </div>
            </div>
        </ul>
        <!-- Close Button -->
        <button class="absolute top-0 right-0 bottom-0 text-gray-50 cursor-default left-0"
            @click="openMenu = !openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </nav>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>