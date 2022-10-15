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
            <form x-data="{barang_id : 0,}">
                <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                    User Information
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4" x-show="jenisPromo == 1">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Masukkan Jumlah Diskon
                            </label>
                            <input type="number" wire:model='jumlah_diskon'
                                class="border-0 px-3 py-3 placeholder-reddarken-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                               placeholder="100000">
                        </div>
                    </div>
                </div>
                <hr class="mt-6 border-b-1 border-reddarken-300">
                <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                    Tanggal Diskon
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Tanggal  Mulai
                            </label>
                            <input type="date" wire:model='tgl_mulai'
                                class="border-0 px-3 py-3 placeholder-reddarken-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Tanggal Kadaluarsa
                            </label>
                            <input type="date" wire:model='tgl_kadaluarsa'
                                class="border-0 px-3 py-3 placeholder-reddarken-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                value="New York">
                        </div>
                    </div>
                </div>
               @if ($edit == null)
                 <x-jet-button type="button" wire:click="createDiskon({{$itemID}})" >Tambah</x-jet-button>
               @else
               <x-jet-button type="button" wire:click="editDiskon({{$edit}})" >Simpan</x-jet-button>
               @endif
            </form>
        </div>
    </div>
</div>
