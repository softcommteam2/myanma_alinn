 <!--------------------Add Brand------------------->

 <form action="{{url('customer')}}" method="POST" >
    <input type="hidden" name="url" value="{{ url()->current() }}">
      @csrf
      <div
          class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
          x-show="addBrand"
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
              @click.away="addBrand = false"
              x-show="addBrand"
              x-transition:enter="transition transform duration-300"
              x-transition:enter-start="scale-0"
              x-transition:enter-end="scale-100"
              x-transition:leave="transition transform duration-300"
              x-transition:leave-start="scale-100"
              x-transition:leave-end="scale-0"
            >
              <header class="flex items-center justify-between p-2">
                <h2 class="font-semibold">Customer</h2>
                <button class="focus:outline-none p-2" @click="addCustomer = false" type="button">
                  <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                    ></path>
                  </svg>
                </button>
              </header>
              <main class="p-2 text-center">
              <div class="grid grid-col-1">
                <div class="p-4">
                  <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2 text-left" for="grid-city">
                      Name
                  </label>
                  <input type="text" name="name" id="name" autocomplete="given-name" class="max-w-full block w-full shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:max-w-full sm:text-sm border-gray-300 rounded-md py-2" placeholder="Enter Customer name" >
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
                  Clear
                </button>
                <button
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                  @click="addBrand = false" type="button">
                  Cancel
                </button>
              </footer>
            </div>
          </div>
        </div>
    </form>
