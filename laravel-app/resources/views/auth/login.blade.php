<x-guest-layout>
    <section  style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-5">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            {{-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div> --}}
                            <div class=" d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                           <x-jet-application-logo  style="font-size: 2rem;"/>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk Ke Akun Anda</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example17"
                                                :value="old('email')" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Alamat Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name='password'
                                                :value="old('email')" class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Lupa Password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Belum Punya Akun? <a
                                                href="{{ route('register') }}" style="color: #393f81;">Daftar Disini</a>
                                        </p>
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
