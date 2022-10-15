 <div class="container mx-auto my-4">
        <div class="grid grid-cols-4 md:grid-cols-7 lg:grid-cols-9 gap-4">
            @foreach ($jenis as $item)
            <a href="{{route('shop', ['jenis'=> $item->id])}}" class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
                {{-- <div class="px-6 hidden md:block"><img alt="..."
                        src="https://demos.creative-tim.com/notus-pro-react/static/media/ecommerce-2.366b1564.jpg"
                        class="w-full"></div> --}}
                <div class=" p-1 text-center md:px-6 md:py-6 flex-auto">
                    <h6 class=" text-xs md:text-sm font-bold uppercase mt-0 mb-1 text-black">{{$item->nama_jenis}}</h6>
                </div>
            </a>
            @endforeach
        </div>
    </div>
