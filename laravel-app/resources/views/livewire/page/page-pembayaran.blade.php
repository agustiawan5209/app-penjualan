<div class="w-full">
    @include('sweetalert::alert')
    <section class="flex relative items-center p-0 min-h-screen-60 max-h-440-px pt-14 md:pt-20">
        <div class="absolute w-full h-full block bg-gray-900 opacity-75 z-1 left-0 top-0"></div>
        <div class="bg-gray-800 w-full h-full absolute bg-cover bg-50 z-0"
            style="background-image: url('../../assets/img/sections/photo-15.jpg');"></div>
        <div class="relative h-full text-center text-white container mx-auto px-4 z-3 mb-16">
            <div class="justify-center flex flex-wrap -mx-4">
                <div class="px-12  relative  lg:w-6/12 w-full md:w-8/12">
                    <h1 class="text-4xl font-bold leading-tight">Checkout</h1>
                    <p class="text-lg opacity-75 pt-2 text-gray-600">Detail Pembayaran</p>
                </div>
            </div>
        </div>
        <div class="w-full bottom-0 absolute z-2">
            <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-gray-100 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
    </section>
    <section class="relative bg-gray-100 py-12 z-2">
        <div class="container mx-auto px-4 -mt-64">
            <div class="flex flex-wrap -mx-4">
                <div class="px-4 relative w-full lg:w-4/12">
                    <h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-white">Detail Pembayaran</h3>
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            @foreach ($cart as $item)
                            <div class="items-center my-4 flex">
                                <img src="{{asset('upload/'. $item->barang->gambar)}}" class="mr-4 w-20 p-2" alt="...">
                                <div class="flex-1">
                                    <div class="justify-between">
                                        <h6 class="text-xl font-semibold leading-tight">{{$item->barang->nama_barang}}
                                        </h6> <br>
                                        <p class="text-gray-500 uppercase font-bold text-xs"> Jenis
                                            :{{$item->barang->katalog->nama_katalog}}</p>
                                        <p class="text-gray-500 uppercase font-bold text-xs">Jumlah :
                                            {{$item->quantity}}</p>
                                    </div>
                                </div>
                                <span class="text-gray-700">{{$item->hargaBarang($item->barang->harga)}}</span>
                            </div>
                            @endforeach
                            <hr class="mt-6 mb-4 bg-gray-300 ml-0">
                            <div class="mb-0 pt-0 relative">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Promo</label>
                                <form action="{{route('masukan-kode-promo')}}" method="POST">
                                    @csrf
                                    <div class="mb-2 relative flex flex-wrap w-full items-stretch">
                                        <div class="mr-2">
                                            <div class="mb-3 pt-0"><input placeholder="Kode Promo" type="text"
                                                    name="kode_promo"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="mb-0"><button
                                                class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"
                                                type="submit">Apply</button></div>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <hr class="mt-4 mb-2 bg-gray-300 ml-0">
                                <div class="flex justify-between">
                                    <h6 class="text-gray-700 leading-normal mt-0 mb-2">Subtotal</h6>
                                    <h6 class="leading-normal mt-0 mb-2">Rp. {{number_format($sub_total,0,2)}}</h6>
                                </div>
                                <div class="flex justify-between">
                                    <h6 class="text-gray-700 leading-normal mt-0 mb-2">potongan</h6>
                                    <h6 class="leading-normal mt-0 mb-2">Rp. {{number_format($potongan,0,2)}}</h6>
                                </div>
                            </div>
                            <div>
                                <hr class="mt-4 mb-2 bg-gray-300 ml-0">
                                <div class="flex justify-between">
                                    <h6 class="text-gray-700 leading-normal mt-0 mb-2">Total</h6>
                                    <h6 class="leading-normal mt-0 mb-2">Rp. {{number_format($total_bayar,0,2)}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('Customer.Pembayaran-Selesai')}}" method="POST" enctype="multipart/form-data" class="px-4 relative w-full lg:w-8/12" x-data="{ongkir : 0,}">
                    @csrf
                    <input type="hidden" name="sub_total" value="{{$total_bayar}}">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <form>
                                <div class="container mx-auto px-4">
                                    <h3 class="text-3xl font-semibold mt-4 mb-6">Detail Pengguna</h3>
                                    <x-jet-validation-errors/>
                                    <div class="flex flex-wrap -mx-4">
                                        <div class="px-4 pb-2 relative w-full lg:w-6/12">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">
                                                name*</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. Smith" type="text" name="nama"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-6/12">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Jenis
                                                Pengambilan barang*</label>
                                            <div class="mb-3 pt-0">
                                                <select type="text" x-model="ongkir" name="metode"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                                    <option value="">--</option>
                                                    <option value="0">Ambil Sendiri</option>
                                                    <option value="1">Kirim Barang</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-6/12">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Email
                                                address*</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. email@email.email"
                                                    type="email" name="email" value="{{auth()->user()->email}}" readonly
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-6/12">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Nomor
                                                Telepon*</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. +1 (5417) 543 010"
                                                    type="text" name="no_telpon"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-8/12" x-show="ongkir == 1">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Alamat*</label>
                                            <template x-if="ongkir == 1"  class="mb-3 pt-0"><input placeholder="E.g. 420 Long Beach, CA"
                                                    type="text" name="detail_alamat" x-if=""
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </template>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-4/12" x-show="ongkir == 1">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Postcode/Zip*</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. 340112" type="text" name="kode_pos"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-4/12" x-show="ongkir == 1">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Kecamatan</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. YC7B 3UT" type="text" name="kecamatan"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                        <div class="px-4 pb-2 relative w-full lg:w-4/12" x-show="ongkir == 1">
                                            <label
                                                class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Kabupaten*</label>
                                            <div class="mb-3 pt-0"><input placeholder="E.g. London" type="text" name="kabupaten"
                                                    class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-3xl font-semibold mt-4 mb-6">Payment method</h3>
                                    <ul class="flex-col md:flex-row flex flex-wrap list-none pl-0 mb-0">
                                       @foreach ($bank as $item)
                                         <li class="-mb-px mr-2 last:mr-0 flex-auto text-center"><a href="javascript:;"
                                                 class="text-xs font-bold uppercase px-5 py-3 shadow rounded block leading-normal sm:mb-4 md:mb-0 uppercase duration-500 transition-all ease-in-out bg-pink-500 text-white">{{$item->nama_bank}}</a></li>
                                       @endforeach
                                    </ul>
                                    <div class="w-full">
                                        <div class="my-8 transform duration-500 transition-all ease-in-out block">
                                            <div class="flex flex-wrap -mx-4">
                                                <div class="px-4 relative w-full lg:w-12/12">
                                                    <label
                                                        class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Bukti Transaksi
                                                        </label>
                                                    <div class="mb-3 pt-0"><input type="file" name="foto"
                                                            class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                                    </div>
                                                </div>
                                                <div class="px-4 relative w-full lg:w-7/12">
                                                    <label
                                                        class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Tanggal Transaksi</label>
                                                    <div class="mb-3 pt-0"><input placeholder="E.g. SMITH JOHN"
                                                            type="date" name="tgl_transaksi"
                                                            class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-8 transform duration-500 transition-all ease-in-out hidden">
                                            <div class="flex flex-wrap -mx-4">
                                                <div class="px-4 relative w-full lg:w-12/12">
                                                    <label
                                                        class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Email</label>
                                                    <div class="mb-3 pt-0"><input placeholder="E.g. email@email.email"
                                                            type="email"
                                                            class="border-gray-300 px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-12 mb-8"><button
                                            class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-gray-800 bg-gray-200 border-gray-200 active:bg-gray-300 active:border-gray-300 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Return
                                            to cart</button><button
                                            class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-pink-500 border-pink-500 active:bg-pink-600 active:border-pink-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Order
                                            now</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="pt-12 pb-4 border-b bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="justify-between items-center flex flex-wrap -mx-4">
                <div class="px-4 relative w-full lg:w-6/12">
                    <h3 class="text-xl font-bold leading-normal mt-0">Thank you for supporting us!</h3>
                    <h4 class="leading-normal mt-1 mb-2 text-gray-500">Let's get in touch on any of these platforms.
                    </h4>
                </div>
                <div class="text-right pr-6 px-4 relative w-full lg:w-6/12"><button
                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-gray-800 bg-white border-white active:bg-gray-100 active:border-gray-100 text-xs px-3 py-2 shadow hover:shadow-md rounded-md"><i
                            class="fab fa-twitter"></i></button><button
                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-gray-800 bg-white border-white active:bg-gray-100 active:border-gray-100 text-xs px-3 py-2 shadow hover:shadow-md rounded-md"><i
                            class="fab fa-facebook"></i></button><button
                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-gray-800 bg-white border-white active:bg-gray-100 active:border-gray-100 text-xs px-3 py-2 shadow hover:shadow-md rounded-md"><i
                            class="fab fa-dribbble"></i></button><button
                        class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-gray-800 bg-white border-white active:bg-gray-100 active:border-gray-100 text-xs px-3 py-2 shadow hover:shadow-md rounded-md"><i
                            class="fab fa-github"></i></button></div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="items-center xl:justify-between flex flex-wrap -mx-4">
                <div class="px-4 relative w-full xl:w-6/12 w-full sm:w-full">
                    <div class="text-center xl:text-left py-6 text-sm text-gray-500">Copyright © 2021<a
                            href="https://www.creative-tim.com" target="_blank" class="font-semibold ml-1">Creative
                            Tim</a>. All rights reserved.</div>
                </div>
                <div class="px-4 relative w-full xl:w-6/12 w-full sm:w-full">
                    <ul class="justify-center xl:justify-end mx-auto flex flex-wrap list-none pl-0 mb-0">
                        <li><a href="https://www.creative-tim.com" target="_blank"
                                class="text-sm block px-4 bg-transparent no-underline text-gray-500 hover:text-gray-700 py-4 md:py-6 mx-auto">Creative
                                Tim</a></li>
                        <li><a href="https://www.creative-tim.com/presentation" target="_blank"
                                class="text-sm block px-4 bg-transparent no-underline text-gray-500 hover:text-gray-700 py-4 md:py-6 mx-auto">About
                                us</a></li>
                        <li><a href="https://www.creative-tim.com/blog" target="_blank"
                                class="text-sm block px-4 bg-transparent no-underline text-gray-500 hover:text-gray-700 py-4 md:py-6 mx-auto">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
