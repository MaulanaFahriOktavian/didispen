{{-- Top Navbar Satpam --}}
<header class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-30">
    <div class="px-8 py-4 flex items-center justify-between">
        {{-- Left: Breadcrumb --}}
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('satpam.dashboard') }}" class="text-gray-500 hover:text-[#3B82F6] font-medium transition-colors">
                    Dashboard
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 font-semibold">{{ $title ?? 'Satpam' }}</span>
            </div>
        </div>

        {{-- Right: Actions & User Info --}}
        <div class="flex items-center gap-6">
            {{-- Date Badge --}}
            <div class="hidden lg:flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#3B82F6]/5 to-[#3B82F6]/10 rounded-full border border-[#3B82F6]/20">
                <svg class="w-4 h-4 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-semibold text-[#3B82F6]">{{ now()->format('d M Y') }}</span>
            </div>

            {{-- Notifications --}}
            <button class="relative p-2 text-gray-400 hover:text-[#3B82F6] transition-colors rounded-lg hover:bg-[#3B82F6]/5">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>

            {{-- User Profile --}}
            <div class="flex items-center gap-3 pl-6 border-l border-gray-200">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name ?? 'Satpam' }}</p>
                    <p class="text-xs text-gray-500 font-medium">Petugas Keamanan</p>
                </div>
                <div class="relative group">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#3B82F6] to-[#60A5FA] flex items-center justify-center text-white font-bold shadow-lg cursor-pointer transition-transform hover:scale-105">
                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                    </div>
                    {{-- Dropdown Menu --}}
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right">
                        <div class="p-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Satpam' }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'satpam@didispen.id' }}</p>
                        </div>
                        <div class="p-2">
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>