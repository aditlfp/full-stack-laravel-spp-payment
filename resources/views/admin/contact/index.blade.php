<x-app-layout>
    <div class="font-semibold text-xl mb-5 mx-5">
        <span>Message <span class="bg-yellow-400 px-5 py-1 shadow-md rounded-full">{{  now('wib')->toDateString() }}</span></span>
    </div>
    <div class="flex mx-5 my-5">
        <div class="mx-5 relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
            <input type="search" id="searchInput" class="sblock shadow-md w-52 h-10 p-4 pl-10 text-sm text-dark border border-dark rounded-lg bg-white dark:bg-white dark:border-dark-600 dark:placeholder-dark dark:text-dark dark:focus:border-dark" placeholder="Search...">
        </div>
    </div>
    <div class="mx-5 mb-32">
        <table class="table-auto text-center" id="searchTable">
            <thead>
              <tr>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">No</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Username</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Email</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Message</th>
                <th class="px-4 py-2 border-2 border-inherit bg-amber-300">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp

              @foreach( $ct as $s)
                <tr>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $no++}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->username}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">{{ $s->email}}</td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2"><textarea name="desc" id="desc" cols="30" rows="10" class="shadow appearance-none border-2 border-inherit rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $s->desc}}</textarea></td>
                  <td class="border-2 border-inherit bg-amber-200 px-4 py-2">
                    <form action="{{ url('admin/contact/'. $s->id)}}" method="POST">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="bg-red-600 px-3 py-1 rounded text-lg hover:bg-red-700 transition all ease-out duration-100"><i class="ri-delete-bin-2-line"></i></button>

                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="px-3 py-2 mr-10 text-gray-500 mt-4 dark:text-white flex justify-center items-center">
            {{ $ct->links()}}
        </div>
        </div>
</x-app-layout>