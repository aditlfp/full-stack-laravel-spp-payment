<x-app-layout>
    <div class="font-semibold text-xl mb-5 mx-5">
        <span>Data Pembayaran SPP <span class="bg-yellow-400 px-5 py-1 shadow-md rounded-full">{{  now('wib')->toDateString() }}</span></span>
    </div>
    <div class="flex mx-5 my-5">
        @if (Route::has('login'))
        @auth
            @if (Auth::user()->level_id === 1)
                <a href="{{ route('spp.create')}}" class="bg-slate-600 px-5 py-2 rounded-lg text-white hover:bg-slate-500 hover:text-slate-800 transition all ease duration-100">New Payment</a>
            @elseif (Auth::user()->level_id === 2)
                <a href="{{ route('spps.create')}}" class="bg-slate-600 px-5 py-2 rounded-lg text-white hover:bg-slate-500 hover:text-slate-800 transition all ease duration-100">New Payment</a>
            @else
            
            @endif
        @endauth
        @endif
        <div class="mx-5 relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
            <input type="search" id="searchInput" class="sblock shadow-md w-52 h-10 p-4 pl-10 text-sm text-dark border border-dark rounded-lg bg-white dark:bg-white dark:border-dark-600 dark:placeholder-dark dark:text-dark dark:focus:border-dark" placeholder="Search...">
        </div>
    </div>
    @if (Auth::user()->level_id === 1)
        @auth
            
    <div class="flex justify-end mr-[16%] mb-10">
        <form action="{{ route('payment.pdf') }}" method="GET">
            <button type="submit" class="bg-[#38E54D] hover:bg-[#9CFF2E] text-white transition all ease-out duration-100 rounded px-10 shadow-md"><i class="ri-file-text-fill text-3xl"></i></button>
        </form>
    </div>
        @endauth

    @endif

    <div class="mx-5 mb-32">
        <table class="table-auto text-center" id="searchTable">
            <thead>
              <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama Petugas</th>
                <th class="px-4 py-2 border">NISN / Siswa</th>
                <th class="px-4 py-2 border">Tanggal Bayar</th>
                <th class="px-4 py-2 border">Spp Tahunan</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Keterangan</th>
                <th class="px-4 py-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp

              @foreach( $pay as $s)
                <tr>
                  <td class="border px-4 py-2">{{ $no++}}</td>
                  <td class="border px-4 py-2">{{ $s->petugas->nama_petugas}}</td>
                  <td class="border px-4 py-2">{{ $s->siswa->nisn}} / {{ $s->siswa->nama}}</td>
                  <td class="border px-4 py-2">{{ $s->tgl_bayar}}</td>
                  <td class="border px-4 py-2">{{ $s->spp->tahun}} / {{ toRupiah($s->spp->nominal)}}</td>
                  <td class="border px-4 py-2">
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
                    @elseif ($s->keterangan === '-')
                        <span class="bg-[#379237] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md">Lunas</span>
                    @else
                        <span class="bg-[#FD841F] uppercase px-2 pb-1 rounded-full text-white text-[10px] font-semibold shadow-md"> {{ $s->keterangan}}</span>
                    @endif
                </td>

                  <td class="border px-4 py-2">
                    <div class="flex gap-2">
                    @if (Auth::user()->level_id === 1 )

                    @auth
                    @if ($s->status->id === 1)
                    <form action="{{ route('payment.success', $s->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-[#379237] hover:bg-[#54B435] px-3 py-1 text-xl rounded  transition all ease-out duration-100"><i class="ri-checkbox-fill text-white"></i>
                        </button>
                    </form>
                           

                    @elseif ($s->status_id === 4)
                    <form action="{{ route('payment.success', $s->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-[#379237] hover:bg-[#54B435] px-3 py-1 text-xl rounded  transition all ease-out duration-100"><i class="ri-checkbox-fill text-white"></i>
                        </button>
                    </form>
                    @else

                    @endif 
                    @endauth

                    {{-- View Confirm Payment --}}
                    @if ($s->status_id != 0)
                    @if (Auth::user()->level_id === 1 )
                    @auth

                        <a href="{{ url('payment/spp/'. $s->id)}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md mx-2 text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="ri-eye-fill text-white text-lg"></i></a>    
                    @elseif(Auth::user()->level_id === 2)
                        <a href="{{ url('payment/spps/'. $s->id)}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md mx-2 text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="ri-eye-fill text-white text-lg"></i></a>
                    @endauth
                    @endif
                    @endif

                    {{-- End View Confirm Payment --}}

                    {{-- Petugas Edit Status Pending --}}

                    @elseif (Auth::user()->level_id === 2)  
                        
                        @auth
                            @if ($s->status->id === 1)
                                <a href="{{ url('payment/spps/'.$s->id. '/edit')}}" class="bg-[#FFED00] px-3 py-1 rounded text-lg hover:bg-amber-300 transition all ease-out duration-100"><i class="ri-edit-box-line"></i>
                                </a>
                            @elseif ($s->status->id === 4)
                                <a href="{{ url('payment/spps/'.$s->id. '/edit')}}" class="bg-[#FFED00] px-3 py-1 rounded text-lg hover:bg-amber-300 transition all ease-out duration-100"><i class="ri-edit-box-line"></i>
                                </a>
                            @else
                            
                            <a href="javascript:void(0)" class="bg-[#F8F988] px-3 py-1 rounded text-lg"><i class="ri-edit-box-line"></i>
                            </a>
                            
                            @endif
                    @else

                        @endauth
                    @endif
                  

                    <form action="{{ url('payment/spp/'. $s->id)}}" method="POST">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="bg-red-600 px-3 py-1 rounded text-lg hover:bg-red-700 transition all ease-out duration-100"><i class="ri-delete-bin-2-line"></i></button>

                    </form>
                  </div>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="px-3 py-2 mr-10 text-gray-500 mt-4 dark:text-white flex justify-center items-center">
            {{ $pay->links()}}
        </div>
        </div>
       
</x-app-layout>