<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

    <main>
        <section class="absolute w-full h-full">
          <div
            class="absolute top-0 w-full h-full bg-gray-900"></div>
          <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
              <div class="w-full lg:w-4/12 px-4">
                <div
                  class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
                >
                  <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                      <h6 class="text-gray-600 text-sm font-bold">
                        Sign In Now
                      </h6>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-400" />
                  </div>
                  <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-700 text-xs font-bold mb-2"
                          for="username"
                          >Username</label
                        ><input
                          type="text"
                          class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                          placeholder="Username" id="username" name="username"
                          style="transition: all 0.15s ease 0s;"
                        />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-700 text-xs font-bold mb-2"
                          for="password"
                          >Password</label
                        ><input
                          type="password"
                          class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                          placeholder="Password" id="password" name="password"
                          style="transition: all 0.15s ease 0s;"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                      <div>
                        <a href="{{ route('register')}}" class="text-sm font-bold text-gray-700">Dont Have Account ?</a>
                      </div>
                      <div class="text-center mt-6">
                        <button
                          class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                          type="submit"
                          style="transition: all 0.15s ease 0s;"
                        >
                          Sign In
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
</form>
</x-guest-layout>
