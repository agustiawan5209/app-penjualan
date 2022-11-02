<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
</head>
<style>
    tr,td{
        text-align: center;
    }
</style>
<body>
   @include('page.invoice.kop')
   <center>
    <table border="1" cellpadding="5" cellspacing='0' class="w-full table-auto" align="center" width="100%">
        <thead class="">
            <tr class="text-xs p-1">
                <tr>
                    <th>No.</th>
                    <th>Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Barang</th>
                    <th>Pemasok Barang</th>
                    <th>Harga Barang</th>
                </tr>
            </tr>
        </thead>
        <tbody>
                @foreach ($data as $barang)
                <tr wire:loading.class='"opacity-50'>
                    <x-td>{{$loop->iteration}}</x-td>
                    <x-td>{{$barang->barang->kode_barang}}</x-td>
                    <x-td>{{$barang->jumlah}}</x-td>
                    <x-td>{{$barang->tgl_masuk}}</x-td>
                    <x-td>{{$barang->pemasok}}</x-td>
                    <x-td>Rp. {{number_format($barang->harga,0,2)}}</x-td>

                    @php
                        $total_price[] = $barang->harga;
                    @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total Pembelian</td>
                    <td colspan="2">Rp. {{number_format(array_sum($total_price))}}</td>
                </tr>
        </tbody>
    </table>
   </center>
</body>
</html>
