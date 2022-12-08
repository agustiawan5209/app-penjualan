<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
</head>
<style>
    tr,
    td {
        text-align: center;
    }
</style>

<body>
    @include('page.invoice.kop')
    <center>
        <table border="1" cellpadding="5" cellspacing='0' class="w-full table-auto" align="center" width="100%">
            <thead class="">
                <tr class="text-xs p-1">
                    <x-th>No.</x-th>
                    <x-th>Pengguna</x-th>
                    <x-th>Email</x-th>
                    <x-th>Tanggal Pembelian</x-th>
                    {{-- <x-th>Pesanan</x-th> --}}
                    <x-th>Tipe Pembayaran</x-th>
                    <x-th>Barang</x-th>
                    <x-th>jumlah</x-th>
                    <x-th>Total</x-th>
                </tr>
            </thead>
            <tbody>
                @if ($data->count() > 0)
                    @foreach ($data as $transaksi)
                        <tr wire:loading.class='"opacity-50'>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $transaksi->pembayaran->user->name }}</x-td>
                            <x-td>{{ $transaksi->pembayaran->user->email }}</x-td>
                            {{-- <x-td>{{ $transaksi->pembayaran->nama }}</x-td> --}}
                            <x-td>{{ $transaksi->pembayaran->tgl_transaksi }}</x-td>
                            <x-td>
                                {{ $transaksi->pembayaran->payment_type }}
                            </x-td>
                            <x-td>
                                @if ($transaksi->barang != null)
                                    {{ $transaksi->barang->nama_barang }}
                                @else
                                    Data Barang Hilang
                                @endif
                            </x-td>
                            <x-td>
                                @php
                                    $data = explode(',', $transaksi->item_details);
                                @endphp
                                {{ $data[2] }}
                            </x-td>
                            <x-td>Rp. {{ number_format($transaksi->total, 0, 2) }}</x-td>
                            @php
                                $total_price[] = $transaksi->total;
                            @endphp
                        </tr>
                    @endforeach
                    <x-tr>
                        <x-td colspan="5">Total Penjualan</x-td>
                        <x-td colspan="2">Rp. {{ number_format(array_sum($total_price), 0, 2) }}</x-td>
                    </x-tr>
                @else
                    <x-tr>
                        <x-td colspan="7">
                            Kosong
                        </x-td>
                    </x-tr>
                @endif
            </tbody>
        </table>
    </center>
</body>

</html>
