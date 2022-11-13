<div class="w-full">
    <section class="relative pb-12 bg-gray-100 pt-5 hero-shop grid grid-cols-5 gap-4">
        <div class="col-span-1">
            @include('livewire.katalog')
        </div>
        <div class="container mx-auto px-4 col-span-4">
            <div class="mb-5 flex flex-wrap -mx-4 justify-start">
                <div class="px-4 relative w-full lg:w-8/12 text-left">
                    <h6 class="mb-2 text-lg font-bold uppercase text-black">Produk Kami</h6>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 -mx-4">
                @foreach ($produk as $item)
                    <div class="flex font-sans bg-white">
                        <div class="flex-none w-48 relative">
                            <img src="{{ asset('upload/' . $item->gambar) }}" alt=""
                                class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
                        </div>
                        <form class="flex-auto p-6">
                            <div class="flex flex-wrap">
                                <h1 class="flex-auto  text-xs md:text-base font-semibold text-slate-900">
                                    {{ $item->nama_barang }}
                                </h1>
                                <div class=" text-xs md:text-base font-semibold text-slate-500">
                                    {{ $item->hargaBarang($item->harga) }}
                                </div>
                                <div class="w-full flex-none  text-xs md:text-sm font-medium text-slate-700 mt-2">
                                    Stock : {{ $item->stock }}
                                </div>
                            </div>
                            <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
                                <div class="space-x-2 flex  text-xs md:text-sm">
                                    <label>
                                        <input class="sr-only peer" name="size" type="radio" value="xs"
                                            checked />
                                        <div
                                            class="w-full sm:px-3 h-9 rounded-lg flex items-center justify-center text-slate-700 peer-checked:font-semibold peer-checked:bg-slate-900 peer-checked:text-white">
                                            {{ $item->katalog->nama_katalog }}
                                        </div>
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-6  text-xs md:text-sm font-medium">
                                <div class="flex-auto flex space-x-4">
                                    <button class="px-2 py-1 font-semibold rounded-md bg-black text-white" type="button"
                                        wire:click="ShowDetail({{ $item->id }})">
                                        Beli Sekarang
                                    </button>
                                </div>
                            </div>
                            <p class=" text-xs md:text-sm text-slate-700">
                                {{ $item->deskripsi }}
                            </p>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
