<x-guest-layout>
    <div class="container py-5 h-full flex justify-center items-center ">
        <div class="  h-full w-full md:w-1/2 bg-white py-12 rounded-lg">
            <div class=" shadow-md p-4 p-lg-5 w-full text-black">
                <x-jet-validation-errors />
                <form action="{{ route('register') }}" method="POST" class="w-full">
                    @csrf
                    <div class="flex justify-center mb-3 pb-1">
                        <span class=" text-indigo-600 text-3xl font-bold ">Irsan</span>&nbsp;<span class="text-indigo-600 text-3xl font-bold">Jaya</span>
                    </div>
                    <div class="w-full mb-4">
                        <x-jet-input type="text" name="name" id="name" :value="old('name')"
                            class=" w-full" required autofocus
                            autocomplete="name" />
                        <x-jet-label class="w-full" for="name">Nama</x-jet-label>
                    </div>
                    <div class="w-full mb-4">
                        <x-jet-input type="email" name="email" id="email" :value="old('email')"
                            class=" w-full" />
                        <x-jet-label class="w-full" for="email">Alamat Email</x-jet-label>
                    </div>

                    <div class="w-full mb-4">
                        <x-jet-input type="password" name="password" id="form2Example27"
                            class=" w-full" />
                        <x-jet-label class="w-full" for="form2Example27">Password</x-jet-label>
                    </div>
                    <div class="w-full mb-4">
                        <x-jet-input type="password" name="password_confirmation" id="form2Example27"
                            class=" w-full" />
                        <x-jet-label class="w-full" for="form2Example27">Ulangi Password</x-jet-label>
                    </div>

                    <div class="pt-1 mb-4">
                        <x-jet-button class="btn btn-dark btn-lg btn-block" type="submit">Daftar</x-jet-button>
                    </div>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah Punya Akun? <a
                            href="{{ route('login') }}" style="color: #393f81;">Masuk</a></p>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
