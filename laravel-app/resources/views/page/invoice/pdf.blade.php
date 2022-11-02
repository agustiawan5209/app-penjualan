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
                <th>No.</th>
                <th>Pengguna</th>
                <th>Email</th>
                <th>Tanggal Pembelian</th>
                {{-- <th>Pesanan</th> --}}
                <th>Tipe Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($data as $pembayaran)
                <tr wire:loading.class='"opacity-50'>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $pembayaran->user->name }}</x-td>
                    <x-td>{{ $pembayaran->user->email }}</x-td>
                    {{-- <x-td>{{ $pembayaran->nama }}</x-td> --}}
                    <x-td>{{ $pembayaran->tgl_transaksi }}</x-td>
                    <x-td>
                       {{$pembayaran->payment_type}}
                    </x-td>
                    <x-td>{{ number_format($pembayaran->total_price,0,2) }}</x-td>
                    @php
                        $total_price[] = $pembayaran->total_price;
                    @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Total Penjualan</td>
                    <td colspan="2">Rp. {{number_format(array_sum($total_price))}}</td>
                </tr>
        </tbody>
    </table>
   </center>
</body>
</html>
