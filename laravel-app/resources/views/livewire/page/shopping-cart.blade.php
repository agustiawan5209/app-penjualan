<!-- This example requires Tailwind CSS v2.0+ -->
<div class="ml-4 flow-root lg:ml-6" x-data="{ Keranjang: @entangle('Keranjang').defer}">
    <a href="#_cart" @click="Keranjang = true" class="group -m-2 p-2 flex items-center">
        <!-- Heroicon name: outline/shopping-bag -->
        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{Cart::getTotalQuantity()}}</span>
        <span class="sr-only">items in cart, view bag</span>
    </a>

    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="Keranjang"
        @click.outside="Keranjang = false"
        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        >
        <!--
      Background backdrop, show/hide based on slide-over state.

      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <!--
            Slide-over panel, show/hide based on slide-over state.

            Entering: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-full"
              To: "translate-x-0"
            Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-0"
              To: "translate-x-full"
          -->
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center cursor-pointer" wire:click='show'>
                                        <button type="button"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500 cursor-pointer"></button>
                                        <span class="sr-only">Close panel</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            @foreach ($cartItems as $item)
                                                <li class="flex py-6">
                                                    <div
                                                        class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img src="{{asset('upload/'. $item['attributes']['image'])}}"
                                                            alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                            class="h-full w-full object-cover object-center">
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div
                                                                class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <a href="#"> {{$item['name']}}</a>
                                                                </h3>
                                                                <p class="ml-4">{{$item['price']}}</p>
                                                            </div>
                                                            {{-- <p class="mt-1 text-sm text-gray-500">Salmon</p> --}}
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <span>jumlah : {{$item['quantity']}}</span>
                                                            <input wire:model="quantity"
                                                            type="number" min="1" max="5"
                                                            wire:change="updateCart({{$item['id']}})" class="text-center bg-gray-100">

                                                            <div class="flex">
                                                                <button type="button" wire:click='removeCart({{$item['id']}})'
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            @endforeach
                                            <!-- More products... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>Rp {{Cart::getTotal()}}</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="#"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or <button type="button"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">Continue
                                            Shopping<span aria-hidden="true"> &rarr;</span></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
