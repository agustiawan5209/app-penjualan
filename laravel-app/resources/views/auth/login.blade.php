<x-guest-layout>
    <div class="container mx-auto flex justify-center pt-10 mt-20">
        <div class="w-full md:w-1/2 bg-white text-white">
            <form action="{{route('login')}}" method="POST" class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-reddarken-100 border-gray-800 border-y">
                @csrf
                <div class="flex-auto px-4 lg:px-10 py-6">
                    <div class="text-reddarken-500 text-center mb-3 font-bold text-3xl text-black"><small>Login</small>
                        <x-jet-validation-errors />
                    </div>
                    <form>
                        <div class="relative w-full">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Email</label>
                            <div class="mb-3 pt-0"><input placeholder="Email" name="email" type="email"
                                    class="border-transparent shadow px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                            </div>
                        </div>
                        <div class="relative w-full">
                            <label class="block uppercase text-gray-700 text-xs font-bold mb-2 ml-1">Password</label>
                            <div class="mb-3 pt-0"><input placeholder="Password" name="password" type="password"
                                    class="border-transparent shadow px-3 py-2 text-sm  w-full placeholder-gray-200 text-gray-700 relative bg-white rounded-md outline-none focus:ring focus:ring-lightBlue-500 focus:ring-1 focus:border-lightBlue-500 border border-solid transition duration-200 ">
                            </div>
                        </div>
                        {{-- <div class="mt-2 inline-block"><label class="inline-flex items-center cursor-pointer"><input
                                    type="checkbox"
                                    class="form-checkbox appearance-none ml-1 w-5 h-5 ease-linear transition-all duration-150 border border-gray-300 rounded checked:bg-gray-700 checked:border-gray-700 focus:border-gray-300"><span
                                    class="ml-2 text-sm font-semibold text-gray-500">Subscribe to
                                    Newsletter</span></label></div> --}}
                        <div class="text-center mt-6"><button type="submit"
                                class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2  text-white bg-gray-800 border-gray-800 active:bg-gray-900 active:border-gray-900 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Masuk</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
