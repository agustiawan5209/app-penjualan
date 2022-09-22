<div>
    <div class="items-center w-full px-4 py-4 mx-auto my-10 bg-white rounded-lg shadow-md " x-data="{ order: 1, }">
        <nav class="flex flex-row  justify-center shadow-sm rounded-full space-x-4 py-2 md:mx-24">
            <button x-on:click="order = 1"
            :class=" order == 1? 'text-indigo-50 py-3 px-6 inline-flex items-center rounded-full focus:outline-none font-medium bg-indigo-800 hover:bg-indigo-600' : 'text-gray-600 py-3 px-6 inline-flex items-center hover:bg-indigo-600 hover:text-indigo-50 focus:outline-none rounded-full'">
                Pesanan
            </button>
            <button x-on:click="order = 2" :class=" order == 2 ? 'text-indigo-50 py-3 px-6 inline-flex items-center rounded-full focus:outline-none font-medium bg-indigo-800 hover:bg-indigo-600' : 'text-gray-600 py-3 px-6 inline-flex items-center hover:bg-indigo-600 hover:text-indigo-50 focus:outline-none rounded-full'"
                >
                Diterima
            </button>
        </nav>
        @if ($statusItem)
        <div class="z-50">
            <livewire:item.page-status-barang :barang_id="null" :ongkir_id="$itemID" :status="$status">
        </div>

    @endif
        <div class="container mx-auto">
            <div class="flex justify-between w-full px-4 py-2">
                <div class="text-lg font-bold">
                    Histori Pesanan
                </div>
            </div>
            <div class="mt-6 overflow-x-auto" x-show="order ==1">
                <table class="w-full border border-collapse table-auto">
                    <thead class="">
                        <tr class="text-base font-bold text-left bg-gray-50">
                            <th class="px-4 py-3 border-b-2 border-blue-500">Pengguna</th>
                            <th class="px-4 py-3 border-b-2 border-green-500">Tanggal Pengiriman</th>
                            <th class="px-4 py-3 border-b-2 border-red-500">Status Pengiriman</th>
                            <th class="px-4 py-3 text-center border-b-2 border-yellow-500 sm:text-left">Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        @if ($produk->count() > 0)
                            @if ($belum_terkirim->count() > 0)
                                @foreach ($belum_terkirim as $ongkir)
                                    @if ($ongkir->status == 3 || $ongkir->status == 2 || $ongkir->status == 1 || $ongkir->status == 0)
                                        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                            <td class="flex flex-row items-center px-4 py-4">
                                                <div class="flex w-10 h-10 mr-4">
                                                    <a href="#" class="relative block">
                                                        <img alt="profil" src="{{ Auth::user()->profile_photo_url }}"
                                                            class="object-cover w-10 h-10 mx-auto rounded-md" />
                                                    </a>
                                                </div>
                                                <div class="flex-1 pl-1">
                                                    <div class="font-medium dark:text-white">{{ Auth::user()->name }}</div>
                                                    <div class="text-sm text-blue-600 dark:text-gray-200">
                                                        {{ Auth::user()->email }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                {{ $ongkir->tgl_pengiriman }}
                                            </td>
                                            <td class="px-4 py-4">
                                                @if ($ongkir->status == 1)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Belum
                                                        Dikirim</span>
                                                @elseif ($ongkir->status == 2)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Dalam Pengiriman</span>
                                                @elseif ($ongkir->status == 3)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Diterima</span>
                                                @elseif ($ongkir->status == 4)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4">
                                                <x-jet-button wire:click='lihatStatus({{$ongkir->id}})'>Status</x-jet-button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <div class="flex-1 pl-1 justify-center text-center">
                                            <div class="font-medium dark:text-white">Data Kosong</div>
                                            <div class="text-sm text-blue-600 dark:text-gray-200">
                                                Lakukan Pemesanan
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="flex-1 pl-1 justify-center text-center">
                                        <div class="font-medium dark:text-white">Data Kosong</div>
                                        <div class="text-sm text-blue-600 dark:text-gray-200">
                                            Lakukan Pemesanan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-6 overflow-x-auto" x-show="order ==2">
                <table class="w-full border border-collapse table-auto">
                    <thead class="">
                        <tr class="text-base font-bold text-left bg-gray-50">
                            <th class="px-4 py-3 border-b-2 border-blue-500">Pengguna</th>
                            <th class="px-4 py-3 border-b-2 border-green-500">Tanggal Pengiriman</th>
                            <th class="px-4 py-3 border-b-2 border-red-500">Status Pengiriman</th>
                            <th class="px-4 py-3 text-center border-b-2 border-yellow-500 sm:text-left">Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        @if ($produk->count() > 0)
                            @if ($belum_terkirim->count() > 0)
                                @foreach ($belum_terkirim as $ongkir)
                                    @if ($ongkir->status == 4 || $ongkir->status == 5)
                                        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                            <td class="flex flex-row items-center px-4 py-4">
                                                <div class="flex w-10 h-10 mr-4">
                                                    <a href="#" class="relative block">
                                                        <img alt="profil" src="{{ Auth::user()->profile_photo_url }}"
                                                            class="object-cover w-10 h-10 mx-auto rounded-md" />
                                                    </a>
                                                </div>
                                                <div class="flex-1 pl-1">
                                                    <div class="font-medium dark:text-white">{{ Auth::user()->name }}</div>
                                                    <div class="text-sm text-blue-600 dark:text-gray-200">
                                                        {{ Auth::user()->email }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                {{ $ongkir->tgl_pengiriman }}
                                            </td>
                                            <td class="px-4 py-4">
                                                @if ($ongkir->status == 1)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Belum
                                                        Dikirim</span>
                                                @elseif ($ongkir->status == 2)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Dalam Pengiriman</span>
                                                @elseif ($ongkir->status == 3)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Diterima</span>
                                                @elseif ($ongkir->status == 4)
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4">
                                                <x-jet-button wire:click='lihatStatus({{$ongkir->id}})'>Status</x-jet-button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <div class="flex-1 pl-1 justify-center text-center">
                                            <div class="font-medium dark:text-white">Data Kosong</div>
                                            <div class="text-sm text-blue-600 dark:text-gray-200">
                                                Lakukan Pemesanan
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="flex-1 pl-1 justify-center text-center">
                                        <div class="font-medium dark:text-white">Data Kosong</div>
                                        <div class="text-sm text-blue-600 dark:text-gray-200">
                                            Lakukan Pemesanan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
