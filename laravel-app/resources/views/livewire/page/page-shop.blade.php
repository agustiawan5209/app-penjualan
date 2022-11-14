<div>
    <div class="w-full">
        <section class="relative pb-12 bg-gray-100 pt-5 hero-shop grid gap-4 grid-cols-5">
            <div class="col-span-1">
                @include('livewire.katalog')
            </div>
            <div class="container mx-auto px-4 col-span-4">
                <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                    <div class="px-4 relative w-full lg:w-8/12 text-left">
                        <h6 class="mb-2 text-lg font-bold uppercase text-green-500">Produk Kami</h6>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4">
                    @foreach ($produk as $item)
                        <!-- component -->
                        <!-- This is an example component -->
                        <div class="bg-gray-800 w-48 relative shadow overflow-hidden cursor-pointer" wire:click='ShowDetail({{$item->id}})'>
                            @if ($item->diskon->count() > 0)
                                @foreach ($item->diskon as $diskon)
                                    <div class="absolute font-bold text-white px-2 py-1 bg-slate-600 rounded-r-sm">
                                        <span class="text-sm">Diskon {{ $diskon->jumlah_diskon }}%</span>
                                    </div>
                                @endforeach
                            @endif
                            <img src="{{ asset('upload/' . $item->gambar) }}"
                                alt="AGLAONEMA RED ANJAMANI / AGLONEMA RED ANJAMANI MURMER">
                            <div class="pt-3 pb-4 px-2">
                                <div class="text-sm overflow-hidden h-8 leading-4">{{ $item->nama_barang }}</div>
                                <div class="flex justify-between items-center">
                                    <div class="text-grabg-slate-600">
                                        <span class="text-sm">Rp</span><span
                                            class="text-md font-semibold">{{ number_format($item->harga, 0, 2) }}</span>
                                        <br>
                                        <span class="text-xs">Kategori : </span><span
                                            class="text-sm">{{ $item->katalog->nama_katalog }}</span>
                                    </div>
                                    <div class="text-sm text-gray-600">Stok {{ $item->stock }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
