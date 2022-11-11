<div>
    <div class="px-4  mx-auto w-full">
        <div class="flex flex-wrap">
            <div class="w-full my-1 px-4">
                @include('sweetalert::alert')
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white text-black">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <x-jet-secondary-button wire:click='tambahJenis()'
                            class="bg-blue-800 text-white shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
                            type="button">
                            Tambah Jenis
                        </x-jet-secondary-button>
                            <x-jet-dialog-modal wire:model.defer='addJenis' maxWidth="2xl">
                                <x-slot name='title'></x-slot>
                                <x-slot name='content' class="bg-white">
                                    <form class="relative w-full py-5 px-4 max-w-full flex-grow flex-1 bg-white">
                                    <x-jet-validation-errors />
                                        <div class="mb-3">
                                            <x-jet-label for='gambar_jenis'>Gambar</x-jet-label>
                                            <input type="file" wire:model='gambar_jenis' />
                                        </div>
                                        <div class="mb-3">
                                            <x-jet-label for='nama_jenis'>Nama Jenis</x-jet-label>
                                            <x-jet-input type="text" wire:model='nama_Jenis' />
                                        </div>
                                        @if ($editJenis == false)
                                            <x-jet-button type='button' wire:click='createJenis'>Tambah</x-jet-button>
                                        @elseif($editJenis == true)
                                            <x-jet-button type='button' wire:click='editJenis({{ $itemID }})'>EDIT
                                            </x-jet-button>
                                        @endif
                                    </form>
                                </x-slot>
                                <x-slot name='footer'>
                                </x-slot>
                            </x-jet-dialog-modal>

                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">

                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                        gambar
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                        Jenis
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                        Katalog
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-red-800 text-white border-red-700">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $item)
                                    <tr class="border-b border-black">
                                        <x-td><img src="{{asset('upload/jenis/'.$item->gambar)}}" alt="" srcset="" width="100"></x-td>
                                      <x-td>{{$item->nama_jenis}}</x-td>
                                      <x-td>
                                        <x-jet-button wire:click="tambahKatalog({{$item->id}})">Katalog</x-jet-button>
                                      </x-td>
                                     <x-td>
                                        <x-jet-secondary-button wire:click='editJenisModal({{ $item->id }})'>
                                            Edit</x-jet-secondary-button> |
                                             <x-jet-danger-button
                                            wire:click='hapusJenis({{ $item->id }})'>Hapus</x-jet-danger-button>
                                     </x-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <x-jet-dialog-modal wire:model='addKatalog'>
                    <x-slot name="title">
                      <div class="bg-white p-3">
                        <x-jet-secondary-button wire:click="createModalKtalog">Tambah</x-jet-secondary-button>
                        @if ($itemKatalog)
                            <form action="#">
                                <div class="mb-2">
                                    <x-jet-label for="name" class="text-white">Nama Katalog</x-jet-label>
                                    <x-jet-input type="text" wire:model="nama_katalog"/>
                                </div>
                                <div class="mb-4">
                                    <x-jet-button wire:click="createKatalog">Simpan</x-jet-button>
                                </div>
                            </form>
                        @endif
                      </div>
                    </x-slot>
                    <x-slot name="content">
                        <x-table>
                            <x-slot name='filter'></x-slot>
                            <tr>
                                <x-th>Nama Katalog</x-th>
                                <x-th>Aksi</x-th>
                            </tr>
                           <tbody>
                            @foreach ( (object) $dataKatalog as $item)
                            <tr>
                                <x-td>{{$item->nama_katalog}}</x-td>
                                <x-td>
                                    <x-jet-danger-button wire:click="hapusKatalog({{$item->id}})">Hapus</x-jet-danger-button>
                                </x-td>
                            </tr>
                            @endforeach
                           </tbody>
                           <x-slot name='links'></x-slot>
                        </x-table>
                    </x-slot>
                    <x-slot name="footer">

                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>

</div>
