<div class="container mx-auto my-4 border-b">
    <h3 class="font-semibold mb-4">Kategori Produk</h3>
    <div class="owl-carousel owl-theme owl-loaded">
        @foreach ($jenis as $item)
        <div
            class=" relative flex flex-col items-center min-w-0 break-words bg-green-400 hover:bg-green-600 py-3 w-full mb-6  border rounded-lg font-sans">
            <a href="{{route('shop', ['jenis'=> $item->id])}}" class="px-6 hidden md:block"><img alt="Foto Jenis" src="{{asset('upload/jenis/'. $item->gambar)}}"
                    class="w-full"></a>
            <div class=" p-1 text-center flex-auto">
                <h6 class=" text-[12px]  font-bold uppercase mt-0 text-white">{{$item->nama_jenis}}</h6>
            </div>
        </div>
        @endforeach
    </div>
</div>
