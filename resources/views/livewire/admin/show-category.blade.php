<div class="px-6">

    <div class="py-4 space-y-4">
        <!-- Top Bar -->
        <div class="flex justify-between">

            <div class="space-x-2 flex items-center">
                <x-jet-button wire:click="createShowModal">
                    <x-icon.plus></x-icon.plus>
                    {{ __('جديد') }}
                </x-jet-button>
            </div>
        </div>
        <div>
            <div>
                <form class="group relative">
                    <svg width="20" height="20" fill="currentColor"
                        class="absolute right-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500"
                        aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                    </svg>
                    <input wire:model.defer="search"
                        class="focus:ring-2 text-left w-auto focus:ring-blue-500 focus:outline-none appearance-none text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm"
                        type="text" aria-label="Filter projects" placeholder="بحث">
                </form>
                {{--
                <x-input wire:model="search" type="search" class="w-auto" placeholder=" بحث" /> --}}
            </div>
        </div>
        <div>
            <x-modal blur wire:model="modalFormVisible">
                <x-card title="إضافة القسم">
                <x-errors dir="ltr" />
                    <div class="flex flex-wrap-mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-1 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="name">
                                {{ __('اسم الصنف') }}
                            </label>
                            <input wire:model.debounce.800ms="name"
                                class="appearance-none block w-full text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="slug" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="slug">
                                {{ __(' القسم') }}
                            </label>
                            <input wire:model="slug"
                                class="appearance-none block w-full text-gray-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="slug" type="text" placeholder="">
                        </div>
                    </div>
                    <x-label class="mb-2 mt-4" for="">أضف صورة</x-label>
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress" class="
                        h-28 w-24 mt-3 flex justify-center px-6 pt-5 pb-6 border-2 
                        border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                        @click="$refs.fileInput.click()">
                        <x-icon name="cloud-upload" class="w-12 h-12 text-blue-600" />
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}">
                        @endif
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                        <input x-ref="fileInput" type="file" wire:model="image" class="hidden" />
                    </div>
                    <x-slot name="footer">
                        @if ($catId)
                        <div class="flex justify-end gap-x-4">
                            <x-button flat label="الغاء" x-on:click="close" />

                            <x-button wire:click="updateCat" label="تحديث" />
                        </div>
                        @else
                        <div class="flex justify-end gap-x-4">
                            <x-button flat label="الغاء" x-on:click="close" />

                            <x-button wire:click="save" label="تأكيد" />
                        </div>
                        @endif
                    </x-slot>
                </x-card>
            </x-modal>
        </div>

        <div class="flex-col space-y-4">
            <table class="table-auto">
                <thead>
                    <tr class="bg-blue-600 rounded-lg text-gray-200">
                        <th class="w-3 px-6 py-2">ID</th>
                        <th class="w-2 px-6 py-2">حذف</th>
                        <th class="w-2 px-6 py-2">تحرير</th>
                        <th class="w-1/6 px-6 py-2">الاسم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td class="border-y px-6 py-2">{{ $item->id }}</td>
                        <td class="border-y px-6 py-2">
                            <button>
                                <x-icon.trash wire:click='deleteCat({{ $item->id }})' class=" text-red-500">
                                </x-icon.trash>
                                {{-- {{ $item->id }} --}}
                            </button>
                        </td>
                        <td class="border-y px-6 py-2">
                            <BUtton wire:click="editShowModal({{ $item->id }})"
                                class="cursor-pointer hover:opacity-30 p-3 rounded-lg bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </BUtton>
                        </td>
                        <td class="border-y px-6 py-2">{{ $item->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <div class="m-3 p-3">
                    {{ $categories->links() }}
                </div>
            </table>
        </div>
    </div>
</div>