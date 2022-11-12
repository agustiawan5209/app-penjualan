<section class="h-full h-custom mt-16" style="background-color: #eee;">
    @include('sweetalert::alert')
    <div class="w-full md:px-6 px-2 py-10 shadow-2xl ">
        <div class="relative flex justify-center mx-auto min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
            <div class="px-4 py-5 flex-auto">
                @foreach ($cart as $item)
                    <div class="items-center my-4 flex ">
                        <img src="{{ asset('upload/' . $item->barang->gambar) }}" class="mr-4 w-20 p-2" alt="...">
                        <div class="flex-1">
                            <div class="justify-between">
                                <h6 class="text-xl font-semibold leading-tight mb-1">{{ $item->barang->nama_barang }}
                                </h6>
                                <p class="text-reddarken-500 uppercase font-bold text-xs">Jumlah : {{ $item->quantity }}
                                </p>
                            </div>
                        </div>
                        <span class="text-reddarken-700">Rp. {{ number_format($item->sub_total, 0, 2) }}</span>
                        <button wire:click='removeCart({{ $item->id }})' class="px-1 py-2 text-red-500 text-sm font-semibold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                @endforeach
                <hr class="mt-6 mb-4 bg-reddarken-300 ml-0">
                <div>
                    <hr class="mt-4 mb-2 bg-reddarken-300 ml-0">
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Subtotal</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{ number_format($sub_total) }}</h6>
                    </div>
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Diskon</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{ number_format($potongan) }}</h6>
                    </div>
                </div>
                <div>
                    <hr class="mt-4 mb-2 bg-reddarken-300 ml-0">
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Total</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{ number_format($total_bayar) }}</h6>
                    </div>
                </div>
                <div>
                    <x-jet-button
                        wire:click='BayarDetail({{ $potongan }}, {{ $sub_total }}, {{ $total_bayar }})'>Bayar
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</section>
