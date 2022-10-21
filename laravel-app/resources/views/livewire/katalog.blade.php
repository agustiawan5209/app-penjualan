<div class="container mx-auto my-4 border-b">
    <h3 class="font-semibold mb-4 flex justify-center">
        <p class="px-3 py-2 bg-green-500 text-white max-w-md">Kategori Produk</p>
    </h3>
    <div class="owl-carousel">
                @foreach ($jenis as $item)
                <div
                    class="item relative flex flex-col items-center min-w-0 break-words bg-green-400 hover:bg-green-600 py-3 w-full mb-6  border rounded-lg font-sans">
                    <a href="{{route('shop', ['jenis'=> $item->id])}}" class="px-6 hidden md:block"><img
                            alt="Foto Jenis" src="{{asset('upload/jenis/'. $item->gambar)}}" class="w-full"></a>
                    <div class=" p-1 text-center flex-auto">
                        <h6 class=" text-[12px]  font-bold uppercase mt-0 text-white">{{$item->nama_jenis}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="owl-dots">
                <div class="owl-dot active"><span></span></div>
                <div class="owl-dot"><span></span></div>
                <div class="owl-dot"><span></span></div>
            </div>

</div>
