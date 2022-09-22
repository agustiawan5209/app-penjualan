<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Invoice</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        /* .invoice-box table tr td:nth-child(2) {
            text-align: right;
        } */

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #bbbb;
            border: 2px solid #bbbabb;
        }
       .heading-item  {
            background: #bbbb;
            border: 1px solid #cccc;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border: 1px solid #bbbb;
        }
        .total td{
            border: 1px solid #000;
            color: black;
        }
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                ID Transaksi #: {{$transaksi_id}}<br />
                                Tanggal Transaksi: {{$request->tgl_transaksi}}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Pelanggan: <br>
                                {{ Auth::user()->name }}<br />
                                {{ Auth::user()->email }}<br />
                                {{-- Sunnyville, TX 12345 --}}
                            </td>

                            <td>
                                IrsanJaya<br />
                                John Doe<br />
                                {{-- john@example.com --}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
            <tr class="heading">
                <td>Type Pembayran</td>

                <td>BANK #</td>
            </tr>

            <tr class="details">
                <td>Metode Pengiriman</td>

                <td>
                    @if ($request->metode == 1)
                        Di Kirim
                    @else
                        Ambil Sendiri
                    @endif
                </td>
            </tr>

        </table>
        <table >

            <tr class="heading-item">
                <th>#</th>
                <th>Item</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Potongan</th>
                <th>Total</th>
                @php
                    $total = array()
                @endphp
            </tr>
            @foreach ($data['item'] as $item)
                <tr class="item" style="border: 1px solid #bbbabb;">
                    <td style="width: 10px;">{{$loop->iteration}}</td>
                    <td>{{$item->barang->nama_barang}}</td>
                    <td>{{$item->total_awal}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->diskon}}</td>
                    <td>{{$item->sub_total}}</td>
                    @php
                        array_push($total, $item->sub_total)
                    @endphp
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="6" style="text-align: right;">Total: Rp. {{number_format(array_sum($total))}}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Bukti</td>
                <td>@if ($file != null)
                    <h3 class="text-underline">BUKTI PEMBAYARAN</h3>
                    <br>
                    <img class="bukti-bayar" src="{{public_path('bukti/'.$file)}}" width="100" alt="">
                @else
                    <h3 class="text-underline">DALAM PROSES</h3>
                @endif</td>
            </tr>
        </table>
    </div>

</body>

</html>
