<div class="min-h-screen bg-gray-50 dark:bg-slate-800 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="flex justify-center">
        <a href="{{ url('seller/customer-login') }}"
            class="inline-flex font-semibold text-lg  py-2 px-5 dark:bg-slate-500 bg-slate-200 hover:bg-slate-600 rounded-full"
            aria-current="true">
            {{ __('البائع') }}
        </a>
    </div>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">

        <div class="bg-white dark:bg-slate-700 py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email" class="block pb-2 text-sm font-medium leading-5 dark:text-gray-200 text-gray-700">
                            عنوان البريد الاكتروني
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input name="email" id="email" type="email" :value="old('email')" required
                                autofocus
                                class="@error('email') border-red-500 @enderror appearance-none block w-full px-3 py-2 border rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('email')
                            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block pb-2 text-sm font-medium leading-5 dark:text-gray-200 text-gray-700">
                            كلمة المرور
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input name="password" id="password" type="password" required
                                class="@error('password') border-red-500 @enderror appearance-none block w-full px-3 py-2 border rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('password')
                            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                تسجيل الدخول
                            </button>
                        </span>
                    </div>
                </form>

                <div class="mt-6">
                    <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                        <a href="/seller/customer-register"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            لا يوجد لديك حساب بائع؟
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
