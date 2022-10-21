<div class="w-full">
   @include('livewire.katalog')
    <section class="relative pb-12 bg-gray-100 pt-5 hero-shop">
        <div class="container mx-auto px-4">
            <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                <div class="px-4 relative w-full lg:w-8/12 text-left">
                    <h6 class="mb-2 text-lg font-bold uppercase text-green-500">Produk Kami</h6>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4" >
                @foreach ($produk as $item)
                <div class=" relative w-1/2 md:w-[30%] shadow-lg cursor-pointe bg-white" wire:click="ShowDetail({{$item->id}})">
                    <div class="relative flex flex-col min-w-0 break-words w-full bg-transparent">
                        <div>
                            {{-- <div class="h-8 text-center"><span
                                    class="text-teal-500 bg-teal-200 text-xs font-bold inline-block py-1 uppercase uppercase last:mr-0 mr-1 leading-tight rounded px-2">new
                                    collection</span></div> --}}
                            <img alt="..." src="{{asset('upload/'. $item->gambar)}}" class="w-full p-6">
                        </div>
                        <div class="py-6 px-5 flex-auto text-left bg-green-400">
                            <h5 class=" text-xs md:text-2xl text-center font-bold mt-0 bg-white"><a href="javascript:;"
                                    class="text-black  w-full border-b border-white">{{$item->nama_barang}}</a></h5>
                            <h5 class=" md:text-lg border-b text-white text-sm">Jenis :{{$item->jenis->nama_jenis}}</h5>
                            <span class="text-white text-xs md:text-lg">Rp.
                                {{number_format($item->harga,0,2)}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
