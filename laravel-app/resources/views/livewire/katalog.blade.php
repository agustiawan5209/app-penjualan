<div>
    <div class="w-full flex items-center justify-center my-8">
        <div class="bg-gray-900 rounded-lg shadow-lg flex-col w-5/6 lg:max-w-xl">
            <div class="px-5 py-3 mb-3 text-2xl font-bold text-gray-100 flex flex-row justify-between items-center mt-4">
                <div class="">Kategori</div>

            </div>
            <ul class="flex-col">
                @foreach ($jenis as $item)
                    <li class="flex-col mb-5" x-data="{ JenisItem: false }">
                        <div class="px-5 text-gray-600 text-xs flex flex-row justify-between items-center"
                            @click="JenisItem = ! JenisItem">
                            <p class="text-gray-100 text-base">{{ $item->nama_jenis }}</p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hover:text-gray-100"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </span>
                        </div>
                        @if ($item->katalog->count() > 0)
                            <div class="px-5 text-gray-300 text-sm" x-show="JenisItem" x-on:transition>
                                <ul>
                                    @foreach ($item->katalog as $item)
                                        <li class=" py-1 rounded border-gray-700">{{ $item->nama_katalog }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            @if ($jenis->count() > 0)
                <div class="px-5 py-2 text-blue-600 cursor-pointer hover:text-blue-500 mb-4 text-sm"
                    wire:click="showMore">
                    Tampilkan Lagi
                </div>
            @endif
        </div>
    </div>
</div>
