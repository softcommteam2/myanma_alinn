 <!--------------------Edit Date------------------->

 <form action="{{ url('sales/'.$sales->id) }}" method="POST">
    @method('PATCH')
    @csrf
    <input type="hidden" name="url" value="{{ url()->current() }}">
      <div
          class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
          x-show="editdate"
          x-transition:enter="transition duration-300"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition duration-300"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        >
          <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div
              class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
              @click.away="editdate = false"
              x-show="editdate"
              x-transition:enter="transition transform duration-300"
              x-transition:enter-start="scale-0"
              x-transition:enter-end="scale-100"
              x-transition:leave="transition transform duration-300"
              x-transition:leave-start="scale-100"
              x-transition:leave-end="scale-0"
            >
              <header class="flex items-center justify-between p-2">
                <h2 class="font-semibold">Brand</h2>
                <button class="focus:outline-none p-2" @click="editdate = false" type="button">
                  <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                    ></path>
                  </svg>
                </button>
              </header>
              <main class="p-2 text-center">
                <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                  <strong class="h6">Record Date</strong>
                  <div class="input-group border border-info rounded">
                      <input type="date" class="form-control" id="record_date" name="record_date" required value="{{ $sales->record_date->format('d-m-Y') }}" >
                  </div>
              </div>
              </main>
              <footer class="right-2 px-4 py-3 text-right sm:px-6 bg-primary-current rounded">
                <button
                  class="bg-green-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                  Save
                </button>
                <button
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" type="reset">
                  Reset
                </button>
                <button
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                  @click="editdate = false" type="button">
                  Cancel
                </button>
              </footer>
            </div>
          </div>
        </div>
    </form>
