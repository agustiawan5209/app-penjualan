<x-guest-layout>
    <section class="" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-6">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class=" d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <x-jet-validation-errors />
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                          <x-jet-application-logo />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="name" id="name" :value="old('name')"
                                                class="form-control form-control-lg" required autofocus
                                                autocomplete="name" />
                                            <label class="form-label" for="name">Nama</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="email" :value="old('email')"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Alamat Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password_confirmation" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Ulangi Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Daftar</button>
                                        </div>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah Punya Akun? <a
                                                href="{{ route('login') }}" style="color: #393f81;">Masuk</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
