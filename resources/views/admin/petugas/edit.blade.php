<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-2xl uppercase">Edit Petugas</h3><span class="font-semibold text-slate-600 underline">{{ $petugas->username}}</span>
    </div>
    <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" enctype="multipart/form-data" method="POST" action="{{ url('admin/petugas/'. $petugas->id)}}">
        @method('PUT')
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="username">
              Username
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="username" name="username" type="text" value="{{ $petugas->username}}">
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nama_petugas">
              Nama Petugas
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nama_petugas" name="nama_petugas" type="text" value="{{ $petugas->nama_petugas}}">
            <x-input-error class="mt-2" :messages="$errors->get('nama_petugas')" />
          </div>
        </div>

      <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="img">
              Image
            </label>
          </div>
        <div class="md:w-2/3">
        @if ($petugas->img === 'No Image')

            <div class="preview">
              <img src="/data-img/default-img.png" alt="Image Profil" srcset="" height="120px" width="120px">
            </div>
            @else

            <div class="preview">
              <img src="{{ asset('storage/images/'.$petugas->img)}}" alt="Image Profil" srcset="" height="120px" width="120px">
            </div>
        @endif

          <input type="text" class="hidden" value="{{ $petugas->img}}" id="oldimage" name="oldimage">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="img" name="img" type="file">
          <x-input-error class="mt-2" :messages="$errors->get('img')" />
          </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="alamat">
                Alamat
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="alamat" name="alamat" type="text" value="{{ $petugas->alamat}}">
              <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            </div>
          </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="no_telp">
                No Telp
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="no_telp" name="no_telp" type="text" value="{{ $petugas->no_telp}}">
              <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
            </div>
          </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Save Data
            </button>
            <a href="{{ route('petugas.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
          </div>
        </div>
      </form>
</x-app-layout>