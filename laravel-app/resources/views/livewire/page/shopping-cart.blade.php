<section class="h-100 h-custom" style="background-color: #eee;">
    @include('sweetalert::alert')
    <div class="w-full container md:px-6 px-2 shadow-2xl ">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
            <div class="px-4 py-5 flex-auto">
                @foreach ($cart as $item)
                <div class="items-center my-4 flex items-start">
                    <img src="{{asset('upload/'. $item->barang->gambar)}}" class="mr-4 w-20 p-2" alt="...">
                    <div class="flex-1">
                        <div class="justify-between">
                            <h6 class="text-xl font-semibold leading-tight mb-1">{{$item->barang->nama_barang}}</h6>
                            <p class="text-reddarken-500 uppercase font-bold text-xs">Jumlah : {{$item->quantity}}</p>
                        </div>
                    </div>
                    <span class="text-reddarken-700">Rp. {{number_format($item->sub_total,0,2)}}</span>
                </div>
                @endforeach
                <hr class="mt-6 mb-4 bg-reddarken-300 ml-0">
                <div>
                    <hr class="mt-4 mb-2 bg-reddarken-300 ml-0">
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Subtotal</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{number_format($sub_total)}}</h6>
                    </div>
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Diskon</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{number_format($potongan)}}</h6>
                    </div>
                </div>
                <div>
                    <hr class="mt-4 mb-2 bg-reddarken-300 ml-0">
                    <div class="flex justify-between">
                        <h6 class="text-reddarken-700 leading-normal mt-0 mb-2">Total</h6>
                        <h6 class="leading-normal mt-0 mb-2">Rp. {{$total_bayar}}</h6>
                    </div>
                </div>
                <div>
                   <x-jet-button wire:click='BayarDetail({{$potongan}}, {{$sub_total}}, {{$total_bayar}})'>Bayar</x-jet-button>
                </div>
            </div>
        </div>
    </div>
</section>
