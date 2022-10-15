<div class="w-full">
    <div class="py-12 bg-blueGray-100">
      <div class="flex flex-wrap -mx-4">
        <div class="flex justify-center flex-col px-4 relative w-full md:w-4/12 ml-auto">
          <h2 class="text-3xl font-bold mt-0">Choose a plan for your next project</h2>
          <p class="mt-2 mb-10 text-lg leading-relaxed text-blueGray-400">You have Free Unlimited Updates and Premium Support on each package. You also have 20 days to request a refund.</p>
          <div><button class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Freelancer</button>
            <button class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-blueGray-800 bg-white border-white active:bg-blueGray-100 active:border-blueGray-100 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Enterprise</button>
          </div>
        </div>
        <div class="mx-auto px-4 relative w-full md:w-7/12 w-full lg:w-7/12">
          <div class="block">
            <div class="block">
              <div class="flex flex-wrap -mx-4">
                @foreach ($promo as $promo)
                    <div class="px-4 relative w-full md:w-6/12">
                      <div class="bg-white mb-6 text-center shadow-lg rounded-lg relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg">
                        <div class="bg-transparent first:rounded-t px-5 py-3 border-b border-blueGray-200">
                          <h6 class="font-bold my-2">{{$promo->kode_promo}}</h6>
                        </div>
                        <div class="px-4 py-5 flex-auto">
                          <div class="text-5xl mt-0 mb-0 font-bold">
                            @if ($promo->promo_nominal != null)
                            Rp. {{number_format($promo->promo_nominal,0,2)}}
                            @elseif($promo->persen != null)
                                {{$promo->promo_persen}}%
                            @endif
                          </div>
                          {{-- <ul class="mt-6 mb-0 list-none">
                            <li class="py-1 text-blueGray-500">
                              <b class="text-lightBlue-500"> 20GB </b>File Storage
                            </li>
                            <li class="py-1 text-blueGray-500">
                              <b class="text-lightBlue-500"> 15 </b>Users/project
                            </li>
                            <li class="py-1 text-blueGray-500">
                              <b class="text-lightBlue-500"> 4.000 </b>Internal messages
                            </li>
                          </ul> --}}
                        </div>
                        {{-- <div class="mt-4 bg-transparent rounded-b px-4 py-3 border-t border-blueGray-200">
                          <a href="javascript:;" class="text-lightBlue-500">Request a demo</a>
                        </div> --}}
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
