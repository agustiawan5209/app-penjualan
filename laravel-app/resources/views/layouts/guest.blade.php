<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Irsan Jaya') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('build/assets/app.9e104d4c.css')}}">
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>
    @livewireStyles


    <script src="{{ asset('js/sweetalert.all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    {{--
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
    <style>
        .hero-shop {
            background-image: url('img/elcarito-MHNjEBeLTgw-unsplash.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="overflow-x-hidden bg-gray-800">
    <!-- component -->
    <header x-data="{ isOpen: false }" class=" bg-white md:bg-transparent  shadow-lg absolute top-0 z-[1000] w-full ">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a class="text-gray-800 font-Times text-xl font-bold md:text-2xl bg-white rounded-full px-3 group-hover:bg-white"
                            href="#">
                            Irsan Jaya
                        </a>

                        <!-- Search input on desktop screen -->
                        <div class="mx-10 hidden md:block">
                            {{-- {{route('shop', ['jenis'=> $item->id])}} --}}
                            <form action="{{ route('shop') }}" method="get">
                                @csrf
                                <input type="search"
                                    class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400"
                                    placeholder="Search" name="jenis" aria-label="Search">
                                <button type="submit" class=" bg-white p-2 rounded-sm">Cari</button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button @click="isOpen = !isOpen" type="button"
                            class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
                    <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                        <a class="my-1 text-sm font-bold text-gray-800 leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('home') }}">Home</a>
                        <a class="my-1 text-sm font-bold text-gray-800 leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('shop') }}">Belanja</a>
                        <a class="my-1 text-sm font-bold text-gray-800 leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('Promo-Diskon') }}">Promo</a>
                        <a class="my-1 text-sm font-bold text-gray-800 leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('Keranjang') }}">Keranjang</a>
                    </div>

                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        @if (Route::has('login'))
                            @auth
                            @can('Manage-Customer')
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                href="{{ route('Customer.Dashboard-User') }}">Dashboard</a>
                        @endcan
                        @can('Manage-Admin')
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                href="{{ route('Admin.Dashboard-Admin') }}">Dashboard</a>
                        @endcan
                            @else
                                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                    href="{{ route('login') }}">Login</a>
                                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-green-500 font-medium text-white leading-5 hover:bg-green-600 md:mx-0 md:w-auto"
                                    href="{{ route('register') }}">Daftar Gratis</a>

                            @endauth
                        @endif
                    </div>

                    <!-- Search input on mobile screen -->
                    <div class="mt-3 md:hidden">
                        <input type="text"
                            class="w-full px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 focus:outline-none focus:bg-white focus:shadow-outline"
                            placeholder="Search" aria-label="Search">
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main class="content bg-white pt-20">
        {{ $slot }}
    </main>
    <div class="w-full relative bottom-0">
        <footer class="bg-gray-800">
            <div class="relative py-2">
                <div class="container mx-auto px-4">
                    <hr class="my-6">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                            <div class="text-sm text-white py-1">Copyright © 2021 Notus Design System PRO by
                                Creative Tim.</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Start Footer -->
    @stack('modal')
    @livewireScripts
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    {{-- <script src="{{ asset('js/owl.lazyload.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                // autoplay:true,
                nav: true,
                // animateIn : true,
                margin: 10,
                // autoplayHoverPause : true,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 4
                    },
                    960: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                },
                smartSpeed: 2000,
                dragEndSpeed: true,
            });
            owl.on('mousewheel', '.owl-stage', function(e) {
                if (e.deltaY > 0) {
                    owl.trigger('next.owl');
                } else {
                    owl.trigger('prev.owl');
                }
                e.preventDefault();
            });
        });
    </script>
</body>

</html>
