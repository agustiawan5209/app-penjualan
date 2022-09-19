<div>
    @if ($status)
        <div class="z-50">
            <livewire:item.page-status-barang :barang_id="null" :ongkir_id="$itemID" :status="$status">
        </div>

    @endif
    <x-table>
        <x-slot name="filter"></x-slot>
        <thead>
            <tr>
                <x-th>No.</x-th>
                <x-th>ID Transaksi</x-th>
                <x-th>harga</x-th>
                <x-th>Tgl Pengiriman</x-th>
                <x-th>Alamat</x-th>
                <x-th>Detail</x-th>
                <x-th>Status</x-th>
            </tr>
        </thead>
        <tbody>
            @if ($ongkir->count() > 0)
                @foreach ($ongkir as $item)
                    <tr>
                        <x-td>{{ ($ongkir->currentpage() - 1) * $ongkir->perpage() + $loop->index + 1 }}</x-td>
                        <x-td>{{ $item->transaksi_id }}</x-td>
                        <x-td>{{ $item->harga }}</x-td>
                        <x-td>{{ $item->tgl_pengiriman }}</x-td>
                        <x-td>{{ $item->kode_pos }}/{{ $item->kecamatan }}/{{ $item->detail_alamat }}</x-td>
                        <x-td>
                            <x-jet-button>Detail</x-jet-button>
                        </x-td>
                        <x-td>
                            <x-jet-button wire:click='lihatStatus({{ $item->id }})'>Status</x-jet-button>
                        </x-td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center py-3">Maaf Data Kosong</td>
                </tr>
            @endif
        </tbody>
        <x-slot name='links'>
            {{ $ongkir->links() }}
        </x-slot>
    </x-table>
</div>
