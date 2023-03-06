<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-2xl uppercase">Add New Kelas</h3>
    </div>
    <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ route('kelas.store')}}">
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nama_kelas">
              Nama Kelas
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nama_kelas" name="nama_kelas" type="text">
            <x-input-error class="mt-2" :messages="$errors->get('nama_kelas')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="kompetensi_keahlian">
              Kompetensi Keahlian
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="kompetensi_keahlian" name="kompetensi_keahlian" type="text">
            <x-input-error class="mt-2" :messages="$errors->get('kompetensi_keahlian')" />
          </div>
        </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Save Data
            </button>
            <a href="{{ route('kelas.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
          </div>
        </div>
      </form>
</x-app-layout>