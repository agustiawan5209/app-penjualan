<main>
    <div class="w-full relative">

        <section class="flex relative items-center max-w-6xl mx-auto p-0 h-full z-0">
            <div class="conteiner mx-auto px-16">
                <video autoplay loop muted>
                    <source src="{{asset('video/slide.mp4')}}" type="video/mp4">
                    <source src="{{asset('video/slide.mp4')}}" type="video/ogg">
                    Your browser does not support the video tag.
                  </video>
            </div>
        </section>

    </div>

    <section class="bg-gray-800 dark:bg-gray-900 py-4">
        <div class="w-full slick flex">
            @foreach ($slide as $item)
                <div class="w-full">@include('page.slide', ['slide' => $item])</div>
            @endforeach
        </div>
    </section>
    <livewire:page.produklist />

    {{-- About --}}
    <section class="relative">

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
