<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-gray-100">
    
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <div class="flex items-center gap-8">
                <h1 class="text-2xl font-bold font-mono text-[#F97316]">
                    FixMySchool
                </h1>
                <div class="flex items-center gap-6">

                    @if(auth()->user()->role === 'admin')

                        <x-nav-link href="/admin/dashboard" class="text-gray-600 hover:text-[#F97316]">
                            Pengaduan
                        </x-nav-link>

                        <x-nav-link href="/kategori" class="text-gray-600 hover:text-[#F97316]">
                            Kategori
                        </x-nav-link>

                        <x-nav-link href="/siswa" class="text-gray-600 hover:text-[#F97316]">
                            Siswa
                        </x-nav-link>

                    @endif

                </div>
            </div>
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-4 py-2 bg-[#F6EFE7] rounded-full hover:bg-orange-100 transition">

                            <div class="text-sm font-medium text-gray-700">
                                {{ Auth::user()->nama }}
                            </div>

                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="hover:bg-orange-50 text-gray-700">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>

        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t">

        <div class="pt-2 pb-3 space-y-1 px-4">

            @if(auth()->user()->role === 'admin')
                <x-responsive-nav-link href="/admin/dashboard">
                    Pengaduan
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/kategori">
                    Kategori
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/siswa">
                    Siswa
                </x-responsive-nav-link>
            @endif

        </div>

        <div class="pt-4 pb-3 border-t px-4">
            <div class="text-sm font-medium text-gray-800">
                {{ Auth::user()->name }}
            </div>
            <div class="text-xs text-gray-500">
                {{ Auth::user()->email }}
            </div>

            <div class="mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>

</nav>
