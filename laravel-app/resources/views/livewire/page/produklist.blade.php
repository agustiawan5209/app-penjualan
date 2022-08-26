<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
    <div class="max-w-2xl mx-auto py-10 px-4 sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class=" text-black font-semibold text-2xl">Products</h2>

      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($produk as $item)
            <a href="#" class="group" wire:click='addToCart({{$item->id}})'>
              <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                <img src="{{asset('upload/'. $item->gambar)}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
              </div>
              <h3 class="mt-4 text-sm text-gray-700">{{$item->nama_barang}}</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. {{number_format($item->harga,0,2)}}</p>
            </a>
        @endforeach


        <!-- More products... -->
      </div>
    </div>
  </div>
