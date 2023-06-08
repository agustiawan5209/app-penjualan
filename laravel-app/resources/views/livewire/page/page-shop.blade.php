<div>
    <div class="w-full">
        <section class="relative pb-12 bg-gray-100 pt-5 hero-shop grid gap-4 grid-cols-1 md:grid-cols-5">
            <div class="col-span-1">
                @include('livewire.katalog')
            </div>
            <div class="container mx-auto px-4 col-span-4">
                <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                    <div class="px-4 relative w-full lg:w-8/12 text-left">
                        <h6 class="mb-2 text-lg font-bold uppercase text-indigo-500">Produk Kami</h6>
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
                                    @endif
                                </span>
                                </div>
                                <div class="text-sm text-gray-600">Stok {{ $item->stock }}</div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
