<div>
    <div class="w-full">
        @include('livewire.katalog')
        <section class="relative py-12">
            <div class="container mx-auto px-4">
                <div class="mb-12">
                    <div class="flex flex-wrap -mx-4 justify-start">
                        <div class="px-4 relative w-full text-left">
                            <span
                                class="text-reddarken-500 bg-reddarken-100 text-xs font-bold inline-block py-1 uppercase uppercase last:mr-0 mr-1 leading-tight rounded px-2">Produk</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4 gap-4">
                    @foreach ($produk as $item)
                    <div class="px-4 relative w-1/2 md:w-3/12 shadow-inner cursor-pointer" wire:click="ShowDetail({{$item->id}})">
                        <div class="relative flex flex-col min-w-0 break-words w-full bg-transparent">
                            <div>
                                {{-- <div class="h-8 text-center"><span
                                        class="text-teal-500 bg-teal-200 text-xs font-bold inline-block py-1 uppercase uppercase last:mr-0 mr-1 leading-tight rounded px-2">new
                                        collection</span></div> --}}
                                <img alt="..." src="{{asset('upload/'. $item->gambar)}}" class="w-full p-6">
                            </div>
                            <div class="p-6 flex-auto text-left">
                                <h5 class=" text-xs md:text-2xl font-bold mt-0"><a href="javascript:;"
                                        class="">{{$item->nama_barang}}</a></h5>
                                <h5 class="text-xs md:text-sm">Jenis :{{$item->jenis->nama_jenis}}</h5>
                                <span class="text-reddarken-700 text-xs md:text-lg">Rp.
                                    {{number_format($item->harga,0,2)}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if ($produk->count() == 10)
                        <div class="mx-auto mt-12"><button
                                class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Load
                                more...</button></div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
