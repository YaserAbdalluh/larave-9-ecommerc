<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
        
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('البريد الاكتروني') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('كلمة المرور') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="mr-1 text-sm text-gray-600">{{ __('تحقق') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-start mt-4">
                <button
                    class="ml-0 w-full flex  mx-1 justify-center py-2 px-1 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    {{ __('تسجيل الدخول') }}
                </button>
            </div>

            {{-- Login with Facebook --}}
            <div class="flex items-center  justify-between mt-6">
                <a class="btn text-lg font-semibold mx-1" href="{{ route('facebook.login') }}"
                    style="background: #4768c4; color: WHITE; padding: 10px; width: 50%; text-align: center; border-radius:4px;  display: block;">
                    facebook
                </a>
                <a class="btn text-lg font-semibold" href="{{ url('auth/google') }}"
                    style="background: #d48b1d; color: WHITE; padding: 10px; width: 50%; text-align: center; border-radius:4px;  display: block;">
                    google
                </a>
            </div>
            <div class="mt-5">
                @if (Route::has('password.request'))
                    <a class="text-md font-bold text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                        {{ __('نسيت كلمة المرور؟') }}
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
