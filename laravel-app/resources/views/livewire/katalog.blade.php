<div>
    <div class="w-full flex items-center justify-center my-8 h-96">
        <div class="bg-gray-900 rounded-lg shadow-lg flex-col w-5/6 lg:max-w-xl h-96 overflow-y-auto">
            <div class="px-5 py-3 mb-3 text-2xl font-bold text-gray-100 flex flex-row justify-between items-center mt-4">
                <div class="">Kategori</div>

            </div>
            <ul class="flex-col">
                @foreach ($jenis as $item)
                    <li class="flex-col mb-5 cursor-pointer"  >
                        <a class="px-5 text-gray-600 text-xs flex flex-row justify-between items-center" href="{{route('shop', ['jenis'=> $item->nama_jenis])}}">
                            <p class="text-gray-100 text-base">{{ $item->nama_jenis }}</p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                                  </svg>

                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
