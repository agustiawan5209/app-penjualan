<div class="w-full px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-reddarken-100 border-0">
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <button wire:click='closeModal'
                    class="bg-reddarken text-white active:bg-reddarken font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
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
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Gambar
                            </label>
                            <input type="file" wire:model='gambar'
                                class="border-0 px-3 py-3 placeholder-reddarken-300 bg-white text-black  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="lucky.jesse">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Gambar Preview
                            </label>
                            @if ($gambar == null)
                            <img src="{{asset('upload/'.$updateFoto)}}" class="w-60" alt="">
                            @elseif ($gambar)
                                <img src="{{$gambar->temporaryUrl()}}" class="w-60" alt="">
                            @endif
                        </div>
                        @error('gambar')
                        <span class="text-white">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Jenis
                            </label>
                            <select wire:model='jenis_id'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="--">--</option>
                                @foreach ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->nama_jenis}}</option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                            <span class="text-white">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Satuan
                            </label>
                            <select wire:model='satuan_id'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="--">--</option>
                                @foreach ($satuan as $item)
                                <option value="{{$item->id}}">{{$item->nama_satuan}}</option>
                                @endforeach
                            </select>
                            @error('satuan_id')
                            <span class="text-white">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <hr class="mt-6 border-b-1 border-reddarken-300">
                <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                    Masukkan Katalog Barang
                </h6>
                <div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='[]' class="max-w-lg m-6">
                    <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()"
                        @keydown.escape="clearSearch()">
                        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                            <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter some tags" >
                            <div :class="[open ? 'block' : 'hidden']">
                                <div class="absolute z-40 left-0 mt-2 w-full">
                                    <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                                        <a @click.prevent="addTag(textInput)"
                                            class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add tag
                                            "<span class="font-semibold" x-text="textInput" ></span>"</a>

                                    </div>
                                </div>
                            </div>
                            <!-- selections -->
                            <template x-for="(tag, index) in tags" >
                                <div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1" >
                                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag" ></span>

                                    <button @click.prevent="removeTag(index)"
                                        class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                                        <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
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
                            <input type="text" wire:model='nama_barang'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                @error('nama_barang')
                                    <span class="text-white">{{$message}}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Harga
                            </label>
                            <input type="text" wire:model='harga'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                @error('harga')
                                <span class="text-white">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Jumlah Stock
                            </label>
                            <input type="text" wire:model='stock'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                @error('stock')
                                <span class="text-white">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Tanggal Pembelian
                            </label>
                            <input type="date" wire:model='tgl_perolehan'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="New York">
                                @error('tgl_perolehan')
                                <span class="text-white">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Deskripsi
                            </label>
                            <input type="text" wire:model='deskripsi'
                                class="border-0 px-3 py-3 placeholder-reddarken-300  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="United States">
                                @error('deskripsi')
                                <span class="text-white">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
               @if ($itemID == null)
                 <x-jet-button type="button" wire:click="create" >Tambah</x-jet-button>
               @else
               <x-jet-button type="button" wire:click="edit({{$itemID}})" >Simpan</x-jet-button>
               @endif
            </form>
        </div>
    </div>
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
