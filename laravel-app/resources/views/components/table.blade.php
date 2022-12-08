<div>

@include('sweetalert::alert')
<div class="items-center w-full py-4 mx-auto mb-10 bg-white rounded-lg shadow-md ">
    <div class="container mx-auto">
        <div
            class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:justify-between w-full px-4 mb-2 mt-4 items-center">
            <div class="flex bg-gray-100 w-full sm:w-2/5 items-center rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input
                    class="w-full bg-gray-100 outline-none border-transparent focus:border-transparent focus:ring-0 rounded-lg text-sm"
                    type="text" placeholder="Cari........." wire:model='search' />
            </div>
            <div class="flex-row space-x-2 items-center ">
                {{ $filter }}
                <select wire:model='order'
                    class="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                    {{-- <option>Short by</option> --}}
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>
                <select wire:model='row'
                    class="border border-gray-300 rounded-md text-gray-600 px-3 py-[9px] bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="mt-6 overflow-x-auto">
            <table class="w-full table-auto">
                {{ $slot }}
            </table>
        </div>
        <div class="flex flex-col items-center w-full px-4 py-4 text-sm text-gray-500 justify-center mx-auto">
            {{ $links }}
        </div>
    </div>
</div>

</div>
