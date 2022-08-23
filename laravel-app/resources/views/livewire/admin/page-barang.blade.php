<div class="w-full py-10">

    <x-table>
        <thead>
            <tr>
                <x-th>Gambar</x-th>
                <x-th>Kode Barang</x-th>
                <x-th>Harga</x-th>
                <x-th>Tgl Perolehan</x-th>
                <x-th>Satuan</x-th>
                <x-th>Jenis</x-th>
                <x-th>Action</x-th>
            </tr>
        </thead>
        <tbody>
            @if ($barang->count() > 0)
            @foreach ($barang as $item)
            <tr>
                <x-td>{{$item->gambar}}</x-td>
                <x-td>{{$item->kode_barang}}</x-td>
                <x-td>{{$item->harga}}</x-td>
                <x-td>{{$item->tgl_perolehan}}</x-td>
                <x-td>{{$item->satuan_id}}</x-td>
                <x-td>{{$item->jenis_id}}</x-td>
                <x-tdaction></x-tdaction>
            </tr>

            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center py-3">Maaf Data Kosong</td>
            </tr>
            @endif
        </tbody>
    </x-table>
    {{$barang->links()}}

</div>
