<div class="flex items-center justify-center h-screen">
  <button class="inline-flex items-center modal-open px-6 py-3 text-xl font-semibold text-red-600 hover:text-white
  bg-white hover:bg-red-600 border-2 border-red-500 rounded-full focus:outline-none dark:border-gray-50 dark:bg-gray-800
  dark:text-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-50 ">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
  </svg>
  Delete media
  </button>
  <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-300 opacity-50"></div>
    <div class="modal-container bg-gradient-to-r bg-white dark:bg-gray-800 max-w-lg mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 text-left px-6">
        <div class="flex justify-end items-center pb-3">
          <div class="modal-close cursor-pointer z-50 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </div>
        </div>
        <h2 class="text-center font-bold text-2xl mt-1 text-gray-600 dark:text-gray-100">Delete media?</h2>
        <p class=" text-gray-500 font-medium text-center my-6 mx-6 dark:text-gray-200">
          Are you sure you want to delete "rainiy_day.jpg"? You can't undo this action.
        </p>
        <div class="px-4 flex flex-row py-4 min-w-min border-l-4 border-red-400 dark:border-gray-200 bg-red-100 dark:bg-gray-700 rounded mx-auto">
          <span class="w-6 h-6 mr-4 mt-1 text-red-500 dark:text-gray-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
          </span>
          <div>
            <h2 class="text-lg font-bold text-red-700 dark:text-gray-100">Warning</h2>
            <p class="text-sm my-2 text-red-500 dark:text-gray-200 font-medium">By deleting this media 8 connected
              hotspots will also be deleting.</p>
          </div>
        </div>
        <div class="flex-row md:flex items-center md:justify-between py-4 text-center mx-auto">
          <div class="space-y-2 sm:space-x-2 my-4">
            <button class="modal-close px-5 py-2 bg-gray-500 rounded-full text-gray-200 font-semibold hover:bg-gray-800 dark:hover:bg-gray-600 hover:text-gray-100 focus:outline-none">No,
              Keep it.</button>
            <button class="modal-close px-5 py-2 bg-red-500 dark:bg-gray-100 rounded-full text-gray-200 dark:text-gray-700 font-semibold hover:bg-red-600 dark:hover:bg-white hover:text-gray-100 dark:hover:text-gray-800 focus:outline-none">
              Yes, Delete media!
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function (event) {
        event.preventDefault()
        toggleModal()
      })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }

    function toggleModal() {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
  </script>
</div>
