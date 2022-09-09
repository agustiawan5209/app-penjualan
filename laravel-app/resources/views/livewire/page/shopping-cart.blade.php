<section class="h-100 h-custom" style="background-color: #eee;">
    @include('sweetalert::alert')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="{{url()->previous()}}" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Detail Keranjang</p>
                                        <p class="mb-0">Jumlah Keranjang {{$cart->count()}}</p>
                                    </div>
                                    {{-- <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div> --}}
                                </div>

                                @foreach ($cart as $keranjang)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="{{ asset('upload/' . $keranjang->barang->gambar) }}"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5>{{ $keranjang->barang->nama_barang }}</h5>
                                                        <p class="small mb-0">
                                                            {{ $keranjang->barang->jenis->nama_jenis }},
                                                            {{ $keranjang->barang->satuan->nama_satuan }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 50px;">
                                                        <h5 class="fw-normal mb-0">{{$quantity}}</h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">Rp {{ number_format($keranjang->sub_total) }}
                                                        </h5>
                                                    </div>
                                                    <a href="#!" wire:click='removeCart({{ $keranjang->id }})'
                                                        style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-5">

                                <div class="card bg-blue-dark text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Detail Transaksi</h5>
                                            <img src="{{Auth::user()->profile_photo_url}}"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>

                                        <form class="mt-4" enctype="multipart/form-data">

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeName">Bukti Transaksi</label>
                                                <input type="file" id="typeName"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="Cardholder's Name" />
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeText">Nama</label>
                                                <input type="text" id="typeText"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <label class="form-label" for="typeExp">Tanggal Transaksi</label>
                                                        <input type="date" id="typeExp"
                                                            class="form-control form-control-lg" placeholder="MM/YYYY"
                                                            size="7" id="exp" minlength="7"
                                                            maxlength="7" />
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">Rp. {{number_format($sub_total, 0,2)}}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Potongan</p>
                                            <p class="mb-2">Rp. {{number_format($potongan, 0,2)}}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total Bayar</p>
                                            <p class="mb-2">Rp. {{number_format($total_bayar, 0,2)}}</p>
                                        </div>

                                        <button type="button" class="btn btn-light btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                {{-- <span class="mr-2">Rp. {{number_format($total_bayar, 0,2)}}</span> --}}
                                                <span class=" ml-lg-1">Lakukan Pemesanan <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>

                                    </div>
                                </div>

                            </div>
                            {{-- Dialog Modal --}}
                            <x-jet-dialog-modal wire:model='Keranjang'>
                                <x-slot name="title"></x-slot>
                                <x-slot name="content">
                                    Apakah Anda Yakin?
                                </x-slot>
                                <x-slot name="footer">
                                    <x-jet-button type='button' wire:model='removeCart({{ $itemID }})'>Ya
                                    </x-jet-button>
                                    <x-jet-danger-button type='button' wire:model="$toggle('Keranjang')"
                                        wire:loading.attr='disabled'>Tidak</x-jet-danger-button>
                                </x-slot>
                            </x-jet-dialog-modal>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
