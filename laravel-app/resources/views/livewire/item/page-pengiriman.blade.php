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
                            <x-jet-button wire:click='detailOngkir({{$item->id}})'>Detail</x-jet-button>
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
    <x-jet-dialog-modal wire:model='itemDetail'>
        <x-slot name='title'>

        </x-slot>

        <x-slot name='content'>
            <div class="bg-white">
                <div class="border-t border-gray-200">
                    <dl class="">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Tanggal Pengiriman</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$tgl_pengiriman}} </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Harga </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$harga}}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Alamat </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$detail_alamat}}, <br>
                                {{$kabupaten}}, {{$kode_pos}} </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> ID TRANSAKSI </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{$transaksi_id}} </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"> Detail Pesanan </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$item_details}}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-danger-button type='button' wire:click="$toggle('itemDetail')" wire:loading.attr='disabled'>Tutup
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model='ongkirItem'>
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 overflow-y-auto">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Nama Produk
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='item_details' id="password" type="text" disabled placeholder="******************">
                    @error('item_details')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        ID Transaksi
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='transaksi_id' id="password" type="text" disabled placeholder="******************">
                    @error('transaksi_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Tgl Pengiriman
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='tgl_pengiriman' id="password" type="date" placeholder="******************">
                    @error('tgl_pengiriman')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Harga Ongkir
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        wire:model="harga" type="text" placeholder="******************">
                    @error('harga')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        detail Alamat
                    </label>
                    <textarea id="" cols="30" rows="10" disabled
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{$detail_alamat}} ,{{$kode_pos}} ,{{$kabupaten}} ,
             </textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Status
                    </label>
                    <select id="countries" wire:model='status'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">--Pilih Status Pengiriman--</option>
                        <option value="1">Belum Dikirim</option>
                        <option value="2">Terkirim</option>
                        <option value="3">Pesanan Diterima</option>
                    </select>
                    @error('kategori_produk')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button wire:click='edit({{$ItemID}})'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Simpan
                </button>
                <button wire:click='$toggle("ongkirItem")'
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Close
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model='hapusItem'>
        <x-slot name="title">
            Apakah Anda Yakin Ingin Menghapus?
        </x-slot>
        <x-slot name="content">
            {{$user}}
            Kode Pesanan : {{$transaksi_id}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click='delete({{$ItemID}})'>
                Hapus
            </x-jet-button>
            <x-jet-danger-button wire:click="$toggle('hapusItem')" wire:loading.attr='disabled'>
                Batalkan
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    <x-jet-dialog-modal wire:model='statusItem'>
        <x-slot name="title">
            Konfirmasi Status?
        </x-slot>
        <x-slot name="content" class="w-full">
            {{-- <livewire:item.page-status-barang :barang_id='0' :ongkir_id='$itemID' :status='1'> --}}
            @if ($status != 4)
                <div class="w-full h-max px-4 py-2 ">
                    <x-jet-label for='ket'>Ganti Status Pengiriman</x-jet-label>
                    <select wire:model='status'
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-size-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        <option value="1">Belum Dikirim</option>
                        <option value="2">Dikirim</option>
                        <option value="3">Pesanan Diterima</option>
                    </select>
                </div>
                <div class="mb-4">
                    <x-jet-label for='ket'>Keterangan</x-jet-label>
                    <x-jet-input wire:model="ket"/>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            @if ($status !=4)
                <x-jet-button wire:click='status({{$ItemID}})'>
                    Simpan
                </x-jet-button>
            @endif
            <x-jet-danger-button wire:click="$toggle('statusItem')" wire:loading.attr='disabled'>
                Tutup
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
