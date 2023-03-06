<x-app-layout>
    <form action="{{ route('import-siswa') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-3/6 mx-10 mb-20">
            <label for="file" class="block text-slate-500 font-bold md:text-left mb-1 md:mb-0 pr-4">File CSV</label>
            <div class="md:w-2/3">
                <input type="file" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 shadow-md" id="file" name="file">
            </div>
            <button type="submit" class="bg-blue-500 mt-10 px-10 py-1 rounded-md font-semibold text-white hover:bg-blue-600 hover:text-gray-300 transition all ease-in-out duration-100">Import</button>
        </div>
    </form>
    
</x-app-layout>