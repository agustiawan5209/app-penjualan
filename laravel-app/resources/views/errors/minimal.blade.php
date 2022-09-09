<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center  py-xl-5">
            <div class="col-md-12 d-flex justify-content-center py-10">
                <div class="error-template">
                    <h1>
                        Oops   @yield('code')!</h1>
                    <h2>
                        @yield('message')</h2>
                    <div class="error-details">

                    </div>
                    <div class="error-actions">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Masuk </a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Daftar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-guest-layout>
