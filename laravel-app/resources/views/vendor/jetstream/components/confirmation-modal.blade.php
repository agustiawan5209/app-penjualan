@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
            <div class="modal-content py-4 text-left ">
                <div class="flex justify-end items-center ">
                    <div class=" cursor-pointer  p-2">
                        <span class="w-6 h-6 mr-4 mt-1 text-red-500 dark:text-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <h2 class="text-center font-bold text-2xl mt-1 text-gray-600 dark:text-gray-100">{{$title}}</h2>
                <p class=" text-gray-500 font-medium text-center my-2 mx-auto dark:text-gray-200">
                    {{$content}}
                </p>
                <div class="flex-row md:flex items-center justify-center py-4 text-center mx-auto">
                    {{-- <div class="space-y-2 sm:space-x-2 my-4"> --}}
                        {{ $footer }}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

</x-jet-modal>
