 <div class="container mx-auto my-4">
        <h3 class="font-semibold mb-4">Kategori Produk</h3>
        <div class="owl-carousel ">
            @foreach ($jenis as $item)
            <a href="{{route('shop', ['jenis'=> $item->id])}}" class="relative flex flex-col items-center min-w-0 break-words bg-white w-full mb-6  border rounded-lg">
                @if ($item->gambar != null)
                    <div class="px-6 hidden md:block"><img alt="..."
                            src="{{asset('upload/jenis/'. $item->gambar)}}"
                            class="w-full"></div>
                @endif
                <div class=" p-1 text-center flex-auto">
                    <h6 class=" text-[12px]  font-bold uppercase mt-0 text-black">{{$item->nama_jenis}}</h6>
                </div>
            </a>
            @endforeach
        </div>
    </div>
