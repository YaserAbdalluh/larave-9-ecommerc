<div class="w-11/12 text-gray-300 lg:w-5/12 mx-auto">
    
    <section class="pt-20 w-full pb-10 lg:pt-[150px] lg:pb-20">
        <div
            class="container border-2  border-cyan-100 dark:border-gray-600 p-4 rounded-md bg-gray-50 shadow-md dark:bg-slate-700">
            <div class="-mx-4 flex {{ $currentStep != 1 ? 'hidden' : '' }} flex-wrap">
                <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-10">
                        <x-input right-icon="user" wire:model="store_name" label="اسم المحل"
                            class="w-full rounded-lg border-[1.5px] border-primary py-2 dark:text-gray-300 px-5 dark:bg-gray-600 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"
                            placeholder=" اسم المحل " />
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-10">
                        <x-input wire:model="product_type" label="نوع البضاعة " placeholder="أدخل نوع البضاعة"
                            class="w-full rounded-lg dark:text-gray-300 border-[1.5px] dark:bg-gray-600 border-form-stroke py-2 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-full">
                    <div class="mb-10">
                        <x-input
                            class="w-full rounded-lg border-[1.5px] border-form-stroke py-2 px-5 font-medium text-body-color dark:text-gray-300 dark:bg-gray-600 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"
                            label="العنوان أو الموقع" wire:model="location" />
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-10">
                        <x-inputs.phone wire:model="phone" label="رقم الهاتف"
                            class="w-full rounded-lg border-[1.5px] mt-4 border-form-stroke py-2 px-5 font-medium text-body-color dark:text-gray-300 dark:bg-gray-600 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    </div>
                </div>
            </div>
            <x-button rounded indigo wire:click="firstStepSubmit" class="mr-3 {{ $currentStep != 1 ? 'hidden' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </x-button>
            <div class="-mx-4 grid {{ $currentStep != 2 ? 'hidden' : '' }} flex-wrap">

                <x-button rounded indigo wire:click="submitForm" class="m-3">
                    دخول
                </x-button>
                <x-button outline cyan rounded wire:click="back(1)" class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </x-button>
            </div>
        </div>
    </section>
    <!-- ====== Form Elements Section End -->
</div>

