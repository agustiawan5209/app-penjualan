<div>
    @include('sweetalert::alert')


    <div class="items-center w-full py-2 px-1  mx-auto my-10 bg-white rounded-lg shadow-md ">
        <div class="container mx-auto">
            <div date-rangepicker="" class="flex items-center">
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="startDate" type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 datepicker-input"
                        placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="maxDate" type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 datepicker-input"
                        placeholder="Select date end">
                </div>
            </div>
           @if ($startDate != null && $maxDate != null)
             <div class="flex justify-between w-full px-4 py-2">
                 <div class="text-lg font-bold">
                   Order History
                 </div>
                 <a href="{{route('Laporan', ['start'=> $startDate, 'end'=> $maxDate])}}" class="px-2 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                   </svg>
                 </a>
               </div>
           @endif
            <div class="mt-6 overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="">
                        <x-tr class="text-xs p-1">
                            <x-th>No.</x-th>
                            <x-th>Pengguna</x-th>
                            <x-th>Email</x-th>
                            <x-th>Tanggal Pembelian</x-th>
                            <x-th>Pesanan</x-th>
                            <x-th>Metode</x-th>
                            <x-th>Total</x-th>
                        </x-tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $transaksi)
                        <x-tr wire:loading.class='"opacity-50'>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $transaksi->pembayaran->user->name }}</x-td>
                            <x-td>{{ $transaksi->pembayaran->user->email }}</x-td>
                            <x-td>{{ $transaksi->pembayaran->nama }}</x-td>
                            <x-td>{{ $transaksi->tgl_transaksi }}</x-td>
                            <x-td>
                               {{$transaksi->barang->nama_barang}}
                            </x-td>
                            <x-td>{{ number_format($transaksi->total,0,2) }}</x-td>
                            @php
                                $total[] = $transaksi->total;
                            @endphp
                        </x-tr>
                    @endforeach
                    <x-tr>
                        <x-td colspan="5">Total Penjualan</x-td>
                        <x-td colspan="2">Rp. {{number_format(array_sum($total))}}</x-td>
                    </x-tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
