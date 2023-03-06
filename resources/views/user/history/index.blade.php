<x-app-layout>
    <div class="font-semibold text-m sm:text-xl mb-5 mx-5">
        <span>History Pembayaran SPP <span class="bg-yellow-400 px-2 py-1 sm:px-5 sm:py-1 shadow-md rounded-full">{{  now('wib')->toDateString() }}</span></span>
    </div>
    <div class="flex my-5">
        <div class="mx-5 relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
            <input type="search" id="searchInput" class="sblock shadow-md w-32 h-5 sm:w-52 sm:h-10 p-4 pl-10 text-sm text-dark border border-dark rounded-lg bg-white dark:bg-white dark:border-dark-600 dark:placeholder-dark dark:text-dark dark:focus:border-dark" placeholder="Search...">
        </div>
    </div>

    <div class="mx-5 mb-32 w-[85%] sm:w-full text-m" style="overflow-x: auto !important;">
      @if (count($pay) > 0)
        <table class="table-auto text-center" id="searchTable">
            <thead>
              <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Petugas</th>
                <th class="px-4 py-2 border">NISN / Siswa</th>
                <th class="px-4 py-2 border">Tanggal Bayar</th>
                <th class="px-4 py-2 border">Spp Tahunan</th>
                <th class="px-4 py-2 border hidden sm:block">Status</th>
                <th class="px-4 py-2 border">Keterangan</th>
                <th class="px-4 py-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
            
              @php
                $no = 1
              @endphp

              @foreach( $pay as $s)
                @if ($s->siswa->nama != Auth::user()->username)
                @continue
                <tr>
                  <td colspan="8" class="border px-4 py-2">Tidak Ada Pembayaran</td>
                </tr>
                @break
                @else
                <tr>
                  <td class="border px-4 py-2">{{ $no++}}</td>
                  <td class="border px-4 py-2">{{ $s->petugas->nama_petugas}}</td>
                  <td class="border px-4 py-2">{{ $s->siswa->nisn}} / {{ $s->siswa->nama}}</td>
                  <td class="border px-4 py-2">{{ $s->tgl_bayar}}</td>
                  <td class="border px-4 py-2">{{ $s->spp->tahun}} / {{ toRupiah($s->spp->nominal)}}</td>
                  <td class="border px-4 py-2 hidden sm:block">
                    @if ($s->status->id === 1)
                        <span class="bg-[#FFB84C] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->status->name}}</span>

                    @elseif ($s->status->id === 2)
                        <span class="bg-[#DC0000] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->status->name}}</span>

                    @elseif ($s->status->id === 3)
                        <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->status->name}}</span>
                    @else
                        <span class="bg-[#E14D2A] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->status->name}}</span>

                    @endif
                  </td>

                  <td class="border px-4 py-2">
                    @if ($s->keterangan === 'Lunas')
                        <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">{{ $s->keterangan}}</span>
                    @else
                        <span class="bg-[#FD841F] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md"> {{ $s->keterangan}}</span>
                    @endif
                </td>
                    <td class="border px-4 py-2">
                        @if ($s->keterangan != 'Lunas')
                        <a href="{{ url('user/history/pay/'. $s->id)}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md mx-2 text-sm px-2 py-2.2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class="ri-eye-fill text-white text-lg"></i>
                        </a>    
                        @else
                          
                        @endif
                    </td>
                </tr>
                @endif
              @endforeach

            </tbody>
          </table>
        @else
            <span class="text-center font-bold">Data Kosong</span>
        @endif
          <div class="px-3 py-2 mr-10 text-gray-500 mt-4 dark:text-white flex justify-center items-center">
            {{ $pay->links()}}
        </div>
        </div>

</x-app-layout>