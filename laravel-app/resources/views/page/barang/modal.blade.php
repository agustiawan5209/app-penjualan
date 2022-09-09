<div class="w-full px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
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
            <form>
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
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
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
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Jenis
                            </label>
                            <select wire:model='jenis_id'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="--">--</option>
                                @foreach ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Satuan
                            </label>
                            <select wire:model='satuan_id'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="--">--</option>
                                @foreach ($satuan as $item)
                                <option value="{{$item->id}}">{{$item->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300">
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
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Harga
                            </label>
                            <input type="text" wire:model='harga'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Jumlah Stock
                            </label>
                            <input type="text" wire:model='stock'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Tanggal Pembelian
                            </label>
                            <input type="date" wire:model='tgl_perolehan'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="New York">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Deskripsi
                            </label>
                            <input type="text" wire:model='deskripsi'
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-white bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="United States">
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
