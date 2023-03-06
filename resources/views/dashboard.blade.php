<x-app-layout>
<!-- Responsive Navigation Menu -->
    <div class="w-[50%] mx-5 my-32">
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:block">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
            @if (Route::has('login'))
                @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->username }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->nama_petugas }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    @if (Auth::user()->level_id != 1)
                        
                    @else
                    <x-responsive-nav-link :href="route('admin.panel')">
                        {{ __('Admin Panel')}}
                    </x-responsive-nav-link>
                        
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
                @endauth
            @endif
        </div>    
    </div>

</x-app-layout>
