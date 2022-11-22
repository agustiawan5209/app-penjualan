<div>
    @include('sweetalert::alert')
    <div class="lg:flex flex-col items-center justify-between" x-data="{ promo: true, voucher: false }">
        <div class="lg:w-1/2 w-full bg-white flex justify-center flex-col">
            <h1 role="heading" class="md:text-5xl text-3xl font-bold leading-10 mt-3 text-gray-800 dark:text-white">
                Promo/Voucher</h1>
            <div class="w-full">
                <button onclick="toggleIt()" class="bg-gray-100 dark:bg-gray-800 shadow flex items-center mt-10">
                    <div class="bg-gray-100 dark:bg-gray-800 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none text-base leading-none text-gray-600 dark:text-gray-200 rounded-full py-4 px-6 mr-1"
                        id="monthly" x-on:click="promo = false">Voucher</div>
                    <div class="bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none text-base leading-none text-white rounded-full py-4 px-6"
                        id="annually" x-on:click="promo = true">Promo</div>
                </button>
            </div>
        </div>
        <br>
        @if ($promo->count() > 0)
            <div class="xl:w-1/2 lg:w-7/12 relative w-full lg:mt-0 mt-12 md:px-8" role="list" x-show="promo == true"
                x-transition>
                <img src="https://i.ibb.co/0n6DSS3/bgimg.png" class="absolute w-full -ml-12 mt-24"
                    alt="background circle images" />
                @foreach ($promo as $promo)
                    <div role="listitem"
                        class="bg-white dark:bg-gray-800 cursor-pointer shadow rounded-lg p-8 relative z-30">
                        <div class="md:flex items-center justify-between">
                            <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">Kode :
                                {{ $promo->kode_promo }}</h2>
                            <p class="text-2xl font-semibold md:mt-0 mt-4 leading-6 text-gray-800 dark:text-white">
                                Dapatkan Sekarang
                            </p>
                        </div>
                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">Potongan <span
                                class="underline-offset-1 text-red-500">
                                @if ($promo->promo_nominal == null)
                                    {{ $promo->promo_persen }}%
                                @else
                                    Rp. {{ number_format($promo->promo_nominal, 0, 2) }}
                                @endif
                            </span></p>
                    </div>
                @endforeach
            </div>
        @endif
        @if ($voucher->count() > 0)
            <div class="xl:w-1/2 lg:w-7/12 relative w-full lg:mt-0 mt-12 md:px-8" role="list" x-show="promo == false"
                x-transition>
                <img src="https://i.ibb.co/0n6DSS3/bgimg.png" class="absolute w-full -ml-12 mt-24"
                    alt="background circle images" />
                @foreach ($voucher as $voucher)
                    <div role="listitem"
                        class="bg-white dark:bg-gray-800 cursor-pointer shadow rounded-lg p-8 relative z-30">
                        <div class="md:flex items-center justify-between">
                            <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">Kode Voucher :
                                {{ $voucher->kode_voucher }}</h2>
                            <p class="text-2xl border px-2 py-1 rounded font-semibold md:mt-0 mt-4 leading-6 text-gray-800 dark:text-white "
                                wire:click="KlaimVoucher({{ $voucher->id }})">
                                Klaim Sekarang
                            </p>

                        </div>
                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">
                            @if ($voucher->jenis_voucher == 0)
                                Umum
                            @elseif ($voucher->jenis_voucher == 1)
                                Pengguna Baru
                            @elseif ($voucher->jenis_voucher == 2)
                                Jumlah Pembelian {{ $voucher->jumlah_pembelian }}
                            @elseif ($voucher->jenis_voucher == 3)
                                Pembelian Produk @if ($voucher->barang != null)
                                    {{ $voucher->barang->nama_barang }}
                                @endif
                            @endif
                        </p>
                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">
                           {{$voucher->deskripsi}}
                        </p>
                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">Potongan <span
                                class="underline-offset-1 text-red-500">
                                <span class="text-lg font-semibold">{{ $voucher->diskon }}</span>%
                            </span></p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        let monthly = document.getElementById("monthly");
        let annually = document.getElementById("annually");

        let flag = false;
        const toggleIt = () => {
            if (!flag) {
                monthly.classList.add("bg-indigo-700");
                monthly.classList.add("text-white");
                monthly.classList.remove("bg-gray-100");
                monthly.classList.remove("text-gray-600");
                annually.classList.remove("bg-indigo-700");
                annually.classList.remove("text-white");
                annually.classList.add("bg-gray-100");
                annually.classList.add("text-gray-600");
                flag = true;
            } else {
                monthly.classList.remove("bg-indigo-700");
                monthly.classList.remove("text-white");
                monthly.classList.add("bg-gray-100");
                monthly.classList.add("text-gray-600");
                annually.classList.add("bg-indigo-700");
                annually.classList.add("text-white");
                annually.classList.remove("bg-gray-100");
                annually.classList.remove("text-gray-600");
                flag = false;
            }
        };
    </script>
</div>
