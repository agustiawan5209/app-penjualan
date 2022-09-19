<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />

@include('sweetalert::alert')
<div class="items-center w-full py-4 mx-auto my-10 bg-white rounded-lg shadow-md ">
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
                    type="text" placeholder="Search a product..." wire:model='search' />
            </div>
            <div class="flex-row space-x-2 items-center ">
                {{ $filter }}
                <select wire:model='order'
                    class="border border-gray-300 rounded-md text-gray-600 px-2 pl-2 pr-8 bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                    {{-- <option>Short by</option> --}}
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>
                <button
                    class="border border-gray-300 rounded-md text-gray-600 px-3 py-[9px] bg-white hover:border-gray-400 focus:outline-none text-xs focus:ring-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                    </svg>
                </button>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({

        });
    });
</script>
