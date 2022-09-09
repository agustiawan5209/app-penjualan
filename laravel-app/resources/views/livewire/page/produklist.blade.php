<section>
    <!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 mx-auto text-center">
            <h1 class="h1">Produk Yang Tersedia</h1>
            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($jenis as $jenis)
            <div class=" col-auto p-5 mt-3">
                {{-- <a href="#"><img src="./img/category_img_01.jpg" class="rounded-circle img-fluid border"></a> --}}
                <h5 class="text-center mt-3 mb-3">{{$jenis->nama_jenis}}</h5>
                <p class="text-center"><a href="{{route('katalog', ['id'=> $jenis->id, 'nama_jenis'=> $jenis->nama_jenis])}}" class="btn btn-blue-dark" >Belanja</a></p>
            </div>
        @endforeach
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Produk Terlaris</h1>
                {{-- <p>
                    Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.
                </p> --}}
            </div>
        </div>
        <div class="row">
            @foreach ($produk as $barang)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{route('shop-single')}}">
                            <img src="{{asset('upload/'. $barang->gambar)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                {{-- <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li> --}}
                                <li class="text-muted text-right">Rp. {{number_format($barang->harga,0,2)}}</li>
                            </ul>
                            <a href="{{route('Shop-detail', ['itemID'=> $barang->id])}}" class="h2 text-decoration-none text-dark">{{$barang->nama_barang}}</a>
                            <p class="card-text">
                               {{$barang->deskripsi}}
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Featured Product -->

</section>
