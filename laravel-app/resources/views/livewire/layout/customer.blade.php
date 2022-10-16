<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('build/assets/app.dc55f305.css')}}">
    <script src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>
    @livewireScripts
</head>

<body>
    <div class="w-full h-16 relative bg-blue-500">
        <nav class="w-full z-50 flex flex-wrap items-center justify-between px-2 py-3 mb-3 bg-blueGray-800 shadow-md">
          <div class="flex container mx-auto flex flex-wrap items-center justify-between px-0 lg:px-4">
            <a class="text-sm font-bold leading-relaxed inline-flex items-center mr-4 py-2 whitespace-nowrap uppercase text-white" href="#/">
            <img src="{{Auth::user()->profile_photo_url}}" class="rounded-full mr-2" style="width: 30px;"><span>{{Auth::user()->name}}</span></a>
            <button class="ml-auto cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-blueGray-400 rounded bg-transparent block outline-none focus:outline-none text-blueGray-300 lg:hidden" type="button"><i class="fas fa-bars"></i></button>
            <div class="items-center w-full lg:flex lg:w-auto flex-grow duration-300 transition-all ease-in-out hidden">
              <ul class="lg:items-center flex flex-wrap list-none pl-0 mb-0 flex flex-col list-none pl-0 mb-0 lg:flex-row">
                <li>
                  <a href="{{route('Customer.Pesanan')}}" class="hover:opacity-75 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold transition-all duration-150 ease-in-out text-white">Pesanan</a>
                </li>
                <li>
                  <a href="{{route('Customer.Kiriman-Barang')}}" class="hover:opacity-75 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold transition-all duration-150 ease-in-out text-white">Pengiriman Barang</a>
                </li>
                <li class="relative">
                  <a class="hover:opacity-75 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold transition-all duration-150 ease-in-out text-white" href="javascript:;">Demo Pages <i class="ml-1 fas fa-caret-down transition-all duration-200 ease-in-out transform "></i></a>
                  <div class="hidden  z-50">
                    <div class="origin-top-right bg-white text-base float-left p-2 border list-none text-left rounded-lg shadow-lg min-w-48 transition-all duration-100 ease-in-out transform scale-95 opacity-0 absolute "><span class="uppercase font-bold text-xs px-3 pt-4 block w-full whitespace-nowrap bg-transparent text-blueGray-400">Group 1</span>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 1</a>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 2</a>
                      <span class="uppercase font-bold text-xs px-3 pt-4 block w-full whitespace-nowrap bg-transparent text-blueGray-400">Group 2</span>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 3</a>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 4</a>
                      <span class="uppercase font-bold text-xs px-3 pt-4 block w-full whitespace-nowrap bg-transparent text-blueGray-400">Group 3</span>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 5</a>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 6</a>
                      <span class="uppercase font-bold text-xs px-3 pt-4 block w-full whitespace-nowrap bg-transparent text-blueGray-400">Group 4</span>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 7</a>
                      <a href="javascript:;" class="text-sm px-3 py-2 block w-full whitespace-nowrap bg-transparent hover:bg-blueGray-100 rounded transition-all duration-100">Demo Page 8</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <main>
        {{$slot}}
      </main>
    @stack('modal')

    @livewireScripts
</body>

</html>
