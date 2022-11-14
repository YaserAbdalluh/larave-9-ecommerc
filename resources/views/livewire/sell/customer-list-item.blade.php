<div class="mt-20">
    <div class="sm:px-6 w-full pb-5">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <x-button.circle lg primary class="m-5 fixed top-44 shadow-md">
            <a href="{{ url('/seller/product') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        </x-button.circle>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-8">
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <div>
                        <thead>
                            <tr class="focus:outline-none font-bold h-12 border-b border-gray-400 rounded">
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            id
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            الاسم
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            السعر
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            الكمية
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            التاريخ
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="mr-5">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            الصورة
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            تحرير
                                        </div>
                                    </div>
                                </td>
                                <td class="focus:outline-none h-12 rounded">
                                    <div class="">
                                        <div class="rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            حذف
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product as $item)
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <td>
                                    <div class="mr-5">
                                        <div
                                            class="bg-gray-200 rounded-sm w-7 h-7 flex flex-shrink-0 justify-center items-center">
                                            {{ $item->id }}
                                        </div>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-3">
                                        <p class="flex text-base font-medium leading-none mr-2">
                                            {{ $item->name }}
                                            <x-icon name="link" class="h-4 w-4 text-blue-600" />
                                        </p>
                                    </div>
                                </td>
                                <td class="pl-3">
                                    <div class="flex items-center">
                                        <p class="text-sm leading-none text-gray-600 ml-2">
                                            {{ $item->original_price }} ريال
                                        </p>
                                    </div>
                                </td>
                                <td class="px-5">
                                    <div class="flex items-center">
                                        <x-icon name="calculator" class="h-6 w-6" />
                                        <p class="text-sm leading-none text-gray-600 ml-2">
                                        <div>
                                            {{ $item->qty }}
                                        </div>
                                        </p>
                                    </div>
                                </td>
                                <td class="pr-5">
                                    <button
                                        class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                        <div>
                                            {{ $item->created_at }}
                                        </div>
                                    </button>
                                </td>
                                <td class="">
                                    <button
                                        class="focus:ring-2 h-20 w-20  focus:ring-red-300 text-sm leading-none text-gray-600 rounded hover:bg-gray-200 focus:outline-none">
                                        <img src="{{ asset('storage/products/' . $item->photo) }}" alt="">
                                    </button>
                                </td>
                                <td>
                                    <div class="relative px-1 pt-2">
                                        <div tabindex="0" wire:click="editShowModal({{ $item->id }})"
                                            class="focus:outline-none flex justify-center text-blue-400 bg-indigo-100 py-1 rounded-md cursor-pointer hover:text-blue-500">
                                            <x-icon name="pencil-alt" class="h-6 w-6" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="relative px-1 pt-2">
                                        <div tabindex="0" wire:click='deleteItem({{ $item->id }})'
                                            class="focus:outline-none flex justify-center text-red-400 bg-red-100 py-1 rounded-md cursor-pointer hover:text-blue-500">
                                            <x-icon name="archive" class="h-6 w-6" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="h-3"></tr>
                            @empty
                            <p>لا توجد بضاعة حاليا انقر لاضافة بضاعة</p>
                            @endforelse
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
        <x-modal.card title="تعديل المنتج" blur wire:model.defer="modalFormVisible">
            <x-errors class="mx-3" />
            <select
                    class="px-3 py-2 mb-3 border animate-pulse  border-blue-300 shadow rounded-md p-4 max-w-sm w-1/2 mx-auto"
                    wire:model.defer="cate_id">
                    <option value="" dir="ltr">اختر الصنف</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}" dir="ltr">{{ $item->name }}</option>
                    @endforeach
                </select>
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                <x-input label="اسم المنتج" placeholder="الاسم" wire:model.defer="name" />
                <div class="col-span-2 flex justify-around sm:col-span-2">
                    <x-input label="رقم الهاتف" placeholder="" wire:model.defer="phone" />
                    <x-input label="العنوان" placeholder="" wire:model.defer="location" />
                </div>
                <div class="w-full px-3 py-3">
                    <div class="w-full" wire:ignore>
                        <x-textarea  label="الوصف" wire:model="description">
                        </x-textarea>
                        </div>
                    @error('description')
                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div
                    class="col-span-1 sm:col-span-2 cursor-pointer bg-gray-100 rounded-xl shadow-md flex items-center justify-center">
                    <div class="flex flex-wrap-mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-input type="number" label="الكمية" wire:model.defer="qty" />
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-input type="number" label="السعر" wire:model.defer="selling_price" />
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-input type="number" label="سعر الاصلي" wire:model.defer="original_price" />
                        </div>
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <div class="flex">
                        <x-button flat label="الغاء" x-on:click="close" />
                        <x-button primary label="تحديث" wire:click="updateProduct" />
                    </div>
                </div>
            </x-slot>
        </x-modal.card>
    </div>

    <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }
    </style>
    <script>
        function dropdownFunction(element) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
        list.classList.add("target");
        for (i = 0; i < dropdowns.length; i++) { if (!dropdowns[i].classList.contains("target")) {
            dropdowns[i].classList.add("hidden"); } } list.classList.toggle("hidden"); } 
    </script>
</div>
