<div class="z-50 fixed top-0">
    @if ($barang_id != null || $barang_id != '' || $barang_id != 0)
        <form
            class="relative w-screen max-w-lg mx-auto overflow-auto bg-white border border-gray-100 rounded-lg shadow-lg divide-y divide-gray-100">
            <header class="px-6 py-4">
                <strong class="text-lg font-medium text-gray-900">
                    {{ date('Y M d') }}
                </strong>

                <p class="text-sm mt-1.5 text-gray-500">
                    Detail Pembayaran
                </p>
            </header>

            <main class="px-6 overflow-y-auto flow-root h-96">

                <ol class="border-l-2 border-blue-600">
                    <li>
                        <div class="md:flex flex-start">
                            <div class="bg-blue-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                    </path>
                                </svg>
                            </div>
                            <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-md ml-6 mb-10">
                                <div class="flex justify-between mb-4">
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">New
                                        Web Design</a>
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">04
                                        / 02 / 2022</a>
                                </div>
                                <p class="text-gray-700 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Quisque
                                    scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat
                                    facilisis
                                    mollis. Duis sagittis ligula in sodales vehicula.</p>
                                <button type="button"
                                    class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">Preview</button>
                                <button type="button"
                                    class="inline-block px-3.5 py-1 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">See demo</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="md:flex flex-start">
                            <div class="bg-blue-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                    </path>
                                </svg>
                            </div>
                            <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-md ml-6 mb-10">
                                <div class="flex justify-between mb-4">
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">21
                                        000 Job Seekers</a>
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">12
                                        / 01 / 2022</a>
                                </div>
                                <p class="text-gray-700 mb-6">Libero expedita explicabo eius fugiat quia aspernatur
                                    autem
                                    laudantium error architecto recusandae natus sapiente sit nam eaque, consectetur
                                    porro
                                    molestiae ipsam an deleniti.</p>
                                <button type="button"
                                    class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">Preview</button>
                                <button type="button"
                                    class="inline-block px-3.5 py-1 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">See demo</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="md:flex flex-start">
                            <div class="bg-blue-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                    </path>
                                </svg>
                            </div>
                            <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-md ml-6 mb-10">
                                <div class="flex justify-between mb-4">
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">Awesome
                                        Employers</a>
                                    <a href="#!"
                                        class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">21
                                        / 12 / 2021</a>
                                </div>
                                <p class="text-gray-700 mb-6">Voluptatibus temporibus esse illum eum aspernatur, fugiat
                                    suscipit
                                    natus! Eum corporis illum nihil officiis tempore. Excepturi illo natus libero sit
                                    doloremque, laborum molestias rerum pariatur quam ipsam necessitatibus incidunt,
                                    explicabo.
                                </p>
                                <button type="button"
                                    class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">Preview</button>
                                <button type="button"
                                    class="inline-block px-3.5 py-1 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">See demo</button>
                            </div>
                        </div>
                    </li>
                </ol>
            </main>

            <footer class="flex items-center justify-between px-6 py-4">

                <button wire:click="$toggle('status')" wire:loading.attr='disabled'
                    class="px-5 py-3 text-sm font-medium text-white bg-red-600 rounded-lg" type="submit">
                    Tutup
                </button>
            </footer>
        </form>
    @elseif($ongkir_id != null || $ongkir_id != '' || $ongkir_id != 0)
        <form
            class="relative w-screen max-w-lg mx-auto overflow-auto bg-white border border-gray-100 rounded-lg shadow-lg divide-y divide-gray-100">
            <header class="px-6 py-4">
                <strong class="text-lg font-medium text-gray-900">
                    {{ date('Y M d') }}
                </strong>

                <p class="text-sm mt-1.5 text-gray-500">
                    Detail Ongkir {{ $ongkir_id }}
                </p>
            </header>

            <main class="px-6 overflow-y-auto h-96">

                <ol class="border-l-2 border-blue-600">
                    @foreach ($status_ongkir as $item)
                        <li>
                            <div class="md:flex flex-start">
                                <div class="bg-blue-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                        class="text-white w-3 h-3" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-md ml-6 mb-10">
                                    <div class="flex justify-between mb-4">
                                        <a href="#!"
                                            class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">Status
                                            Pengiriman</a>
                                        <a href="#!"
                                            class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-800 duration-300 transition ease-in-out text-sm">{{ $item->created_at }}</a>
                                    </div>
                                    <p class="text-gray-700 mb-6">
                                        {{ $item->ket == null ? 'Keterangan Kosong' : $item->ket }}.</p>
                                    {{-- <button type="button"
                                        class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                        data-mdb-ripple="true">Preview</button>
                                    <button type="button"
                                        class="inline-block px-3.5 py-1 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                        data-mdb-ripple="true">See demo</button> --}}
                                </div>
                            </div>
                        </li @endforeach>
                </ol>
            </main>

            <footer class="flex items-center justify-between px-6 py-4">

                <button wire:click="$toggle('status')" wire:loading.attr='disabled'
                    class="px-5 py-3 text-sm font-medium text-white bg-red-600 rounded-lg" type="submit">
                    Tutup
                </button>
            </footer>
        </form>
    @endif


</div>
