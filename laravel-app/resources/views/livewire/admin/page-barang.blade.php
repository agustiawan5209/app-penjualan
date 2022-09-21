<div>
    @include('sweetalert::alert')
    <div>

        <div class="mt-6 lg:mb-0 mb-6">

            <x-jet-confirmation-modal wire:model.defer='itemHapus' maxWidth="2xl">
                <x-slot name='title'></x-slot>
                <x-slot name='content'>
                    Hapus?
                </x-slot>
                <x-slot name='footer'>
                    <x-jet-secondary-button wire:click="$toggle('itemHapus')" wire:loading.attr='disabled'>Close
                    </x-jet-secondary-button>
                    <x-jet-danger-button wire:click="delete({{ $itemID }})" wire:loading.attr='disabled'>Hapus
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
            <x-jet-dialog-modal wire:model.defer='itemDetail' maxWidth="md">
                <x-slot name='title'></x-slot>
                <x-slot name='content'>
                    <div
                        class="flex flex-col container max-w-md mt-10 mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
                        <ul class="flex flex-col divide-y w-full">
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">
                                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                                        <a href="#" class="block relative">
                                            <img alt="profil" src="{{ asset('upload/' . $updateFoto) }}"
                                                class="mx-auto object-cover rounded-full h-10 w-10" />
                                        </a>
                                    </div>
                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">{{ $nama_barang }}</div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">

                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">Jenis</div>
                                        <div class="text-gray-600 dark:text-gray-200 text-sm">{{ $jenis_id }}</div>
                                    </div>
                                    <div class="flex flex-row justify-center">
                                        <div class="text-gray-600 dark:text-gray-200 text-xs">Satuan :
                                            {{ $satuan_id }}</div>
                                        <button class="w-10 text-right flex justify-end">
                                            <svg width="20" fill="currentColor" height="20"
                                                class="hover:text-gray-800 dark:hover:text-white dark:text-gray-200 text-gray-500"
                                                viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">

                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">Harga</div>
                                        <div class="text-gray-600 dark:text-gray-200 text-sm">{{ $harga }}</div>
                                    </div>
                                    <div class="flex flex-row justify-center">
                                        <div class="text-gray-600 dark:text-gray-200 text-xs">Tgl Pembelian :
                                            {{ $tgl_perolehan }}</div>

                                    </div>
                                </div>
                            </li>
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">

                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">Jumlah Stock</div>
                                        <div class="text-gray-600 dark:text-gray-200 text-sm">{{ $stock }}</div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">

                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">Deskripsi </div>
                                        <div class="text-gray-600 dark:text-gray-200 text-sm">{{ $deskripsi }}</div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex flex-row">
                                <div class="select-none cursor-pointer hover:bg-gray-50 flex flex-1 items-center p-4">

                                    <div class="flex-1 pl-1">
                                        <div class="font-medium dark:text-white">Katalog</div>
                                        <div class="text-gray-600 dark:text-gray-200 text-sm">
                                            @foreach ((object) $katalog as $item)
                                                <span
                                                    class="bg-blue-300 rounded-sm p-1 text-gray-800">{{ $item->nama_katalog }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </x-slot>
                <x-slot name='footer'>
                    <x-jet-secondary-button wire:click="$toggle('itemDetail')" wire:loading.attr='disabled'>Close
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>
            <x-jet-dialog-modal wire:model.defer='addJenis' maxWidth="2xl">
                <x-slot name='title'></x-slot>
                <x-slot name='content'>
                    @include('page.katalog.modal')
                </x-slot>
                <x-slot name='footer'>
                    <x-jet-secondary-button wire:click="$toggle('addJenis')" wire:loading.attr='disabled'>Close
                    </x-jet-secondary-button>
                </x-slot>
            </x-jet-dialog-modal>
            @if ($itemTambah == true)
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
                    x-data="{ katalog: @entangle('katalog') }">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <button wire:click='closeModal'
                                class="bg-blue-darken text-white active:bg-blue-darken font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                type="button">
                                x
                            </button>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="#">
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Barang
                            </h6>
                            <div class="flex flex-wrap" x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Gambar
                                        </label>
                                        <input type="file" wire:model.defer='gambar'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 bg-white text-black  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="lucky.jesse">
                                        <div x-show="isUploading"
                                            class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                                            <progress max="100" x-bind:value="progress"
                                                class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700 text-white active:text-green-600 focus:text-red-500"></progress>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Gambar Preview
                                        </label>
                                        @if ($gambar == null)
                                            <img src="{{ asset('upload/' . $updateFoto) }}" class="w-60"
                                                alt="">
                                        @elseif ($gambar)
                                            <img src="{{ $gambar->temporaryUrl() }}" class="w-60" alt="">
                                        @endif
                                    </div>
                                    @error('gambar')
                                        <span class="text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Jenis
                                        </label>
                                        <select wire:model.defer='jenis_id'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="--">--</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_id')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Satuan
                                        </label>
                                        <select wire:model.defer='satuan_id'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="--">--</option>
                                            @foreach ($satuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                            @endforeach
                                        </select>
                                        @error('satuan_id')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-6 border-b-1 border-blueGray-300">
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Masukkan Katalog Barang
                            </h6>
                            <div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='[]'
                                class="max-w-lg m-6">
                                <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()"
                                    @keydown.escape="clearSearch()">
                                    <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                                        <input x-model="textInput" x-ref="textInput"
                                            @input="search($event.target.value)"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter some tags">
                                        <div :class="[open ? 'block' : 'hidden']">
                                            <div class="absolute z-40 left-0 mt-2 w-full">
                                                <div
                                                    class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                                                    <a @click.prevent="addTag(textInput)"
                                                        class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add
                                                        tag
                                                        "<span class="font-semibold" x-text="textInput"></span>"</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- selections -->
                                        <template x-for="(tag, index) in tags">
                                            <div
                                                class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                                                <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs"
                                                    x-text="tag"></span>

                                                <button @click.prevent="removeTag(index)"
                                                    class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                                                    <svg class="w-6 h-6 fill-current mx-auto"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Detail Barang
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Nama Barang
                                        </label>
                                        <input type="text" wire:model.defer='nama_barang'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('nama_barang')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Harga
                                        </label>
                                        <input type="text" wire:model.defer='harga'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('harga')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Jumlah Stock
                                        </label>
                                        <input type="text" wire:model.defer='stock'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('stock')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Tanggal Pembelian
                                        </label>
                                        <input type="date" wire:model.defer='tgl_perolehan'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="New York">
                                        @error('tgl_perolehan')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Deskripsi
                                        </label>
                                        <input type="text" wire:model.defer='deskripsi'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="United States">
                                        @error('deskripsi')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($itemID == null)
                                <x-jet-button type="button" wire:click="create">Tambah</x-jet-button>
                            @else
                                <x-jet-button type="button" wire:click="edit({{ $itemID }})">Simpan
                                </x-jet-button>
                            @endif
                        </form>
                    </div>
                </div>
            @endif
            @if ($itemEdit == true)
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
                    x-data="{ katalog: @entangle('katalog') }">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <button wire:click='closeModal'
                                class="bg-blue-darken text-white active:bg-blue-darken font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                type="button">
                                x
                            </button>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form action="#">
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Barang
                            </h6>
                            <div class="flex flex-wrap" x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Gambar
                                        </label>
                                        <input type="file" wire:model.defer='gambar'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 bg-white text-black  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="lucky.jesse">
                                        <div x-show="isUploading"
                                            class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                                            <progress max="100" x-bind:value="progress"
                                                class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700 text-white active:text-green-600 focus:text-red-500"></progress>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Gambar Preview
                                        </label>
                                        @if ($gambar == null)
                                            <img src="{{ asset('upload/' . $updateFoto) }}" class="w-60"
                                                alt="">
                                        @elseif ($gambar)
                                            <img src="{{ $gambar->temporaryUrl() }}" class="w-60" alt="">
                                        @endif
                                    </div>
                                    @error('gambar')
                                        <span class="text-white">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Jenis
                                        </label>
                                        <select wire:model.defer='jenis_id'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="--">--</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_id')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Satuan
                                        </label>
                                        <select wire:model.defer='satuan_id'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="--">--</option>
                                            @foreach ($satuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                            @endforeach
                                        </select>
                                        @error('satuan_id')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-6 border-b-1 border-blueGray-300">
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Masukkan Katalog Barang
                            </h6>
                            <div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='[]'
                                class="max-w-lg m-6">
                                <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()"
                                    @keydown.escape="clearSearch()">
                                    <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                                        <input x-model="textInput" x-ref="textInput"
                                            @input="search($event.target.value)"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Enter some tags">
                                        <div :class="[open ? 'block' : 'hidden']">
                                            <div class="absolute z-40 left-0 mt-2 w-full">
                                                <div
                                                    class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                                                    <a @click.prevent="addTag(textInput)"
                                                        class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add
                                                        tag
                                                        "<span class="font-semibold" x-text="textInput"></span>"</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- selections -->
                                        <template x-for="(tag, index) in tags">
                                            <div
                                                class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                                                <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs"
                                                    x-text="tag"></span>

                                                <button @click.prevent="removeTag(index)"
                                                    class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                                                    <svg class="w-6 h-6 fill-current mx-auto"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                                Detail Barang
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Nama Barang
                                        </label>
                                        <input type="text" wire:model.defer='nama_barang'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('nama_barang')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Harga
                                        </label>
                                        <input type="text" wire:model.defer='harga'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('harga')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Jumlah Stock
                                        </label>
                                        <input type="text" wire:model.defer='stock'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                        @error('stock')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Tanggal Pembelian
                                        </label>
                                        <input type="date" wire:model.defer='tgl_perolehan'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="New York">
                                        @error('tgl_perolehan')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-white text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Deskripsi
                                        </label>
                                        <input type="text" wire:model.defer='deskripsi'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            value="United States">
                                        @error('deskripsi')
                                            <span class="text-white">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <x-jet-button type="button" wire:click="edit({{ $itemID }})">Simpan
                                </x-jet-button>
                        </form>
                    </div>
                </div>
            @endif
            <x-jet-dialog-modal wire:model.defer='addItemDiskon'>
                <x-slot name="title"></x-slot>
                <x-slot name="content">
                    @include('page.diskon.modal')
                </x-slot>
                <x-slot name="footer">
                    <x-jet-danger-button wire:click="$toggle('addItemDiskon')" wire:loading.attr='disabled'>Tutup
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
            <button wire:click='TambahModal()'
                class="bg-white text-black shadow-lg font-normal w-32 py-2 rounded-md items-center justify-center align-center outline-none focus:outline-none mr-2"
                type="button">
                Tambah Barang
            </button>
        </div>
        <x-table wire:loading.delay wire:target="barang" wire:loading.class="bg-gray">
            <x-slot name="filter"></x-slot>
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
                    <x-th>Diskon</x-th>
                </tr>
            </thead>
            <tbody>
                @if ($barang->count() > 0)
                    @foreach ($barang as $item)
                        <tr>
                            <x-td>{{ ($barang->currentpage() - 1) * $barang->perpage() + $loop->index + 1 }}</x-td>
                            <x-td><img src="{{ asset('upload/' . $item->gambar) }}" alt=""
                                    class="h-12 w-12 bg-white rounded-full border" srcset="">
                            </x-td>
                            <x-td>{{ $item->kode_barang }}</x-td>
                            <x-td>{{ $item->harga }}</x-td>
                            <x-td>{{ $item->tgl_perolehan }}</x-td>
                            <x-td>{{ $item->satuan->nama_satuan }}</x-td>
                            <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                            <x-td>
                                <button wire:click='DetailModal({{ $item->id }})'
                                    class="px-1 py-2 text-blue-500 text-sm font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>

                                </button>
                                <button wire:click='EditModal({{ $item->id }})'
                                    class="px-1 py-2 text-green-500 text-sm font-semibold"><svg class="w-6 h-6"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
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
                            <x-td>
                                {{-- {{$item->diskon}} --}}
                                @if ($item->diskon->count() < 1)
                                    <button wire:click='TambahModalDiskon({{ $item->id }})'
                                        class="px-1 py-2 text-green-500 text-sm font-semibold">
                                        Diskon
                                    </button>
                                @else
                                    <button wire:click='EditModalDiskon({{ $item->id }})'
                                        class="px-1 py-2 text-green-500 text-sm font-semibold">
                                        Edit Diskon
                                    </button>
                                @endif
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
                {{ $barang->links() }}
            </x-slot>
        </x-table>

    </div>
    <script>
        function tagSelect() {
            return {
                open: false,
                textInput: '',
                tags: [],
                init() {
                    this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
                },
                addTag(tag) {
                    tag = tag.trim()
                    if (tag != "" && !this.hasTag(tag)) {
                        this.tags.push(tag)
                        this.katalog.push(tag)
                    }
                    this.clearSearch()
                    this.$refs.textInput.focus()
                    this.fireTagsUpdateEvent()
                },
                fireTagsUpdateEvent() {
                    this.$el.dispatchEvent(new CustomEvent('tags-update', {
                        detail: {
                            tags: this.tags
                        },
                        bubbles: true,
                    }));
                },
                hasTag(tag) {
                    var tag = this.tags.find(e => {
                        return e.toLowerCase() === tag.toLowerCase()
                    })
                    return tag != undefined
                },
                removeTag(index) {
                    this.tags.splice(index, 1)
                    this.fireTagsUpdateEvent()
                },
                search(q) {
                    if (q.includes(",")) {
                        q.split(",").forEach(function(val) {
                            this.addTag(val)
                        }, this)
                    }
                    this.toggleSearch()
                },
                clearSearch() {
                    this.textInput = ''
                    this.toggleSearch()
                },
                toggleSearch() {
                    this.open = this.textInput != ''
                }
            }
        }
    </script>
</div>
