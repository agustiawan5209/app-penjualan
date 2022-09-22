<div>
    <div class="w-100 mt-10" style="margin-top: 50px;" wire:model.defer="bayardetail" wire:loading.class="opacity-25">

        <div class="card bg-blue-dark text-white rounded-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">Detail Pesanan</h5>
                    <x-jet-validation-errors></x-jet-validation-errors>
                    <img src="{{ Auth::user()->profile_photo_url }}" class="img-fluid rounded-3" style="width: 45px;"
                        alt="Avatar">
                </div>

                <form action="{{ route('Customer.Pembayaran-Selesai') }}" id="submitPay" method="POST" class="mt-4"
                    enctype="multipart/form-data" x-data="{ Radio: 0, }">
                    @csrf
                    <div class="form-outline form-white mb-4 d-flex justify-content-around">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="metode" checked name="metode" class="custom-control-input "
                                x-model="Radio" value="2">
                            <label class="custom-control-label" for="metode">Ambil
                                Sendiri</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="metode"
                                class="custom-control-input" x-model="Radio" value="1">
                            <label class="custom-control-label" for="customRadioInline2">Kirim
                                Barang</label>
                        </div>
                    </div>
                    <h5 class="mb-0" x-show="Radio == 1">Isi Form Untuk Pengiriman
                        Barang</h5>
                    <div class="form-outline form-white mb-4" x-show="Radio == 1">
                        <label class="form-label" for="typeText">Kabupaten</label>
                        <input type="text" id="typeText" class="form-control form-control-lg"
                            placeholder=".........." name="kabupaten" />
                    </div>
                    <div class="form-outline form-white mb-4 " x-show="Radio == 1">
                        <label class="form-label" for="typeText">Kecamatan</label>
                        <input type="text" id="typeText" class="form-control form-control-lg"
                            placeholder=".........." name="kecamatan" />
                    </div>
                    <div class="form-outline form-white mb-4 " x-show="Radio == 1">
                        <label class="form-label" for="typeText">Kode Pos</label>
                        <input type="text" id="typeText" class="form-control form-control-lg"
                            placeholder=".........." name="kode_pos" />
                    </div>
                    <div class="form-outline form-white mb-4" x-show="Radio == 1">
                        <label class="form-label" for="typeText">Alamat</label>
                        <input type="text" id="typeText" class="form-control form-control-lg"
                            placeholder=".........." name="alamat" />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typeName">Bukti Transaksi</label>
                        <input type="file" id="typeName" name="foto" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline form-white mb-4 has-validation">
                        <label class="form-label" for="namaUser">Nama</label>
                        <input type="text" id="namaUser" name="nama" class="form-control form-control-lg " :old="$nama"/>
                        @error('nama')
                        <div id="namaUser" class="text-danger">
                            Masukkan Nama
                        </div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline form-white">
                                <label class="form-label" for="typeExp">Tanggal
                                    Transaksi</label>
                                <input type="date" id="typeExp" class="form-control form-control-lg"
                                    placeholder="MM/YYYY" name="tgl_transaksi" />
                            </div>
                        </div>
                    </div>



                    <hr class="my-4">
                    <table class="w-100 table table-active color-white">

                        <tr class="heading-item text-white">
                            <th>#</th>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                        @foreach ($cart as $item)
                            <tr class="item text-white" style="border: 1px solid #bbbabb;">
                                <td style="width: 10px;">{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->total_awal }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->sub_total }}</td>
                            </tr>
                        @endforeach
                        <tr class="">
                            <td colspan="4" class="mb-2 border-0 border-r border-white text-white">Subtotal
                            </td>
                            <td class="mb-2 text-white">Rp. {{ number_format($sub_total, 0, 2) }}
                            </td>
                        </tr>

                        <tr class="">
                            <td colspan="4" class="mb-2 border-0 border-r border-white text-white">Potongan
                            </td>
                            <td class="mb-2 text-white">Rp. {{ number_format($potongan, 0, 2) }}
                            </td>
                        </tr>

                        <tr class="">
                            <td colspan="4" class="mb-2 border-0 border-r border-white text-white">Total Bayar
                            </td>
                            <td class="mb-2 text-white">Rp.
                                {{ number_format($total_bayar, 0, 2) }}</td>
                                <input type="hidden" name="sub_total" value="{{$total_bayar}}">
                        </tr>
                    </table>


                    <button type="submit" id="Paybutton" class="btn btn-light btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                            {{-- <span class="mr-2">Rp. {{number_format($total_bayar, 0,2)}}</span> --}}
                            <span class=" ml-lg-1">Lakukan Pemesanan <i
                                    class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                    </button>
                    <button type="reset" class="btn btn-danger btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                            {{-- <span class="mr-2">Rp. {{number_format($total_bayar, 0,2)}}</span> --}}
                            <span class=" ml-lg-1">Batalkan <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
