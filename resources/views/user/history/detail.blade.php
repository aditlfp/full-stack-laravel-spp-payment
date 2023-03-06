<x-app-layout>
    <div class="my-5 ml-10 sm:my-5 sm:mx-5 py-[2px] bg-yellow-500 sm:w-[20%] text-center shadow-md rounded-md">
        <h3 class="font-bold text-xl uppercase">Upload Confirm payment</h3>
    </div>
    <div class="flex">
        <form class="w-[80%] sm:w-full sm:max-w-lg mb-5 mx-12 sm:mx-0" method="POST" action="{{ route('pay.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="md:flex md:items-center mb-6 ml-6">
          <div class="md:w-1/3">
            <label class="block text-slate-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="code_pay">
                Code Transaksi
            </label>
          </div>
            <div class="md:w-2/3">
                <input readonly class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="code_pay" name="code_pay" type="text"
                value="TRXP-{{ $pay->siswa->id . $pay->id}}">
            <x-input-error class="mt-2" :messages="$errors->get('code_pay')" />
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
            <x-input-error class="mt-2" :messages="$errors->get('siswa_id')" />
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
            <x-input-error class="mt-2" :messages="$errors->get('pembayaran_id')" />
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
            <x-input-error class="mt-2" :messages="$errors->get('spp_id')" />
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

              <div class="preview">
                <img src="{{ asset('storage/images/'. $confPay->img)}}" alt="" width="90%">
              </div>
            @else

            <div class="preview">
              <img src="" alt="" width="90%">
            </div>
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="img" name="img" type="file">
            <x-input-error class="mt-2" :messages="$errors->get('img')" />
            
            @endif
            </div>
          </div>
        <div class="md:flex md:items-center ml-6">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            @if ($confPay != null)
                
            @else
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Confirm Pay
            </button>  
            @endif
           
            <a href="{{ route('pay.index')}}" class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Back</a>
          </div>
        </div>
      </form>
      <div class="bg-gray-200 ml-[5rem] mb-[5rem] rounded-lg shadow-md w-[20rem]">
        <div class="p-2 text-center">
            <h6 class="font-bold text-xl my-2">How To Pay</h6>
        </div>

        <div class="ml-5 font-semibold">
        <div>
          <span>1. Buka Aplikasi Go Pay</span>
        </div>
        <div>
          <span>2. Klik Kirim</span>
        </div>
        <div>
          <span>3. Masukkan Nomor Berikut</span>
        </div>
        <div class="ml-5 bg-blue-300 w-[40%] px-2 py-1 rounded-md shadow-md">
          <span>081234567890</span>
        </div>
        <div>
          <span>4. Masukkan Nominal Yang Sesuai</span>
        </div>
        <div>
          <span>5. Klik Kirim/Send</span>
        </div>
        <div>
          <span>6. Foto/Screenshot Bukti Transfer</span>
        </div>
        <div>
          <span>7. Kirim Bukti Transfer DiKiri Layar Ini</span>
        </div>
      </div>
      </div>
    </div>
</x-app-layout>