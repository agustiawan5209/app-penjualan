<div>
    @include('sweetalert::alert')
    <div>

        <x-table>
            <x-slot name="filter"></x-slot>
            <thead>
                <tr>
                    <x-th>No.</x-th>
                    <x-th>ID Transaksi</x-th>
                    <x-th>Tanggal Transaksi</x-th>
                    <x-th>Item</x-th>
                    <x-th>Jumlah Pembelian</x-th>
                    <x-th>Jumlah Diskon / Potongan</x-th>
                    <x-th>Total Bayar</x-th>
                </tr>
            </thead>
            <tbody>
                @if ($transaksi->count() > 0)
                @foreach ($transaksi as $item)
                <tr>
                    <x-td>{{ ($transaksi->currentpage()-1) * $transaksi->perpage() + $loop->index + 1 }}</x-td>
                    <x-td class="text-xl text-red-500">{{$item->ID_transaksi}}
                    </x-td>
                    <x-td>{{$item->tgl_transaksi}}</x-td>
                    @php
                        $jumlah = explode(',' ,$item->item_details);
                    @endphp
                    <x-td>
                       {{$item->barang->nama_barang  }}
                    </x-td>
                    <x-td>{{$jumlah[2]}}</x-td>
                    <x-td>
                       Rp. {{number_format($item->potongan,0,2)}}
                    </x-td>
                    <x-td>Rp. {{number_format($item->total,0,2)}}</x-td>
                </tr>

                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center py-3">Maaf Data Kosong</td>
                </tr>
                @endif
            </tbody>
            <x-slot name='links'>
                {{$transaksi->links()}}
            </x-slot>
        </x-table>
        <a href="{{url()->previous()}}">
            <x-jet-danger-button>Kembali</x-jet-danger-button>
        </a>
    </div>
</div>
