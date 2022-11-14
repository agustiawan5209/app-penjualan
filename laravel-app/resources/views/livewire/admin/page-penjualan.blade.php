<div>
    @include('sweetalert::alert')
    {{-- @include('page.invoice.invoice') --}}
    <div>
        <x-table>
            <x-slot name="filter">
                <select wire:model='filter'
                    class="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                    <option value="all">Filter by</option>
                    <option value="1">Belum Dikonfirmasi</option>
                    <option value="2">Dikonfirmasi</option>
                </select>
            </x-slot>
            <thead>
                <tr>
                    <x-th>#</x-th>
                    <x-th>Nama</x-th>
                    <x-th>Tanggal Transaksi</x-th>
                    <x-th>Metode Pembayaran</x-th>
                    <x-th>Jenis Pengiriman</x-th>
                    <x-th>Total</x-th>
                    <x-th>Detail</x-th>
                    <x-th>Status</x-th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bayar as $pembayaran)
                    <tr wire:target='search' wire:loading.class='opacity-50' wire:loading.delay.longes>
                        <x-td>{{ ($bayar->currentpage() - 1) * $bayar->perpage() + $loop->index + 1 }}</x-td>
                        <x-td>{{ $pembayaran->user->name }}</x-td>
                        <x-td>{{ $pembayaran->created_at }}</x-td>
                        <x-td>{{ $pembayaran->payment_type }}</x-td>
                        <x-td>
                          @if ($pembayaran->payment_status == 2)
                              @if ($pembayaran->metode_pengiriman == 1)

                                  {{-- {{$pembayaran->ongkir->count()}} --}}
                                  @if($pembayaran->ongkir->tgl_pengiriman != null)
                                  Cek Pengiriman Barang <br>
                                  @else
                                  Kirim Barang <br>
                                  <a wire:click='ongkirModal({{ $pembayaran->id }})' href="#_"
                                      class="inline-block px-5 py-2 mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                      Buat Pengiriman
                                  </a>
                                  @endif
                              @else
                                  Ambil Sendiri
                              @endif

                        @else
                             Lakukan Konfirmasi
                          @endif
                        </x-td>
                        <x-td>Rp. {{ number_format($pembayaran->total_price, 0, 2) }}</x-td>
                        <x-td>
                            <x-jet-button type="button" wire:click='detailItem({{ $pembayaran->id }})' class="bg-blue-400 hover:bg-blue-500">Detail Item
                            </x-jet-button>
                            <a href="{{ asset('bukti/' . $pembayaran->pdf_url) }}" target="_blank"
                                class="inline-block px-5 py-2 mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                Invoice
                            </a>
                        </x-td>
                        <x-td>
                            @if ($pembayaran->payment_status == 1)
                                <button type="button" wire:click='konfirmasiModal({{ $pembayaran->id }})'
                                    class="inline-block px-5 py-2 mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                    Belum Dikonfirmasi
                                </button>
                            @else
                                <button type="button"
                                    class="inline-block px-5 py-2 mx-auto text-white bg-slate-600 rounded-full hover:bg-green-700 md:mx-0">
                                    Dikonfirmasi
                                </button>
                            @endif
                        </x-td>
                    </tr>
                @endforeach
            </tbody>
            <x-slot name="links">
                {{$bayar->links()}}
            </x-slot>
        </x-table>
        <x-jet-confirmation-modal wire:model="deleteItem" maxWidth="sm">
            <x-slot name="title">Bukti Pembayaran</x-slot>
            <x-slot name="content">
                <img class="bukti-bayar" src="{{ asset('bukti/' . $pdf_url) }}" width="100" alt="">
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button type="button" wire:click='konfirmasi({{ $item }})'>Konfirmasi
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click="$toggle('deleteItem')" wire:loading.attr='disabled'>Batal
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
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
                            wire:model='item_details' id="password" type="text" disabled
                            placeholder="******************">
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
                            wire:model='transaksi_id' id="password" type="text" disabled
                            placeholder="******************">
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
                            wire:model.defer="harga" type="number" placeholder="******************">
                        @error('harga')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            detail Alamat
                        </label>
                        <textarea id="" cols="30" rows="10"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">{{ $detail_alamat }} ,{{ $kode_pos }} ,{{ $kabupaten }} ,
             </textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Status
                        </label>
                        <select id="countries" wire:model='status'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                            <option value="">--Pilih Status Pengiriman--</option>
                            <option value="1">Belum Dikirim</option>
                            <option value="2">Terkirim</option>
                        </select>
                        @error('kategori_produk')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>


                </form>
            </x-slot>

            <x-slot name="footer">
                <div class="flex items-center justify-between">
                    <button wire:click='createOngkir'
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Tambah
                    </button>
                    <button wire:click='$toggle("ongkirItem")'
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Close
                    </button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

</div>
