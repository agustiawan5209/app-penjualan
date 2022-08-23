@if ($title == "Dekstop")
<div class="relative bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
            <div class="col-start-2 grid grid-cols-2 gap-x-8">
                <div class="group relative text-base sm:text-sm">
                    <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                            alt="Models sitting back to back, wearing Basic Tee in black and bone."
                            class="object-center object-cover">
                    </div>
                    <a href="#" class="mt-6 block font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        {{$title}}
                    </a>
                    <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>

                <div class="group relative text-base sm:text-sm">
                    <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                        <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                            alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                            class="object-center object-cover">
                    </div>
                    <a href="#" class="mt-6 block font-medium text-gray-900">
                        <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                        Basic Tees
                    </a>
                    <p aria-hidden="true" class="mt-1">Shop now</p>
                </div>
            </div>
            <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                <div>
                    <p id="Clothing-heading" class="font-medium text-gray-900">
                        Clothing</p>
                    <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Tops </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Dresses
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Pants </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Denim </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Sweaters
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> T-Shirts
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Jackets
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Activewear
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Browse All
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p id="Accessories-heading" class="font-medium text-gray-900">Accessories</p>
                    <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Watches
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Wallets
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Bags </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Sunglasses
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Hats </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Belts </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p id="Brands-heading" class="font-medium text-gray-900">
                        Brands</p>
                    <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Full Nelson
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> My Way </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Re-Arranged
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Counterfeit
                            </a>
                        </li>

                        <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Significant
                                Other </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif($title == "Mobile")
<div id="tabs-1-panel-1" class="pt-10 pb-8 px-4 space-y-10" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
    <div class="grid grid-cols-2 gap-x-4">
        <div class="group relative text-sm">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                    alt="Models sitting back to back, wearing Basic Tee in black and bone."
                    class="object-center object-cover">
            </div>
            <a href="#" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                New Arrivals
            </a>
            <p aria-hidden="true" class="mt-1">Shop now</p>
        </div>

        <div class="group relative text-sm">
            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                    alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                    class="object-center object-cover">
            </div>
            <a href="#" class="mt-6 block font-medium text-gray-900">
                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                Basic Tees
            </a>
            <p aria-hidden="true" class="mt-1">Shop now</p>
        </div>
    </div>

    <div>
        <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
        <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Tops </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Dresses </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Pants </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Denim </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Sweaters </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> T-Shirts </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Jackets </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Activewear </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Browse All </a>
            </li>
        </ul>
    </div>

    <div>
        <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">Accessories
        </p>
        <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Watches </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Wallets </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Bags </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Sunglasses </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Hats </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Belts </a>
            </li>
        </ul>
    </div>

    <div>
        <p id="women-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
        <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Full Nelson </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> My Way </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Re-Arranged </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Counterfeit </a>
            </li>

            <li class="flow-root">
                <a href="#" class="-m-2 p-2 block text-gray-500"> Significant Other </a>
            </li>
        </ul>
    </div>
</div>
@endif
