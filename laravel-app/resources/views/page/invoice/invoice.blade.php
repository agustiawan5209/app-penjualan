<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Pesanan
            <strong>{{date("Y-m-d")}}</strong>
            {{-- <span class="float-right"> <strong>Status:</strong> Pending</span> --}}

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Dari:</h6>
                    <div>
                        <strong>{{Auth::user()->name}}</strong>
                    </div>
                    <div>{{Auth::user()->email}}</div>
                    <div>71-101 Szczecin, Poland</div>
                    <div>Email: info@webz.com.pl</div>
                    <div>Phone: +48 444 666 3333</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">Ke:</h6>
                    <div>
                        <strong>Bob Mart</strong>
                    </div>
                    <div>Irsan Jaya</div>
                    <div>43-190 Mikolow, Poland</div>
                    <div>Email: marek@daniel.com</div>
                    <div>Phone: +48 123 456 789</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            {{-- <th>Description</th> --}}

                            <th class="right">Harga</th>
                            <th class="center">Jumlah</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $keranjang)
                            <tr>
                                <td class="center">{{$loop->iteration}}</td>
                                <td class="left strong">{{$keranjang->barang->nama_barang}}</td>
                                {{-- <td class="left">Extended License</td> --}}

                                <td class="right">{{$keranjang->total_awal}}</td>
                                <td class="center">{{$keranjang->quantity}}</td>
                                <td class="right">{{$keranjang->sub_total}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">Rp. {{ number_format($sub_total, 0, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Potongan</strong>
                                </td>
                                <td class="right">Rp. {{ number_format($potongan, 0, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>Rp. {{ number_format($total_bayar, 0, 2) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
