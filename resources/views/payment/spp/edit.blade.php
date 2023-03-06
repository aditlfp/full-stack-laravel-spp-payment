<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-xl uppercase">Edit Payment Spp</h3><span class="font-semibold text-slate-600 underline">{{ $pay->siswa->nama}}</span>
    </div>
    @if (Route::has('login'))
    @auth
        @if (Auth::user()->level_id === 1)
            <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ route('spp.store')}}">

        @elseif (Auth::user()->level_id === 2)
            <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ route('spps.store')}}">

        @else

        @endif
    @endauth
    @endif
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="id_petugas">
              Nama Petugas
            </label>
          </div>
          <div class="md:w-2/3">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="id_petugas" name="id_petugas">
            <option disabled class="disabled:bg-slate-700 disabled:text-slate-100">-- Select Petugas --</option>
                @foreach ($pe as $arr)
                    @if ($arr->level_id === 3)
                        
                    @else
                        <option class="bg-slate-100" value="{{ $arr->id }}" {{ $pay->id_petugas == $arr->id ? 'selected' : '' }}>{{ $arr->nama_petugas }}</option>
                        
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('id_petugas')" />
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nisn">
                Siswa / Nisn
            </label>
          </div>
          <div class="md:w-2/3">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="nisn" name="nisn">
            <option disabled class="disabled:bg-slate-700 disabled:text-slate-100">-- Siswa / Nisn --</option>
                @foreach ($sis as $arr)
                    <option class="bg-slate-100" value="{{ $arr->nisn }}" {{ $pay->nisn == $arr->nisn ? 'selected' : '' }}>{{ $arr->nama }} / {{ $arr->nisn }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('nisn')" />
           </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="tgl_bayar">
                Tanggal Bayar
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="tgl_bayar" name="tgl_bayar" type="date" value="{{ $pay->tgl_bayar}}">
              <x-input-error class="mt-2" :messages="$errors->get('tgl_bayar')" />
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="id_spp">
                 Spp Tahunan
              </label>
            </div>
          <div class="md:w-2/3">
            <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="id_spp" name="id_spp">
            <option disabled class="disabled:bg-slate-700 disabled:text-slate-100">-- Select SPP Tahunan --</option>
                @foreach ($sp as $arr)
                    <option class="bg-slate-100" value="{{ $arr->id }}" {{ $pay->id_spp === $arr->id ? 'selected' : ''}}>{{ $arr->tahun}} /  {{ toRupiah($arr->nominal)}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('id_spp')" />
           </div>
        </div>
        <input type="text" class="hidden" id="status_id" name="status_id" value="1">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="uang_bayar">
                Uang Bayar
              </label>
            </div>
            <div class="md:w-2/3 flex rounded-md shadow-md">
              <span class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 border-gray-200 bg-gray-100 text-sm text-black dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">Rp.</span>
              <input class="bg-gray-200 appearance-none border-r-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="uang_bayar" name="uang_bayar" type="text" placeholder="200000" value="{{ $pay->uang_bayar}}">
              <x-input-error class="mt-2" :messages="$errors->get('uang_bayar')" />
            </div>
          </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="jumlah_bayar">
                Jumlah Bayar
              </label>
            </div>
            <div class="md:w-2/3 flex rounded-md shadow-md">
              <span class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 border-gray-200 bg-gray-100 text-sm text-black dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">Rp.</span>
              <input class="bg-gray-200 appearance-none border-r-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="jumlah_bayar" name="jumlah_bayar" type="text" placeholder="170000" value="{{ $pay->jumlah_bayar}}">
              <x-input-error class="mt-2" :messages="$errors->get('jumlah_bayar')" />
            </div>
          </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="kembalian_bayar">
                Kembalian Bayar
              </label>
            </div>
            <div class="md:w-2/3 flex rounded-md shadow-md">
              <span class="px-4 inline-flex items-center min-w-fit rounded-l-md border border-r-0 border-gray-200 bg-gray-100 text-sm text-black dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400">Rp.</span>
              <input class="bg-gray-200 appearance-none border-r-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="kembalian_bayar" name="kembalian_bayar" type="text" placeholder="30000" readonly="" value="{{ $pay->kembalian_bayar}}">
              <x-input-error class="mt-2" :messages="$errors->get('kembalian_bayar')" />
            </div>
          </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="keterangan">
                Keterangan
              </label>
            </div>
            <div class="md:w-2/3 flex rounded-md shadow-md">
              <input class="bg-gray-200 appearance-none border-r-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="keterangan" name="keterangan" type="text" placeholder="Lunas" value="{{ $pay->keterangan}}">
              <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
            </div>
          </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Save Data
            </button>
            @if (Route::has('login'))
            @auth
                @if (Auth::user()->level_id === 1)
                    <a href="{{ route('spp.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
                @elseif (Auth::user()->level_id === 2)
                    <a href="{{ route('spps.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
                @else
    
                @endif
            @endauth
            @endif
          </div>
        </div>
      </form>
</x-app-layout>