<div class="w-full py-2 md:py-10 block">
    <div class="mt-6 lg:mb-0 mb-6">
        <x-jet-dialog-modal wire:model='addItem'>
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                @include('page.diskon.modal')
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$toggle('addItem')" wire:loading.attr='disabled'>Tutup</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
        <button wire:click='TambahModal()'
            class="bg-white text-black shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Buat Diskon
        </button>
    </div>
    <x-table>
        <thead>
            <tr>
                <x-th>No.</x-th>
                <x-th>Kode Barang</x-th>
                <x-th>Harga</x-th>
                <x-th>Jumlah Diskon</x-th>
                <x-th>Action</x-th>
            </tr>
        </thead>
        <tbody>
            @if ($diskon->count() > 0)
                @foreach ($diskon as $item)
                    <tr>
                        <x-td>{{ ($diskon->currentpage() - 1) * $diskon->perpage() + $loop->index + 1 }}</x-td>
                        <x-td>@if ($item->barang != null)
                            {{$item->barang->kode_barang}}
                            @else
                            Data Barang Hilang
                            @endif</x-td>
                        <x-td>
                            @if ($item->barang != null)
                            {{$item->barang->harga}}
                            @else
                            Data Barang Hilang
                            @endif
                        </x-td>
                        <x-td>{{ $item->jumlah_diskon }}</x-td>

                        <x-td>
                            <button wire:click='EditModal({{ $item->id }})'
                                class="px-1 py-2 text-green-500 text-sm font-semibold"><svg class="w-6 h-6" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </button>
                            <button wire:click='HapusModal({{ $item->id }})'
                                class="px-1 py-2 text-green-500 text-sm font-semibold">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                            {{-- <button wire:click='edit({{$item->id}})' class="px-1 py-2 text-green-500 text-sm font-semibold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button> --}}

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
            {{ $diskon->links() }}
        </x-slot>
    </x-table>
</div>
