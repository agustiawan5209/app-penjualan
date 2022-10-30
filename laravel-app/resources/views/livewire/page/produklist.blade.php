<div class="w-full">
    @include('livewire.katalog')
    <section class="relative pb-12 bg-gray-100 pt-5 hero-shop">
        <div class="container mx-auto px-4">
            <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                <div class="px-4 relative w-full lg:w-8/12 text-left">
                    <h6 class="mb-2 text-lg font-bold uppercase text-black">Produk Kami</h6>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                @foreach ($produk as $item)
                    <div class="flex font-sans bg-white">
                        <div class="flex-none w-48 relative">
                            <img src="{{asset('upload/'. $item->gambar)}}" alt=""
                                class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
                        </div>
                        <form class="flex-auto p-6">
                            <div class="flex flex-wrap">
                                <h1 class="flex-auto text-lg font-semibold text-slate-900">
                                    {{$item->nama_barang}}
                                </h1>
                                <div class="text-lg font-semibold text-slate-500">
                                    {{$item->hargaBarang($item->harga)}}
                                </div>
                                <div class="w-full flex-none text-sm font-medium text-slate-700 mt-2">
                                    Stock : {{$item->stock}}
                                </div>
                            </div>
                            <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
                                <div class="space-x-2 flex text-sm">
                                    <label>
                                        <input class="sr-only peer" name="size" type="radio" value="xs"
                                            checked />
                                        <div
                                            class="w-full px-3 h-9 rounded-lg flex items-center justify-center text-slate-700 peer-checked:font-semibold peer-checked:bg-slate-900 peer-checked:text-white">
                                            {{$item->katalog->nama_katalog}}
                                        </div>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-6 text-sm font-medium">
                                <div class="flex-auto flex space-x-4">
                                    <button class="h-10 px-6 font-semibold rounded-md bg-black text-white"
                                        type="button" wire:click="ShowDetail({{$item->id}})">
                                        Beli Sekarang
                                    </button>
                                </div>
                            </div>
                            <p class="text-sm text-slate-700">
                                {{$item->deskripsi}}
                            </p>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
