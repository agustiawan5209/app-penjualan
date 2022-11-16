<div class="w-full">
    <section class="relative pb-12 bg-gray-800 hero-shop grid grid-cols-1 md:grid-cols-5 gap-4">
        <div class="absolute left-0 bottom-0 pointer-events-none hidden lg:block owl fade_in" aria-hidden="true">
            <svg width="428" height="328" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient cx="35.542%" cy="34.553%" fx="35.542%" fy="34.553%" r="96.031%"
                        id="ni-a">
                        <stop stop-color="#DFDFDF" offset="0%"></stop>
                        <stop stop-color="#4C4C4C" offset="44.317%"></stop>
                        <stop stop-color="#333" offset="100%"></stop>
                    </radialGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g fill="#FFF">
                        <ellipse fill-opacity=".04" cx="185" cy="15.576" rx="16" ry="15.576">
                        </ellipse>
                        <ellipse fill-opacity=".24" cx="100" cy="68.402" rx="24" ry="23.364">
                        </ellipse>
                        <ellipse fill-opacity=".12" cx="29" cy="251.231" rx="29" ry="28.231">
                        </ellipse>
                        <ellipse fill-opacity=".64" cx="29" cy="251.231" rx="8" ry="7.788">
                        </ellipse>
                        <ellipse fill-opacity=".12" cx="342" cy="31.303" rx="8" ry="7.788">
                        </ellipse>
                        <ellipse fill-opacity=".48" cx="62" cy="126.811" rx="2" ry="1.947">
                        </ellipse>
                        <ellipse fill-opacity=".12" cx="78" cy="7.072" rx="2" ry="1.947">
                        </ellipse>
                        <ellipse fill-opacity=".64" cx="185" cy="15.576" rx="6" ry="5.841">
                        </ellipse>
                    </g>
                    <circle fill="url(#ni-a)" cx="276" cy="237" r="200"></circle>
                </g>
            </svg>
        </div>
        <div class="col-span-1 z-30 wow fadeInLeft">
            @include('livewire.katalog')
        </div>
        <div class="container mx-auto px-4 col-span-4">
            <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                <div class="px-4 relative w-full lg:w-8/12 text-left">
                    <h6 class="mb-2 text-lg font-bold uppercase text-white">Produk Kami</h6>
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-5 gap-2 -mx-4 wow fadeInDown">
                @foreach ($produk as $item)
                    @if ($item->stock <= 0)
                        <div class="bg-slate-800 col-span-1 relative shadow overflow-hidden  cursor-not-allowed">
                        @else
                            <div class="bg-slate-800 col-span-1 relative shadow overflow-hidden  cursor-pointer"
                                wire:click='ShowDetail({{ $item->id }})'>
                    @endif
                    @if ($item->diskon->count() > 0)
                        @foreach ($item->diskon as $diskon)
                            <div
                                class="absolute font-bold  text-white px-2 py-1 bg-slate-600 rounded-r-sm shadow-lg shadow-white">
                                <span class="text-sm">Diskon {{ $diskon->jumlah_diskon }}%</span>
                            </div>
                        @endforeach
                    @endif
                    <img src="{{ asset('upload/' . $item->gambar) }}"
                        alt="AGLAONEMA RED ANJAMANI / AGLONEMA RED ANJAMANI MURMER">
                    <div class="pt-3 pb-4 px-2 group-hover:bg-gray-900">
                        @if ($item->stock <= 0)
                            <span class="text-red-500 font-bold">Stok Habis</span>
                            <div class="text-sm overflow-hidden h-8 leading-4 text-ellipsis line-through">
                                {{ $item->nama_barang }} </div>
                        @else
                            <div class="text-sm overflow-hidden h-8 leading-4">{{ $item->nama_barang }} </div>
                        @endif
                        <div class="flex justify-between items-center">
                            <div class="text-grabg-slate-600">
                                <span class="text-sm">Rp</span><span
                                    class="text-md font-semibold">{{ number_format($item->harga, 0, 2) }}</span>
                                <br>
                                <span class="text-xs">Kategori : </span><span
                                    class="text-sm">
                                @if ($item->katalog == null)
                                    ----
                                @else
                                {{ $item->katalog->nama_katalog }}
                                @endif</span>
                            </div>
                            <div class="text-sm text-gray-600">Stok {{ $item->stock }}</div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </section>
    <div class="absolute top-0 left-0 z-[2] w-full h-full">
        <div id="particles-1" class="particles"></div>
    </div>
</div>
