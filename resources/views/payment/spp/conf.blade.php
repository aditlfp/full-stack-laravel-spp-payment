<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-xl uppercase">View Confirm payment</h3>
    </div>
    <div class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0">
        <div class="md:flex md:items-center mb-6 ml-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="code_pay">
                Code Transaksi
            </label>
          </div>
            <div class="md:w-2/3">
                <input readonly class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="code_pay" name="code_pay" type="text"
                value="TRXP-{{ $pay->siswa->id . $pay->id}}">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6 ml-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="siswa_id">
              NISN / Nama Siswa
            </label>
          </div>
            <div class="md:w-2/3">
                <input type="text" value="{{ $pay->siswa->id}}" class="hidden" id="siswa_id" name="siswa_id">
                <input readonly class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" type="text" value="{{ $pay->siswa->nisn}} - {{ $pay->siswa->nama}}">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6 ml-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pembayaran_id">
              No Pembayaran
            </label>
          </div>
            <div class="md:w-2/3">
                <input readonly class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" type="text" id="pembayaran_id" name="pembayaran_id" value="{{ $pay->id }}">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6 ml-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="spp_id">
              SPP
            </label>
          </div>
            <div class="md:w-2/3">
                <input type="text" value="{{ $pay->spp->id}}" class="hidden" name="spp_id" id="spp_id">
                <input readonly class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" type="text" value="{{ $pay->spp->tahun }} / {{ toRupiah($pay->spp->nominal)}}">
          </div>
        </div>
        <div class="md:flex md:items-center mb-6 ml-6">
            <div class="md:w-1/3">
              <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="img">
                Image
              </label>
            </div>
            <div class="md:w-2/3">
            @if ($confPay != null)
                <img src="{{ asset('/storage/images/'. $confPay->img)}}" srcset="" width="30%">
            @else
                <span class="text-white font-semibold text-lg bg-red-700 px-5 py-2 rounded-md">Belum Dikonfirmasi</span>
            @endif
            </div>
          </div>
        <div class="md:flex md:items-center ml-6">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            </button>
            @if (Auth::user()->level_id === 1)
            @auth
                <a href="{{ route('spp.index')}}" class="shadow bg-gray-700 hover:bg-gray-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
            @elseif(Auth::user()->level_id === 2)
                <a href="{{ route('spps.index')}}" class="shadow bg-gray-700 hover:bg-gray-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
            @endauth
            @endif
          </div>
        </div>
    </div>
</x-app-layout>