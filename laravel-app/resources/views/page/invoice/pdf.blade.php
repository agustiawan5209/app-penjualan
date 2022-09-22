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
    <center>
        <h6 > <span style="font-weight: 700; margin-botton: 7px; text-decoration:underline; font-size: 14px;">Irsan Jaya</span> <br>
             <span>Alamat : HVVW+MMC, Simbula, Kec. Katoi, Kabupaten Kolaka Utara, Sulawesi Tenggara 93957</span></h4>
    </center>
    <table border="1" cellpadding="5" cellspacing='0' class="w-full table-auto">
        <thead class="">
            <tr class="text-xs p-1">
                <th>No.</th>
                <th>Pengguna</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Tanggal Pembelian</th>
                <th>Pesanan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($data as $transaksi)
                    <tr wire:loading.class='"opacity-50'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->pembayaran->user->name }}</td>
                        <td>{{ $transaksi->pembayaran->user->email }}</td>
                        <td>{{ $transaksi->pembayaran->nama }}</td>
                        <td>{{ $transaksi->tgl_transaksi }}</td>
                        <td>
                           {{$transaksi->barang->nama_barang}}
                        </td>
                        <td>{{ number_format($transaksi->total,0,2) }}</td>
                        @php
                            $total[] = $transaksi->total;
                        @endphp
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Total Penjualan</td>
                    <td colspan="2">Rp. {{number_format(array_sum($total))}}</td>
                </tr>
        </tbody>
    </table>
</body>
</html>
