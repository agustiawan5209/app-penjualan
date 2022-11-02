<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('build/assets/app.9e104d4c.css')}}">
    @livewireScripts
</head>

<body>
    <div class="w-full h-16 relative bg-blue-500">
        <nav class="w-full z-50 flex flex-wrap items-center justify-between px-2 py-3 mb-3 bg-blueGray-800 shadow-md">
            <div class="flex container mx-auto flex-wrap items-center justify-between px-0 lg:px-4">
                <a class="text-sm font-bold leading-relaxed inline-flex items-center mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="#/">
                    <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-full mr-2"
                        style="width: 30px;"><span>{{ Auth::user()->name }}</span></a>
                <button
                    class="ml-auto cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-blueGray-400 rounded bg-transparent block outline-none focus:outline-none text-blueGray-300 lg:hidden"
                    type="button"><i class="fas fa-bars"></i></button>
                <div
                    class="items-center w-full lg:flex lg:w-auto flex-grow duration-300 transition-all ease-in-out hidden">
                    <ul class="lg:items-center flex flex-wrap list-none  flex-col pl-0 mb-0 lg:flex-row">
                        <li>
                            <a href="{{ route('Customer.Pesanan') }}"
                                class="hover:opacity-75 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold transition-all duration-150 ease-in-out text-white">Pesanan</a>
                        </li>
                        <li>
                            <a href="{{ route('Customer.Kiriman-Barang') }}"
                                class="hover:opacity-75 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold transition-all duration-150 ease-in-out text-white">Pengiriman
                                Barang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main>
        {{ $slot }}
    </main>
    @stack('modal')

    @livewireScripts

    <script defer src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

</body>

</html>
