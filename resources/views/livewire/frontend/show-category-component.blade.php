<div class="bg-white dark:bg-slate-700">
    <div class="max-w-3xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-fit lg:px-24 dark:text-gray-200">
        <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($categories as $item)
                <div class="group bg-white dark:bg-gray-700 pt-0 pb-5 rounded-sm shadow-lg">
                    <a href="{{ url('/products/' . $item->id) }}" class="">
                        <div
                            class="w-full sm:pt-0 h-96 pb-0 aspect-w-1 aspect-h-1 overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ asset('storage/categories/' . $item->image) }}"
                                alt="Front of men&#039;s Basic Tee in black."
                                class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-center">
                            <div>
                                <h3 class=" text-gray-500 dark:text-gray-400 inline-block text-2xl font-semibold px-3">
                                    <span aria-hidden="true" class="inset-0"></span>
                                    {{ $item->name }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
