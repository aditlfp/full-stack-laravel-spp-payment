<x-app-layout>
    <div class="font-semibold text-xl mb-5 mx-5">
        <span>Data Siswa <span class="bg-yellow-400 px-5 py-1 shadow-md rounded-full">{{  now('wib')->toDateString() }}</span></span>
    </div>
    <div class="flex mx-5 my-5">
        <a href="{{ route('siswa.create')}}" class="bg-slate-600 px-5 py-2 rounded-lg text-white hover:bg-slate-500 hover:text-slate-800 transition all ease duration-100">Tambah Siswa</a>
        <div class="mx-5 relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
            <input type="search" id="searchInput" class="sblock shadow-md w-52 h-10 p-4 pl-10 text-sm text-dark border border-dark rounded-lg bg-white dark:bg-white dark:border-dark-600 dark:placeholder-dark dark:text-dark dark:focus:border-dark" placeholder="Search...">
        </div>
        <a href="{{ url('/admin/siswa/import')}}" class="bg-[#38E54D] hover:bg-[#9CFF2E] text-white transition all ease-out duration-100 rounded-full px-4 shadow-md"><i class="ri-upload-cloud-2-fill text-3xl"></i></a>
    </div>
    <div class="mx-5 mb-32">
        <table class="table-auto text-center" id="searchTable">
            <thead>
              <tr>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">No</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Foto Profil</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Nisn</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Nis</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Nama</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Kelas</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Spp</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp

              @foreach( $siswa as $s)
                <tr>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $no++}}</td>
                  @if ($s->img === 'No Image')
                    <td class="border-2 border-inherit bg-amber-200 px-4"><img src="/data-img/default-img.png" alt="Image Profil" srcset="" height="100px" width="100px"></td>
                  @else
                    <td class="border-2 border-inherit bg-amber-200 px-4"><img src="{{ asset('storage/images/'.$s->img)}}" alt="Image Profil" srcset="" height="100px" width="100px"></td>
                  @endif
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->nisn}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->nis}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->nama}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->kelas->nama_kelas}} - {{ $s->kelas->kompetensi_keahlian}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->spp->tahun}} /  {{ toRupiah($s->spp->nominal)}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">
                    <div class="flex gap-2">
                      <a href="{{ url('/admin/siswa/'.$s->id. '/edit')}}" class="bg-[#FFED00] shadow-md px-3 py-1 rounded text-lg hover:bg-amber-400 hover:shadow-sm transition all ease-out duration-100"><i class="ri-edit-box-line"></i>
                      </a>
                      <form action="{{ url('admin/siswa/'. $s->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-600 px-3 py-1 shadow-md rounded text-lg hover:bg-red-700 hover:shadow-sm transition all ease-out duration-100"><i class="ri-delete-bin-2-line"></i></button>

                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="px-3 py-2 mr-10 text-gray-500 mt-4 dark:text-white flex justify-center items-center">
            {{ $siswa->links()}}
        </div>
        </div>
</x-app-layout>