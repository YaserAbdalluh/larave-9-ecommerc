<footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 divide-y divide-gray-300">
    {{-- @public --}}
    <div class="h-0"></div>
    <div class="py-8">
        <div class="flex flex-col md:flex-row lg:items-center lg:justify-between space-y-6 md:space-y-0">
            <div class="flex-1">
                <p class="font-medium">
                    {{-- {{ __('Get new templates in your inbox!') }} --}}
                </p>
                <p class="text-gray-500 text-xs">
                    {{-- {{ __('New templates or big discounts. No spam from us.') }} --}}
                </p>
            </div>
            <form class="flex space-x-2" method="POST" action="{{ route('login') }}">
                <div hidden>
                    @csrf
                </div>
                <div class="flex-1 md:w-64 mx-2">
                    <x-jet-input name="email" type="email" placeholder="Email address" class="w-full" required/>
                </div>
                <x-button indigo type="submit">
                    اشترك
                </x-button>
            </form>
        </div>
    </div>
    {{-- @endif --}}
    <nav class="py-4 flex justify-between">
        <ul class="text-xs text-gray-500 flex flex-wrap">
            <li class="my-2 mr-6 lg:mr-8">
                <a href="{{ route('shopping-cart') }}" class="transition text-blue-500 hover:text-blue-700">
                    السلة
                </a>
            </li>
            <li class="my-2 mr-6 lg:mr-8">
                <a href="#" class="transition hover:text-gray-800">
                    المساعدة
                </a>
            </li>
            <li class="my-2 mr-6 lg:mr-8">
                <a href="#" class="transition hover:text-gray-800">
                   خدمات العملاء
                </a>
            </li>
            <li class="my-2 mr-6 lg:mr-8">
                <a href="{{ route('register') }}" class="transition hover:text-gray-800">
                    تسجيل الدخول
                </a>
            </li>
        </ul>
        <p class="text-xs"> تواصل معنا : <span dir="ltr" class="font-bold">+967 772423450</span> </p>
        <p class="text-xs">Powered by <span class="font-bold">Yasser AbdAlluh</span> @copy {{ now() }}</p>
    </nav>
</footer>