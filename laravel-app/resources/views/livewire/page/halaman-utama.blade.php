<main>
    <div class="w-full relative">

        <section class="flex relative items-center p-0 min-h-screen z-0">
            <div class="absolute top-0 left-0 z-[2] w-full min-h-screen">
                <div id="particles-1" class="particles"></div>

                </div>
            <div class="absolute w-full h-full block bg-gray-800 opacity-50 z-1 left-0 top-0"></div>
            <div class="bg-gray-800 w-full h-full absolute bg-cover bg-50 wow fadeIn"
                style="background-image: linear-gradient(rgba(12, 12, 12, 0.685),  rgba(32, 32, 36, 0.267)),url({{ asset('img/asset/filehome.png') }}); background-position-y: 0px;">
            </div>
            <div class="relative h-full text-center text-white container mx-auto px-4 z-30 mb-24 ">
                <div class="justify-center flex flex-wrap -mx-4">
                    <div class="px-12 relative w-full md:w-8/12">
                        <h1 class="text-5xl font-bold leading-tight mt-0 mb-2 bg-white rounded-lg wow fadeInLeft">
                            <x-jet-application-logo />
                        </h1>
                        <p class="text-xl leading-relaxed opacity-75 mt-1 mb-4 wow fadeInLeft"
                            data-wow-duration="1500ms">Menjual Bahan Bangunan</p>
                        <a href="{{ route('shop') }}"
                            class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-gray-800 border-gray-500 active:bg-gray-600 active:border-gray-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md"><i
                                class="fas fa-shopping-cart mr-1 wow fadeInDown z-50"></i>Mulai Belanja</a>
                    </div>
                </div>
            </div>
            <div class="w-full bottom-0 absolute z-2">
                <div class="w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px);">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
        </section>

    </div>

    <section class="bg-gray-800 dark:bg-gray-900 py-4">
        <div class="w-full slick flex">
            @foreach ($slide as $item)
                <div class="w-full">@include('page.slide', ['slide'=> $item])</div>
            @endforeach
        </div>
    </section>
    <livewire:page.produklist />

    {{-- About --}}
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 wow fadeInDown mt-5">
            <div class="pb-12 md:pb-20">
                <div class="relative bg-gray-900 rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl overflow-hidden wow fadeIn grid"
                    data-aos="zoom-y-out">
                    <div class="absolute right-0 bottom-0 pointer-events-none hidden lg:block wow fadeInRight"
                        aria-hidden="true"><svg width="428" height="328" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <radialGradient cx="35.542%" cy="34.553%" fx="35.542%" fy="34.553%"
                                    r="96.031%" id="ni-a">
                                    <stop stop-color="#DFDFDF" offset="0%"></stop>
                                    <stop stop-color="#4C4C4C" offset="44.317%"></stop>
                                    <stop stop-color="#333" offset="100%"></stop>
                                </radialGradient>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g fill="#FFF">
                                    <ellipse fill-opacity=".04" cx="185" cy="15.576" rx="16"
                                        ry="15.576"></ellipse>
                                    <ellipse fill-opacity=".24" cx="100" cy="68.402" rx="24"
                                        ry="23.364"></ellipse>
                                    <ellipse fill-opacity=".12" cx="29" cy="251.231" rx="29"
                                        ry="28.231"></ellipse>
                                    <ellipse fill-opacity=".64" cx="29" cy="251.231" rx="8"
                                        ry="7.788"></ellipse>
                                    <ellipse fill-opacity=".12" cx="342" cy="31.303" rx="8"
                                        ry="7.788"></ellipse>
                                    <ellipse fill-opacity=".48" cx="62" cy="126.811" rx="2"
                                        ry="1.947"></ellipse>
                                    <ellipse fill-opacity=".12" cx="78" cy="7.072" rx="2"
                                        ry="1.947"></ellipse>
                                    <ellipse fill-opacity=".64" cx="185" cy="15.576" rx="6"
                                        ry="5.841"></ellipse>
                                </g>
                                <circle fill="url(#ni-a)" cx="276" cy="237" r="200"></circle>
                            </g>
                        </svg></div>
                    <div class="relative flex flex-col lg:flex-row justify-between items-center">
                        <div class="text-center lg:text-left lg:max-w-xl">
                            <h3 class="wow fadeInLeft h3 text-white mb-2">IrsanJaya</h3>
                            <p class="wow fadeInLeft text-gray-300 text-lg mb-6">Alamat</p>
                            <p class="wow fadeInLeft text-gray-300 text-lg mb-6">No Telpon</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
