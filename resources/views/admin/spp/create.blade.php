<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-2xl uppercase">Add New Spp</h3>
    </div>
    <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ route('cspp.store')}}">
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="tahun">
              Tahun
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="tahun" name="tahun" type="date">
            <x-input-error class="mt-2" :messages="$errors->get('tahun')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nominal">
              Nominal
            </label>
          </div>
          <div class="md:w-2/3 flex rounded-md shadow-md">
            <span class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 border-gray-200 bg-gray-100 text-sm text-black dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">Rp.</span>
            <input class="bg-gray-200 appearance-none border-r-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="nominal" name="nominal" type="text">
            <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
          </div>
        </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Save Data
            </button>
            <a href="{{ route('cspp.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
          </div>
        </div>
      </form>
</x-app-layout>