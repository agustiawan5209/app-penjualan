<section
    class="flex lg:flex-row flex-col w-full mx-auto bg-[#192a56] dark:bg-gray-800 px-2 sm:px-8 py-8 my-8 items-center">
    <div class="w-full lg:1/2 px-2 sm:px-8 items-center">
        <div class="lg:hidden">

            <h1
                class="text-3xl sm:text-4xl font-medium py-4 xl:py-4 text-gray-100 dark:text-gray-50 sm:mr-8 leading-snug xl:leading-normal">
                {{$slide->deskripsi}}
            </h1>
        </div>
        <div class="relative" style="padding-top: 56.25%">
            <img class="absolute inset-0 w-full h-full rounded-sm border border-white"
                src="{{ asset('upload/' . $slide->thumbnail) }}" alt="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </div>
    </div>
    <div class="w-full lg:1/2 sm:px-8 items-center">
        <div class="hidden lg:block">
            <h1
                class="text-3xl sm:text-4xl font-medium py-4 xl:py-4 text-gray-100 dark:text-gray-50 sm:mr-8 leading-snug xl:leading-normal">
                {{$slide->deskripsi}}
            </h1>
        </div>
    </div>
</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
