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
    <link rel="stylesheet" href="{{asset('build/assets/app.dc55f305.css')}}">
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>

    @livewireStyles
    {{--
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}
</head>

<body>
    <!-- component -->
    <header x-data="{ isOpen: false }" class="bg-white shadow">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a class="text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" href="#">Brand</a>

                        <!-- Search input on desktop screen -->
                        <div class="mx-10 hidden md:block">
                            <input type="text"
                                class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-blue-400"
                                placeholder="Search" aria-label="Search">
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
                        <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0"
                            href="{{route('home')}}">Home</a>
                        <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0"
                            href="{{route('shop')}}">Belanja</a>
                        <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0"
                            href="{{route('Promo-Diskon')}}">Promo</a>
                        <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0"
                            href="{{route('Keranjang')}}">Keranjang</a>
                    </div>

                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                            href="{{route('login')}}">Login</a>
                        <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto"
                            href="{{route('register')}}">Daftar Gratis</a>
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


    {{ $slot }}
    <div class="w-full">
        <footer class="bg-gray-500">
            <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-reddarken-100 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="relative bg-reddarken-100 pt-8 pb-6">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap text-center lg:text-left">
                        <div class="w-full lg:w-6/12 px-4">
                            <h4 class="text-xl mt-4 font-bold">Let's keep in touch!</h4>
                            <h5 class="mt-1 mb-2 text-reddarken-500">Find us on any of these platforms, we respond 1-2
                                business days.</h5>
                            <div class="mt-6 lg:mb-0 mb-6"><a href="https://twitter.com/CreativeTim/" target="_blank"
                                    class="bg-white text-twitter-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                    type="button"><i class="fab fa-twitter"></i></a><a
                                    href="https://www.facebook.com/CreativeTim/" target="_blank"
                                    class="bg-white text-facebook-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                    type="button"><i class="fab fa-facebook"></i></a><a
                                    href="https://dribbble.com/creativetim" target="_blank"
                                    class="bg-white text-dribbble-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                    type="button"><i class="fab fa-dribbble"></i></a><a
                                    href="https://github.com/creativetimofficial" target="_blank"
                                    class="bg-white text-github-regular shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-flex"
                                    type="button"><i class="fab fa-github"></i></a></div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="flex flex-wrap items-top mb-6">
                                <div class="w-full lg:w-4/12 px-4 ml-auto">
                                    <span class="block uppercase text-xs font-bold mb-2">Useful Links</span>
                                    <ul class="list-unstyled"><a
                                            href="https://www.creative-tim.com/presentation?npr-landing-1"
                                            target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">About
                                            Us</a><a href="https://www.creative-tim.com/blog?npr-landing-1"
                                            target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Blog</a><a
                                            href="https://github.com/creativetimofficial" target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Github</a><a
                                            href="https://www.creative-tim.com/templates/free?npr-landing-1"
                                            target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Free
                                            Products</a></ul>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 ml-auto">
                                    <span class="block uppercase text-xs font-bold mb-2">Other Resources</span>
                                    <ul class="list-unstyled"><a
                                            href="https://www.creative-tim.com/license?npr-landing-1" target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">License</a><a
                                            href="https://www.creative-tim.com/terms?npr-landing-1" target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Terms
                                            &amp; Conditions</a><a
                                            href="https://www.creative-tim.com/privacy?npr-landing-1" target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Privacy
                                            Policy</a><a href="https://www.creative-tim.com/contact-us?npr-landing-1"
                                            target="_blank"
                                            class="text-reddarken-500 hover:text-reddarken-700 block pb-2 text-sm">Contact
                                            Us</a></ul>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
