<div class="mb-5">
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
                <x-th>No</x-th>
                <x-th>Pengguna</x-th>
                <x-th>Email</x-th>
                <x-th>Tanggal Transaksi</x-th>
                <x-th>Total Pembelian</x-th>
                <x-th>Jenis</x-th>
                <x-th>Invoice</x-th>
                <x-th>Status Pesanan</x-th>
                <x-th>Detail</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bayar as $pembayaran)
                @if ($pembayaran->user_id == auth()->user()->id)
                    <tr wire:loading.class='opacity-50'>
                        <x-td>{{ ($bayar->currentpage() - 1) * $bayar->perpage() + $loop->index + 1 }}</x-td>
                        <x-td>{{ $pembayaran->user->name }}</x-td>
                        <x-td>{{ $pembayaran->user->email }}</x-td>
                        <x-td>{{ $pembayaran->tgl_transaksi }}</x-td>
                        <x-td>{{ $pembayaran->total_price }}</x-td>
                        <x-td>
                            @if ($pembayaran->metode_pengiriman == 1)
                                Kirim Barang <br>
                            @else
                                Ambil Sendiri
                            @endif
                        </x-td>
                        <x-td> <a href="{{ asset('bukti/' . $pembayaran->pdf_url) }}" target="_blank"
                                class="inline-block px-5 py-2 mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                Invoice
                            </a></x-td>
                        <x-td>
                            @if ($pembayaran->payment_status == 1)

                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Belum Dikonfirmasi</span>
                            @else
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Dikonfirmasi</span>

                            @endif
                        </x-td>
                        <x-td>
                            <x-jet-button type="button" wire:click='detailItem({{ $pembayaran->id }})'>Detail Item
                            </x-jet-button>
                        </x-td>
                    </tr>
                @endif
            @endforeach
        </tbody>

        <x-slot name="links">
            {{ $bayar->links() }}
        </x-slot>
    </x-table>
</div>
