<div class="w-full px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <button wire:click='closeModal'
                    class="bg-red-darken text-white active:bg-red-darken font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    x
                </button>
            </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            @if ($promo_persen != null)
                <form x-data="{ jenisPromo: 2, }">
                @elseif ($promo_nominal != null)
                    <form x-data="{ jenisPromo: 1, }">
            @endif
            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                User Information
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Kode Promo
                        </label>
                        <input type="text" wire:model='kode_promo'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Masukkan nilai">
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Max User
                        </label>
                        <input type="text" wire:model='max_user'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Masukkan nilai">
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4 flex gap-4">
                    <div class="relative w-2/5 mb-3 ">
                        <label class="block uppercase text-white whitespace-nowrap text-xs font-bold mb-2"
                            htmlfor="grid-password">
                            Pilih Jenis Promo
                        </label>
                        <select name="pilih" id="pilih" x-model='jenisPromo'>
                            <option value="0">---Pilih Jenis Promo--</option>
                            <option value="1">Promo Nominal</option>
                            <option value="2">Promo Persen</option>
                        </select>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4" x-show="jenisPromo == 1">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Masukkan Jumlah Promo Nominal (20000)
                        </label>
                        <input type="number" wire:model='promo_nominal'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="100000">
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4" x-show='jenisPromo == 2'>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Masukkan Jumlah Promo Persen (10%)
                        </label>
                        <input type="number" wire:model='promo_persen'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="10">
                    </div>
                </div>
            </div>
            <hr class="mt-6 border-b-1 border-blueGray-300">
            <h6 class="text-white text-sm mt-3 mb-6 font-bold uppercase">
                Tanggal Promo
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Tanggal Promo Mulai
                        </label>
                        <input type="date" wire:model='tgl_mulai'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    </div>
                </div>
                <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-xs font-bold mb-2" htmlfor="grid-password">
                            Tanggal Kadaluarsa
                        </label>
                        <input type="date" wire:model='tgl_kadaluarsa'
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-black bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    </div>
                </div>
            </div>
                <x-jet-button type="button" wire:click="edit({{ $itemID }})">Edit</x-jet-button>
            </form>
        </div>
    </div>
</div>
