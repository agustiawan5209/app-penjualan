<main>
    <div class="w-full">
        <section class="flex relative items-center p-0 min-h-screen z-0">
           <div class="absolute w-full h-full block bg-black opacity-50 z-1 left-0 top-0"></div>
           <div class="bg-gray-800 w-full h-full absolute bg-cover bg-50" style="background-image: url({{asset('img/banner.jpg')}});"></div>
           <div class="relative h-full text-center text-white container mx-auto px-4 z-2 mb-24">
              <div class="justify-center flex flex-wrap -mx-4">
                 <div class="px-12 px-4 relative w-full md:w-8/12">
                    <h1 class="text-5xl font-bold leading-tight mt-0 mb-2">Irsan Jaya Shop</h1>
                    <p class="text-xl leading-relaxed opacity-75 mt-1 mb-4">Website Toko Penjualan Bahan Bangunan. Semua Tersedia Disini</p>
                    <a href="{{route('shop')}}" class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-red-500 border-red-500 active:bg-red-600 active:border-red-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"><i class="fas fa-shopping-cart mr-1"></i> Start shopping</a>
                 </div>
              </div>
           </div>
           <div class="w-full bottom-0 absolute z-2">
              <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
                 <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                 </svg>
              </div>
           </div>
        </section>
     </div>
     <livewire:page.produklist />
</main>
