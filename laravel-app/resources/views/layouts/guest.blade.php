<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('js/sweetalert.all.js') }}"></script>

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    {{--
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
</head>

<body class="overflow-x-hidden">
    <!-- component -->
    <header x-data="{ isOpen: false }" class="bg-gray-700 shadow-lg fixed top-0 z-[1000] w-full ">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a class="text-gray-800 text-xl font-bold md:text-2xl bg-white rounded-full px-3 group-hover:bg-white"
                            href="#">
                            <x-jet-application-logo />
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
                        <a class="my-1 text-sm text-white leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0"
                            href="{{ route('home') }}">Home</a>
                        <a class="my-1 text-sm text-white leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0"
                            href="{{ route('shop') }}">Belanja</a>
                        <a class="my-1 text-sm text-white leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0"
                            href="{{ route('Promo-Diskon') }}">Promo</a>
                        <a class="my-1 text-sm text-white leading-5 hover:text-red-600 hover:underline md:mx-4 md:my-0"
                            href="{{ route('Keranjang') }}">Keranjang</a>
                    </div>

                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                            href="{{ route('login') }}">Login</a>
                        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto"
                            href="{{ route('register') }}">Daftar Gratis</a>
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


    <main class="content mt-16 pt-3">
        {{ $slot }}
    </main>
    <div class="w-full relative bottom-0">
        <footer class="bg-gray-500">
            <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-reddarken-100 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="relative bg-slate-100 pt-8 pb-6">
                <div class="container mx-auto px-4">
                    <hr class="my-6 border-reddarken-200">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                            <div class="text-sm text-reddarken-500 py-1">Copyright © 2021 Notus Design System PRO by
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
    <script src="{{ asset('js/owl.lazyload.js') }}"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                autoplay:false,
                nav: true,
                animateIn : true,
                margin: 10,
                autoplayHoverPause : true,
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
