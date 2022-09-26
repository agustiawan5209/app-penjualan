<div>
    @include('sweetalert::alert')
    <div>
        @if ($itemAdd == true && $itemEdit == false)
            <div class="w-full max-w-xs">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <x-jet-validation-errors />
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Nama
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="slide" type="text" placeholder="">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            deskripsi
                        </label>
                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="deskripsi" type="text" placeholder="******************">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                           thumbnail
                        </label>
                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="thumbnail" type="file" placeholder="******************">
                    </div>
                    <div class="flex items-center justify-between">
                        <button wire:click='create()'
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if ($itemID && $itemEdit && $itemAdd ==false)
            <x-jet-validation-errors />
            <div class="w-full max-w-xs">
                <x-jet-validation-errors />
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="">
                            Nama
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="slide" type="text" placeholder="">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            deskripsi
                        </label>
                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="deskripsi" type="text" placeholder="******************">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                           thumbnail
                        </label>
                        <input
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="thumbnail" type="file" placeholder="******************">
                    </div>
                    <div class="flex items-center justify-between">
                        <button wire:click='edit({{ $itemID }})'
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        @endif
        @if ($itemDelete)
            <x-jet-confirmation-modal wire:model='itemDelete'>
                <x-slot name='title'></x-slot>
                <x-slot name='content'>
                    Apakah Anda Yakin?
                </x-slot>
                <x-slot name='footer'>
                    <x-jet-button type="button" wire:click='delete({{ $itemID }})'>Hapus</x-jet-button>
                </x-slot>
            </x-jet-confirmation-modal>
        @endif

        <x-jet-button type='button' wire:click='addModal'>Tambah</x-jet-button>
        <x-table>
            <x-slot name="filter"></x-slot>
            <thead>
                <tr>
                    <x-td>No.</x-td>
                    <x-td>slide</x-td>
                    <x-td>Deskripsi</x-td>
                    <x-td>thumbnail</x-td>
                    <x-td>Aksi</x-td>
                </tr>
            </thead>
            <tbody>
                @foreach ($slide_table as $slide)
                    <tr>
                        <x-tr>{{ $loop->iteration }}</x-tr>
                        <x-tr>{{ $slide->slide }}</x-tr>
                        <x-tr>{{ $slide->deskripsi }}</x-tr>
                        <x-tr>{{ $slide->thumbnail }}</x-tr>
                        <x-tr>
                            <button wire:click='editModal({{ $slide->id }})'
                                class="px-1 py-2 text-green-500 text-sm font-semibold"><svg class="w-6 h-6"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </button>
                            <button wire:click='deleteModal({{ $slide->id }})'
                                class="px-1 py-2 text-green-500 text-sm font-semibold">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </x-tr>

                    </tr>
                @endforeach
            </tbody>
            <x-slot name="links"></x-slot>
        </x-table>
    </div>
</div>
