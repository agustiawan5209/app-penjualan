<div class="w-full">
    <div class="py-12 bg-reddarken-100">
        <div class="flex flex-wrap -mx-4">

            <div class="mx-auto px-4 relative w-full md:w-7/12 w-full lg:w-7/12">
                <div class="block">
                    <div class="block">
                        @if ($promo->count() > 0)
                        <div class="flex flex-wrap -mx-4">
                            @foreach ($promo as $promo)
                            <div class="px-4 relative w-full md:w-6/12">
                                <div
                                    class="bg-white mb-6 text-center shadow-lg rounded-lg relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg">
                                    <div class="bg-transparent first:rounded-t px-5 py-3 border-b border-reddarken-200">
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
                                            <li class="py-1 text-reddarken-500">
                                                <b class="text-lightBlue-500"> 20GB </b>File Storage
                                            </li>
                                            <li class="py-1 text-reddarken-500">
                                                <b class="text-lightBlue-500"> 15 </b>Users/project
                                            </li>
                                            <li class="py-1 text-reddarken-500">
                                                <b class="text-lightBlue-500"> 4.000 </b>Internal messages
                                            </li>
                                        </ul> --}}
                                    </div>
                                    {{-- <div
                                        class="mt-4 bg-transparent rounded-b px-4 py-3 border-t border-reddarken-200">
                                        <a href="javascript:;" class="text-lightBlue-500">Request a demo</a>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @else
                        <div class="flex justify-center flex-col px-4 py-10 shadow-lg relative w-full ml-auto">
                            <h2 class="text-3xl font-bold mt-0">Maaf Promo Saat Ini Tidak Tersedia</h2>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
