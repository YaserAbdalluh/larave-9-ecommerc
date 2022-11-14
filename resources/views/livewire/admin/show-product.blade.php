<div>
    <div class="p-5 justify-center sm:mx-64  md:grid   md:gap-6">
        {{-- <x-button wire:click="like" secondary label="like" /> --}}
        <form wire:submit.prevent="submit" class="sm:grid-cols-1 sm:grid md:grid md:grid-cols-1">
            <x-errors class="mx-3" />
            <div>
                {{-- <div class="border border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto">
                    <div class="animate-pulse flex space-x-4">
                      <div class="rounded-full bg-slate-200 h-10 w-10"></div>
                      <div class="flex-1 space-y-6 py-1">
                        <div class="h-2 bg-slate-200 rounded"></div>
                        <div class="space-y-3">
                          <div class="grid grid-cols-3 gap-4">
                            <div class="h-2 bg-slate-200 rounded col-span-2"></div>
                            <div class="h-2 bg-slate-200 rounded col-span-1"></div>
                          </div>
                          <div class="h-2 bg-slate-200 rounded"></div>
                        </div>
                      </div>
                    </div>
                </div> --}}
                <select
                    class="px-3 py-2 mb-3 border animate-pulse  border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto"
                    wire:model="cate_id">
                    <option value="" dir="ltr">اختر الصنف</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" dir="ltr">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-wrap-mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-input label="اسم المنتج" placeholder="الاسم" wire:model="name" />
                </div>
                {{-- <div class="w-full md:w-1/2 px-3">
                    <x-input label="الصنف" placeholder="اكتب الصنف" wire:model="status" />
                </div> --}}
            </div>
            <div class="flex flex-wrap px-3 -mx-3 mb-6">
                <div class="w-full px-3">
                    <x-textarea wire:model="description" label="الوصف" placeholder="اكتب الوصف" />
                </div>
            </div>
            {{-- <div class="flex mb-6 px-3">
                <x-inputs.currency label="Currency" placeholder="Currency" wire:model="currency" />
            </div> --}}
            <div class="flex flex-wrap-mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-input type="number" label="الكمية" wire:model="qty" />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-input type="number" label="السعر" wire:model="selling_price" />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-input type="number" label="سعر الاصلي" wire:model="original_price" />
                </div>
            </div>

            <x-label class="mb-2" for="">أضف صور</x-label>
            <div class="border-gray-200 p-3 border-2 border-solid sm:border rounded-md w-auto">
                <div class="">
                    <div class="flex">
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                            mt-1 h-28 w-24 flex justify-center px-6 pt-5 pb-6 border-2 
                            border-gray-300 border-dashed bg-gray-200 rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo" class="hidden" />
                        </div>
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                                mt-1 h-28 mx-2 w-24 flex justify-center px-6 pt-5 pb-6 border-2 
                                border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo1)
                                <img src="{{ $photo1->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo1" class="hidden" />
                        </div>
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                                mt-1 h-28 w-24 flex justify-center px-6 pt-5 pb-6 border-2 
                                border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo3)
                                <img src="{{ $photo3->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo3" class="hidden" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex">
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                            mt-1 h-28 w-24 flex justify-center px-6 pt-5 pb-6 border-2 
                            border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo2)
                                <img src="{{ $photo2->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo2" class="hidden" />
                        </div>
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                            mt-1 h-28 w-24 mx-2 flex justify-center px-6 pt-5 pb-6 border-2 
                            border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo4)
                                <img src="{{ $photo4->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo4" class="hidden" />
                        </div>
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                            class="
                            mt-1 h-28 w-24 flex justify-center px-6 pt-5 pb-6 border-2 
                            border-gray-300 border-dashed rounded-md space-y-1 hover:opacity-60 cursor-pointer"
                            @click="$refs.fileInput.click()">
                            <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @if ($photo5)
                                <img src="{{ $photo5->temporaryUrl() }}">
                            @endif
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <input x-ref="fileInput" type="file" wire:model="photo5" class="hidden" />
                        </div>
                    </div>
                </div>
            </div>
            {{-- submit button --}}
            <x-button amber label="تأكيد" type="submit" class="mt-3 px-3 sm:block w-full" />
        </form>
    </div>
</div>


{{-- <x-button label="Delete"
                x-on:confirm="{
                    title,
                    icon: 'warning',
                    method: 'delete',
                    params: 1
                }"
            /> --}}
