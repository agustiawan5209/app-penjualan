<div class="w-full py-10">
    @if (session()->has('message'))
    <x-alert></x-alert>
    @endif
    <x-table>
        <thead>
            <tr>
                <x-th>No.</x-th>
                <x-th wire:click='TambahModal'>Gambar</x-th>
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
                <x-td>{{ ($barang->currentpage()-1) * $barang->perpage() + $loop->index + 1 }}</x-td>
                <x-td><img src="{{$item->gambar}}" alt="" class="h-12 w-12 bg-white rounded-full border" srcset=""></x-td>
                <x-td>{{$item->kode_barang}}</x-td>
                <x-td>{{$item->harga}}</x-td>
                <x-td>{{$item->tgl_perolehan}}</x-td>
                <x-td>{{$item->satuan->nama_satuan}}</x-td>
                <x-td>{{$item->jenis->nama_jenis}}</x-td>
                <x-tdaction>
                    
                </x-tdaction>
            </tr>

            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center py-3">Maaf Data Kosong</td>
            </tr>
            @endif
        </tbody>
        <x-slot name='links'>
            {{$barang->links()}}
        </x-slot>
    </x-table>


</div>
