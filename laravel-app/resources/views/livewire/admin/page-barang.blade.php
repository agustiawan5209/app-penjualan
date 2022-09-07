<div class="w-full py-10 block">
    @include('sweetalert::alert')
    <div class="mt-6 lg:mb-0 mb-6">
        <x-jet-dialog-modal wire:model='itemHapus' maxWidth="2xl">
            <x-slot name='title'></x-slot>
            <x-slot name='content'>
            Hapus?
            </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$toggle('itemHapus')" wire:loading.attr='disabled'>Close
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click="delete({{$itemID}})" wire:loading.attr='disabled'>Hapus
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model='addJenis' maxWidth="2xl">
            <x-slot name='title'></x-slot>
            <x-slot name='content'>
                @include('page.katalog.modal')
            </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$toggle('addJenis')" wire:loading.attr='disabled'>Close
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model='itemTambah'>
            <x-slot name='title'></x-slot>
            <x-slot name='content'>
                @include('page.barang.modal')
            </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$toggle('itemTambah')" wire:loading.attr='disabled'>Close
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model='itemEdit'>
            <x-slot name='title'></x-slot>
            <x-slot name='content'>
                @include('page.barang.modal')
            </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$toggle('itemEdit')" wire:loading.attr='disabled'>Close
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
        <button wire:click='TambahModal()'
            class="bg-white text-blue-400 shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Tambah Barang
        </button>
        <button wire:click='tambahJenis()'
            class="bg-white text-blue-400 shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Tambah Jenis
        </button>
        <a href="{{route('Admin.Page-Promo')}}"
            class="bg-white text-center text-blue-600 shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Promo
        </a>
        <a href="{{route('Admin.Page-Voucher')}}"
            class="bg-white text-center text-pink-400 shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Voucher
        </a>
        <a href="{{route('Admin.Page-Diskon')}}"
            class="bg-white text-center text-gray-800 shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
            type="button">
            Diskon
        </a>
    </div>

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
                <x-td><img src="{{asset('upload/'.$item->gambar)}}" alt=""
                        class="h-12 w-12 bg-white rounded-full border" srcset="">
                </x-td>
                <x-td>{{$item->kode_barang}}</x-td>
                <x-td>{{$item->harga}}</x-td>
                <x-td>{{$item->tgl_perolehan}}</x-td>
                <x-td>{{$item->satuan->nama_satuan}}</x-td>
                <x-td>{{$item->jenis->nama_jenis}}</x-td>
                <x-td>
                    <button wire:click='EditModal({{$item->id}})' class="px-1 py-2 text-green-500 text-sm font-semibold"><svg
                            class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>
                    <button wire:click='HapusModal({{$item->id}})' class="px-1 py-2 text-green-500 text-sm font-semibold">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
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
            {{$barang->links()}}
        </x-slot>
    </x-table>


</div>
