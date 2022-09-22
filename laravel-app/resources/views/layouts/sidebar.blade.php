<ul class="md:flex-col md:min-w-full flex flex-col list-none">
    @can('Manage-Admin', User::class)
        <li class="items-center  ">
            <a href="{{ route('Admin.Dashboard-Admin') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Dashboard-Admin') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                Dashboard
            </a>
        </li>
        <li class="items-center" x-data="{ Master: false }">
            <a href="#" @click="Master =! Master"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Barang') || request()->routeIs('Admin.Page-Promo') || request()->routeIs('Admin.Page-Voucher') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Master Barang
            </a>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-blue-darken" x-show="Master" x-transition>
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
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Page-Penjualan') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Penjualan
            </a>
        </li>
        <li class="items-center">
            <a href="{{ route('Page-Pengiriman') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Page-Pengiriman') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Pengiriman Barang
            </a>
        </li>


        <li class="items-center">
            <a href="{{ route('Admin.Laporan') }}"
                class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Admin.Laporan') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
                <i class=" mr-2 text-sm text-gray-300"></i>
                Laporan
            </a>
        </li>
    @endcan
    @can('Manage-Customer', User::class)
    <li class="items-center  ">
        <a href="{{ route('Customer.Dashboard-User') }}"
            class="text-xs uppercase py-3 pl-3 font-bold block {{ request()->routeIs('Customer.Dashboard-User') ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            {{-- <i class="fas fa-tv mr-2 text-sm opacity-75"></i> --}}
            Dashboard
        </a>
    </li>
    <li class="items-center" >
        <a href="{{route('Customer.Pesanan')}}"
            class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Customer.Pesanan')? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            <i class=" mr-2 text-sm text-gray-300"></i>
            Pesanan
        </a>
        {{-- <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-blue-darken" x-show="Master" x-transition>
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
    <li class="items-center" >
        <a href="{{route('Customer.Kiriman-Barang')}}"
            class="text-xs uppercase py-3 font-bold block {{ request()->routeIs('Customer.Kiriman-Barang')   ? ' bg-blue-darken text-white' : 'text-gray-700 hover:text-gray-500' }}">
            <i class=" mr-2 text-sm text-gray-300"></i>
            Kiriman Barang
        </a>
        {{-- <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-blue-darken" x-show="Master" x-transition>
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
    @endcan
</ul>
