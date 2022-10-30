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
             <span>Alamat :Simbula, Kec. Katoi, Kabupaten Kolaka Utara, Sulawesi Tenggara 93957</span></h4>
    </center>
   <center>
    <table border="1" cellpadding="5" cellspacing='0' class="w-full table-auto" align="center" width="100%">
        <thead class="">
            <tr class="text-xs p-1">
                <tr>
                    <th>No.</th>
                    <th>Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Barang</th>
                </tr>
            </tr>
        </thead>
        <tbody>
                @foreach ($data as $barang)
                <tr wire:loading.class='"opacity-50'>
                    <x-td>{{$loop->iteration}}</x-td>
                    <x-td>{{$barang->barang->kode_barang}}</x-td>
                    <x-td>{{$barang->jumlah}}</x-td>
                    <x-td>{{$barang->tgl_keluar}}</x-td>
                </tr>
                @endforeach
        </tbody>
    </table>
   </center>
</body>
</html>
