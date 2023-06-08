<main>
    @include('sweetalert::alert')
    <x-jet-banner></x-jet-banner>
    @if (Auth::check())
        <livewire:banner-voucher />
    @endif
    <div class="w-full relative">

        <section class="flex relative items-center max-w-6xl mx-auto p-0 h-full z-0">
            <div class="conteiner mx-auto px-16">
                <video autoplay loop muted>
                    <source src="{{ asset('video/slide.mp4') }}" type="video/mp4">
                    <source src="{{ asset('video/slide.mp4') }}" type="video/ogg">
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
                            <h1 class="wow fadeInLeft h3 text-white mb-2 md:text-2xl">Tentang Toko
                                <strong>Irsanjaya</strong>
                            </h1>
                            <ul class="space-y-6 py-3">
                                <li class="flex flex-row gap-4 wow fadeInLeft ">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-full">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </span>
                                    <div class="flex justify-items-center flex-col">
                                        <span>WhatsApp</span>
                                        <p class="text-gray-300 text-lg">+62 822-1727-3176</p>
                                    </div>
                                </li>
                                <li class="flex flex-row gap-4 wow fadeInLeft ">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-full">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>

                                    </span>
                                    <div class="flex justify-items-center flex-col">
                                        <span>Alamat</span>
                                        <p class="text-gray-300 text-lg"> Jl. Trans Sulawesi,
                                            Simbula, Kolaka Utara</p>
                                    </div>
                                </li>
                                <li class="flex flex-row gap-4 wow fadeInLeft ">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-full">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>

                                    </span>
                                    <div class="flex justify-items-center flex-col">
                                        <span>Email</span>
                                        <p class="text-gray-300 text-lg">
                                            TokobangunanIrsanjaya@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                Toko bangunan Irsanjaya merupakan toko bahan bangunan online yang menyediakan berbagai
                                bahan material secara lengkap untuk kebutuhan pengerjaan bangunan mulai dari rumah, ruko
                                hingga gedung perkantoran anda dapat beli bahan bangunan online dengan lengkap dan
                                terpercaya, serta memiliki mutu kualitas yang terjamin dari ruko bangunan lengkap
                                seperti toko bangunan Irsanjaya.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
