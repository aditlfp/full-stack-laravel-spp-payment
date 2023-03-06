<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-2xl uppercase">Edit Siswa</h3><span class="font-semibold text-slate-600 underline">{{ $siswa->nama}}</span>
    </div>
    <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ url('admin/siswa/'. $siswa->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="img">
             Image
            </label>
          </div>
        <div class="md:w-2/3">
          @if ($siswa->img === 'No Image')
          <div class="preview">
            <img src="/data-img/default-img.png" alt="Image Profil" srcset="" height="120px" width="120px">
          </div>
          @else
          <div class="preview">
            <img src="{{ asset('storage/images/'.$siswa->img)}}" alt="Image Profil" srcset="" height="120px" width="120px">
          </div>
          @endif
          <input type="text" class="hidden" value="{{ $siswa->img}}" id="oldimage" name="oldimage">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="img" name="img" type="file">
            <x-input-error class="mt-2" :messages="$errors->get('img')" />
        </div>
      </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nisn">
              NISN
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nisn" name="nisn" type="text" value="{{ $siswa->nisn}}">
            <x-input-error class="mt-2" :messages="$errors->get('nisn')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nis">
              NIS
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nis" name="nis" value="{{ $siswa->nis}}" type="text">
            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nama">
              Nama
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nama" name="nama" value="{{ $siswa->nama }}" type="text">
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="kelas">
              Kelas
            </label>
          </div>
          <div class="md:w-2/3">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="id_kelas" name="id_kelas">
              <option selected disabled class="disabled:bg-slate-700 disabled:text-slate-100">-- Select Kelas --</option>
                @foreach ($kelas as $s)
                    <option class="bg-slate-100" value="{{ $s->id}}" {{ $siswa->id_kelas == $s->id ? 'selected' : ''}}>{{ $s->nama_kelas }} {{ $s->kompetensi_keahlian}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="alamat">
                Alamat
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="alamat" name="alamat" value="{{ $siswa->alamat}}" type="text">
              <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            </div>
          </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="no_telp">
                No.Telp
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="no_telp" value="{{ $siswa->no_telp}}" name="no_telp" type="text">
              <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="id_spp">
                SPP
              </label>
            </div>
            <div class="md:w-2/3">
              <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="id_spp" name="id_spp">
                <option selected disabled class="disabled:bg-slate-700 disabled:text-slate-100">-- Select Spp --</option>
                  @foreach ($spp as $arr)
                      <option class="bg-slate-100" value="{{ $arr->id }}" {{ $siswa->id_spp == $arr->id ? 'selected' : ''}}>{{ $arr->tahun }} {{ $arr->nominal}}</option>
                  @endforeach
              </select>
              <x-input-error class="mt-2" :messages="$errors->get('id_spp')" />
            </div>
          </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Save Data
            </button>
            <a href="{{ route('siswa.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
          </div>
        </div>
      </form>
</x-app-layout>