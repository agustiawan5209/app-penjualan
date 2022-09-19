<div>
    @include('sweetalert::alert')
<div>
    <x-table>
        <x-slot name="filter">
            <select wire:model='filter'
                class="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                <option value="all">Filter by</option>
                <option value="1">Belum Dikonfirmasi</option>
                <option value="2">Dikonfirmasi</option>
            </select>
        </x-slot>
        <thead>
            <tr>
                <x-th>#</x-th>
                <x-th>Nama</x-th>
                <x-th>Tanggal Transaksi</x-th>
                <x-th>Metode Pembayaran</x-th>
                <x-th>Total</x-th>
                <x-th>Detail</x-th>
                <x-th>Status</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bayar as $pembayaran)
                <tr wire:target='search' wire:loading.class='opacity-50' wire:loading.delay.longes>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $pembayaran->user->name }}</x-td>
                    <x-td>{{ $pembayaran->created_at }}</x-td>
                    <x-td>{{ $pembayaran->payment_type }}</x-td>
                    <x-td>Rp. {{ number_format($pembayaran->total_price,0,2) }}</x-td>
                    <x-td>
                        <x-jet-button type="button" wire:click='detailItem({{$pembayaran->id}})'>Detail Item</x-jet-button>
                    </x-td>
                    <x-td>
                        @if ($pembayaran->payment_status == 1)
                            <button type="button" wire:click='konfirmasiModal({{ $pembayaran->id }})'
                                class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                                Belum Dikonfirmasi
                            </button>
                        @else
                            <button type="button"
                                class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                                Dikonfirmasi
                            </button>
                        @endif
                    </x-td>
                </tr>
            @endforeach
        </tbody>
        <x-slot name="links">

        </x-slot>
    </x-table>
    <x-jet-confirmation-modal wire:model="deleteItem" maxWidth="sm">
        <x-slot name="title">Bukti Pembayaran</x-slot>
        <x-slot name="content">

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button type="button" wire:click='konfirmasi({{ $item }})'>Konfirmasi
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="$toggle('deleteItem')" wire:loading.attr='disabled'>Batal
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

</div>
