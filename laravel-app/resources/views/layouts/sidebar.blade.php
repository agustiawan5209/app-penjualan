<ul class="md:flex-col md:min-w-full flex flex-col list-none border-b">
    @can('Manage-Admin', User::class)
        <li class="items-center  ">
            <a href="{{ route('Admin.Dashboard-Admin') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Dashboard-Admin') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class="mr-2 text-sm opacity-75"></i>
                Dashboard
            </a>
        </li>
        <li class="items-center" x-data="{ Master: false }">
            <a href="#" @click="Master =! Master"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Barang') || request()->routeIs('Admin.Page-Promo') || request()->routeIs('Admin.Page-Voucher') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Master Barang
            </a>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-reddarken" x-show="Master" x-transition>
                <li class="items-center">
                    <a href="{{ route('Admin.Page-Barang') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Kelola Barang
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('Admin.Page-Promo') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Promo
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('Admin.Page-Voucher') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Voucher
                    </a>
                </li>
            </ul>
        </li>
        <li class="items-center">
            <a href="{{ route('Admin.Page-Penjualan') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Penjualan') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Penjualan
            </a>
        </li>
        <li class="items-center">
            <a href="{{ route('Page-Pengiriman') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Page-Pengiriman') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Pengiriman Barang
            </a>
        </li>

        <li class="items-center" x-data="{ Transaksi: false }">
            <a href="#" @click="Transaksi =! Transaksi"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Barang') || request()->routeIs('Admin.Page-Promo') || request()->routeIs('Admin.Page-Voucher') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Transaksi Barang
            </a>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-reddarken" x-show="Transaksi" x-transition>
                <li class="items-center">
                    <a href="{{ route('Admin.Stok-Barang-Masuk') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Barang Masuk
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('Admin.Stok-Barang-Keluar') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Barang Keluar
                    </a>
                </li>
            </ul>
        </li>

        <li class="items-center" x-data="{ Laporan: false }">
            <a href="#" @click="Laporan =! Laporan"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Barang') || request()->routeIs('Admin.Page-Promo') || request()->routeIs('Admin.Page-Voucher') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Laporan Barang
            </a>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-reddarken" x-show="Laporan" x-transition>
                <li class="items-center">
                    <a href="{{ route('Admin.Laporan-barang-masuk') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Barang Masuk
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('Admin.Laporan-barang-keluar') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Barang Keluar
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('Admin.Laporan') }}"
                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                        Penjualan
                    </a>
                </li>
            </ul>
        </li>
    @endcan
    @can('Manage-Customer', User::class)
        <li class="items-center  ">
            <a href="{{ route('Customer.Dashboard-User') }}"
                class="text-xs uppercase py-3 pl-3 font-bold block {{ request()->routeIs('Customer.Dashboard-User') ? ' bg-white text-reddarken' : 'text-white' }}">
                {{-- <i class="fas fa-tv mr-2 text-sm opacity-75"></i> --}}
                Dashboard
            </a>
        </li>
        <li class="items-center">
            <a href="{{ route('Customer.Pesanan') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Customer.Pesanan') ? ' bg-white text-reddarken' : 'text-white' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Pesanan
            </a>
            {{-- <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-reddarken" x-show="Master" x-transition>
            <li class="items-center">
                <a href="{{ route('Admin.Page-Barang') }}"
                    class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                    Kelola Barang
                </a>
            </li>
            <li class="items-center">
                <a href="{{ route('Admin.Page-Promo') }}"
                    class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                    Promo
                </a>
            </li>
            <li class="items-center">
                <a href="{{ route('Admin.Page-Voucher') }}"
                    class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                    Voucher
                </a>
            </li>
        </ul> --}}
        </li>
        <li class="items-center">
            <a href="{{ route('Customer.Kiriman-Barang') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Customer.Kiriman-Barang') ? ' bg-white text-reddarken' : 'text-white' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Kiriman Barang
            </a>
        </li>
    @endcan
    <li class="items-center">
       <hr class="my-2 border-reddarken">
    </li>

</ul>
@can ('Manage-Admin', User::class)
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center">
            <a href="{{ route('profile.show') }}"
            class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('profile.show') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            <i class="mr-2 text-sm opacity-75"></i>
            Setting
        </a>
        </li>
        <li class="items-center">
            <a href="{{ route('Admin.Metode-Bayar') }}"
            class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Metode-Bayar') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            <i class="mr-2 text-sm opacity-75"></i>
            Bank
        </a>
        </li>
        <li class="items-center">
            <a href="{{ route('Admin.Slide-setting') }}"
            class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Slide-setting') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            <i class="mr-2 text-sm opacity-75"></i>
            Slide Setting
        </a>
        </li>
        <li class="items-center">
            <form action="{{ route('logout') }}" method="POST"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">
                    @csrf
                    <button type='submit'
                        class=" text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">

                        Logout
                    </button>
                </form>
        </li>

    </ul>
@endcan
@can ('Manage-Customer', User::class)
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <a href="{{ route('profile.show') }}"
        class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('profile.show') ? ' bg-reddarken text-white' : 'text-gray-700 hover:text-gray-500' }}">
        <i class="mr-2 text-sm opacity-75"></i>
        Setting
    </a>
        <li class="items-center">
            <form action="{{ route('logout') }}" method="POST"
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-white">
                    @csrf
                    <button type='submit'
                        class=" text-white hover:text-gray-500 text-xs uppercase py-3 font-bold block">

                        Logout
                    </button>
                </form>
        </li>

    </ul>
@endcan
