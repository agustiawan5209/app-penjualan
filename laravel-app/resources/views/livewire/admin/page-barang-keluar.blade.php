<div>
    @include('sweetalert::alert')
    <div>
        <x-jet-button wire:click="addModal">Tambah</x-jet-button>
        <x-table>
            <x-slot name="filter"></x-slot>
            <thead>
                <x-tr>
                    <x-th>Barang</x-th>
                    <x-th>Jumlah Barang</x-th>
                    <x-th>Tanggal Barang</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($barangkeluar as $item)
                    <tr>
                        <x-td>{{$loop->iteration}}</x-td>
                        <x-td>
                            @if ($item->barang != null)
                            {{$item->barang->nama_barang}}
                            @else
                            Data Barang Hilang
                            @endif
                        </x-td>
                        <x-td>{{$item->jumlah}}</x-td>
                        <x-td>{{$item->tgl_keluar}}</x-td>
                        <x-td>
                            <x-tdaction :item="$item->id"/>
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
            <x-slot name="links"></x-slot>
        </x-table>


        {{-- Modal Tambah --}}
        <x-jet-dialog-modal wire:model="itemAdd">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <form action="#" class="w-full px-3 flex flex-col ">
                    <div class="mb-2">
                        <x-jet-label for="name" class="text-white">Barang</x-jet-label>
                        <select wire:model="barang_id"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                            <option value="">----</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <x-jet-label for="name" class="text-white">Jumlah</x-jet-label>
                        <x-jet-input type="text" wire:model="jumlah" />
                    </div>
                    <div class="mb-2">
                        <x-jet-label for="name" class="text-white">Tanggal Keluar</x-jet-label>
                        <x-jet-input type="date" wire:model="tgl_keluar" />
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$toggle('itemAdd')">Close</x-jet-danger-button>
                @if ($itemEdit == false)
                    <x-jet-danger-button wire:click="create">Tambah</x-jet-danger-button>
                    @else
                    <x-jet-danger-button class="!bg-green-500 hover:bg-green-700" wire:click="edit({{$itemID}})">Simpan</x-jet-danger-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model="itemDelete">
        <x-slot name="title">Apakah Anda Yakin?</x-slot>
        <x-slot name="content"></x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('itemDelete')">Batal</x-jet-danger-button>
            <x-jet-button class="!bg-gray-800 !hover:bg-gray-900" wire:click="delete({{$itemID}})">Hapus</x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
    </div>

</div>
