<div>
    <!-- Open Content -->
    @include('sweetalert::alert')
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{asset('upload/'. $barang->gambar)}}" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$barang->nama_barang}}</h1>
                            <p class="h3 py-2">{{number_format($barang->harga, 0,2)}}</p>
                            <h6>Deskripsi:</h6>
                            <p>{{$barang->deskripsi}}.</p>
                            {{-- <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Avaliable Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>White / Black</strong></p>
                                </li>
                            </ul> --}}

                            <h6>Katalog:</h6>
                            <ul class="list-unstyled pb-3">
                                @foreach ( (object) $barang->katalog as $katalog)
                                            <li class="list-inline-item"><span class="btn btn-orange-dark btn-size">{{$katalog->nama_katalog}}</span></li>
                                            @endforeach
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Jumlah
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-blue-dark" id="btn-minus" wire:click='countminus'>-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value" >{{$count}}</span></li>
                                            <li class="list-inline-item"><span class="btn btn-blue-dark" id="btn-plus" wire:click='countplus'>+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    {{-- <div class="col d-grid">
                                        <button type="button" class="btn btn-blue-dark btn-lg" name="button" value="buy">Beli</button>
                                    </div> --}}
                                    <div class="col d-grid">
                                        <button type="button"  wire:click='addToCart({{$barang->id}})' class="btn btn-blue-dark btn-lg" name="button" value="addtocard">Masukan Keranjang</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div class=" row">

                @foreach ($barang_lain as $barang)
                            <div class="col-md-3">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <img class="card-img rounded-0 img-fluid"
                                            src="{{ asset('upload/' . $barang->gambar) }}">
                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                {{-- <li><a class="btn btn-blue-dark text-white"
                                                        href="{{ route('shop-single') }}"><i
                                                            class="far fa-heart"></i></a></li> --}}
                                                <li><a class="btn btn-blue-dark text-white mt-2"
                                                        href="#Detail/{{ $barang->id }}"
                                                        wire:click='ShowDetail({{ $barang->id }})'><i
                                                            class="far fa-eye"></i></a></li>
                                                <li><a class="btn btn-blue-dark text-white mt-2" href="#Cart"
                                                        wire:click='addToCart({{ $barang->id }})'><i
                                                            class="fas fa-cart-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('shop-single') }}"
                                            class="h3 text-decoration-none">{{ $barang->nama_barang }}</a>
                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                            <li>{{ $barang->jenis->nama_jenis }}//{{ $barang->satuan->nama_satuan }}/XL
                                            </li>
                                            <li class="pt-2">
                                                <span
                                                    class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                            </li>
                                        </ul>
                                        @php
                                            $card_potongan = [0];
                                        @endphp
                                        @if ($barang->diskon->count() > 0)
                                            <ul class="list-unstyled d-flex justify-content-end mb-1">
                                                <li>
                                                    @foreach ($barang->diskon as $item)
                                                        Potongan
                                                        {{ $item->jumlah_diskon }}%
                                                        @php
                                                            $card_potongan[] = $item->jumlah_diskon;
                                                        @endphp
                                                    @endforeach
                                                </li>
                                            </ul>
                                            <div class=" d-flex justify-content-between flex-row-reverse">
                                                <p
                                                    class="text-left font-bold mb-0 text-danger text-decoration-line-through">
                                                    @php
                                                        $hasil = $barang->harga * (array_sum($card_potongan) / 100);
                                                    @endphp
                                                    {{ number_format($hasil, 0, 2) }} %</p>
                                        @endif
                                        <p class="text-left font-bold mb-0">Rp.
                                            {{ number_format($barang->harga, 0, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

            </div>


        </div>
    </section>
    <!-- End Article -->
</div>
