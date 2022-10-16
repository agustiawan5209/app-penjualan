 <div class="container mx-auto my-4">
        <h3 class="font-semibold mb-4">Kategori Produk</h3>
        <div class="grid grid-cols-4 md:grid-cols-7 lg:grid-cols-8 gap-4">
            @foreach ($jenis as $item)
            <a href="{{route('shop', ['jenis'=> $item->id])}}" class="relative flex flex-col items-center min-w-0 break-words bg-white w-full mb-6  border rounded-lg">
                {{-- <div class="px-6 hidden md:block"><img alt="..."
                        src="https://demos.creative-tim.com/notus-pro-react/static/media/ecommerce-2.366b1564.jpg"
                        class="w-full"></div> --}}
                <div class=" p-1 text-center flex-auto">
                    <h6 class=" text-[12px]  font-bold uppercase mt-0 text-black">{{$item->nama_jenis}}</h6>
                </div>
            </a>
            @endforeach
        </div>
    </div>
