<div>
    <h1 class="font-medium container mx-auto pt-5 text-center  pb-4">
        <span class="max-w-xl rounded-md px-3 py-3 bg-gray-900 text-white font-bold">Kategori</span>
    </h1>
    <div class="bg-white w-full mx-auto border border-gray-200 pb-10">
        <ul class="shadow-box grid grid-cols-3 md:grid-cols-6 lg:grid-cols-8 gap-2">

           @foreach ($jenis as $jenis)
             <li class="relative border border-gray-400 rounded-lg" x-data="{ selected: null }">

                 <button type="button" class="w-full px-8 py-6 text-left"
                     @click="selected !== 1 ? selected = 1 : selected = null">
                     <div class="flex flex-col items-center justify-center">
                        <img src="{{asset('upload/jenis/'. $jenis->gambar)}}" width="100" alt="Foto Jenis">
                         <span class=" text-sm text-center">
                             {{$jenis->nama_jenis}}</span>
                     </div>
                 </button>

                 <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                     x-ref="container1"
                     x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                     <div class="p-6 flex flex-col justify-center gap-4">
                       @foreach ($jenis->katalog as $katalog)
                         <a href="{{route('shop', ['jenis'=> $katalog->nama_katalog])}}" class="px-3 py-1 border rounded-md text-xs">{{$katalog->nama_katalog}}</a>
                       @endforeach
                     </div>
                 </div>

             </li>

           @endforeach
        </ul>
    </div>
</div>
