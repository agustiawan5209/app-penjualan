<div>
    <!-- Open Content -->
    @include('sweetalert::alert')

    <section class="relative mt-20">
        <div class="container mx-auto px-4 py-4 shadow-xl">
            <div class="flex flex-wrap -mx-4">
                <div class="mx-auto px-4 relative w-full lg:w-6/12  md:w-full">
                    <div class="relative">
                        <div class="relative w-full overflow-hidden">
                            <div class="w-full p-12 transform duration-900 transition-all ease-in-out mx-auto block">
                                <img alt="..." src="{{ asset('upload/' . $barang->gambar) }}"
                                    class="w-full h-auto mx-auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mr-auto px-4 relative  lg:w-6/12 w-full md:w-full">
                    <h2 class="text-3xl font-bold leading-tight mt-0 mb-0">{{ $barang->nama_barang }}</h2>
                    {{-- <div class="pt-2">
                        <div class="text-orange-900"><i class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i><i
                                class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i><i
                                class="mr-1 fas fa-star-half-alt"></i><a href="https://www.creative-tim.com"
                                class="inline text-sm ml-1 text-reddarken-700 hover:text-reddarken-900">7</a></div>
                    </div> --}}
                    <h2 class="text-3xl font-normal mt-2 mb-2">Rp. {{ number_format($barang->harga, 0, 2) }}</h2>
                    <p class="text-reddarken-900 border-b"> Keterangan : {{ $barang->deskripsi }}</p>
                    <div class="mt-12 mb-6 flex flex-wrap -mx-4 border-b">
                        <label class="inline-block mb-2">Katalog : </label>
                        <div class="px-4 relative w-full lg:w-6/12">
                            <label class="inline-block mb-2">{{ $barang->katalog->nama_katalog }}</label>

                        </div>
                    </div>
                    <div class="mb-6 flex flex-wrap -mx-4">
                        <div class="px-4 relative w-full lg:w-5/12">
                            <div class="relative inline-flex flex-row w-full items-stretch">
                                <div class="mr-2"><button
                                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-gray-900 border-orange-900 active:bg-gray-600 active:border-orange-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"
                                        wire:click='countminus'>-</button></div>
                                <div class="mr-2">
                                    <div class="mb-3 pt-0"><input type="text"
                                            class="border-reddarken-300 px-3 text-black py-2 text-sm  w-full placeholder-reddarken-200 text-reddarken-700 relative bg-white rounded-md outline-none  focus:ring-lightBlue-900 focus:ring-1 focus:border-lightBlue-900 border border-solid transition duration-200 "
                                            wire:model="count"></div>
                                </div>
                                <div><button
                                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-gray-900 border-orange-900 active:bg-gray-600 active:border-orange-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"
                                        wire:click='countplus'>+</button></div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-gray-900 border-orange-900 active:bg-gray-600 active:border-orange-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"
                        wire:click='addToCart({{ $barang->id }})'>Keranjang <i
                            class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </section>
    <div class="w-full">
        <section class="relative pb-12 mt-12 bg-reddarken-100 pt-20">
            <div class="container mx-auto px-4">
                <div class="mb-12 flex flex-wrap -mx-4 justify-start">
                    <div class="px-4 relative w-full lg:w-8/12 text-left">
                        <h2 class="text-4xl font-bold mt-0 mb-1 text-reddarken-700">Produk Yang Mirip</h2>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4">
                    @foreach ($barang_lain as $item)
                        <div class="px-4 relative w-1/2 md:w-3/12 shadow-lg cursor-pointer"
                            wire:click="ShowDetail({{ $item->id }})">
                            <div class="relative flex flex-col min-w-0 break-words w-full bg-transparent">
                                <div>
                                    {{-- <div class="h-8 text-center"><span
                                        class="text-teal-900 bg-teal-200 text-xs font-bold inline-block py-1 uppercase  last:mr-0 mr-1 leading-tight rounded px-2">new
                                        collection</span></div> --}}
                                    <img alt="..." src="{{ asset('upload/' . $item->gambar) }}" class="w-full p-6">
                                </div>
                                <div class="p-6 flex-auto text-left">
                                    <h5 class=" text-xs md:text-2xl font-bold mt-0"><a href="javascript:;"
                                            class="">{{ $item->nama_barang }}</a></h5>
                                    <h5 class="text-xs md:text-sm">Jenis :{{ $item->jenis->nama_jenis }}</h5>
                                    <span class="text-reddarken-700 text-xs md:text-lg">Rp.
                                        {{ number_format($item->harga, 0, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
</div>
