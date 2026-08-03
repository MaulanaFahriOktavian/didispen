<aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-white border-r border-[#E5E7EB] z-20">
    <div class="flex items-center h-16 px-6 border-b border-[#E5E7EB]">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 rounded-lg bg-[#5B3DF5] flex items-center justify-center shadow-md shadow-[#5B3DF5]/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                </svg>
            </div>
            <span class="font-bold text-lg tracking-tight text-[#111827]">DIDISPEN</span>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto scrollbar-hide">
        <p class="px-3 text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-2">Menu Guru</p>
        
        <a href="{{ route('guru.dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('guru.dashboard') ? 'bg-[#5B3DF5]/10 text-[#5B3DF5]' : 'text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827]' }} transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827] transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Approval Dispensasi
        </a>
    </nav>

    <div class="border-t border-[#E5E7EB] p-4">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-[#5B3DF5]/10 flex items-center justify-center text-[#5B3DF5] font-bold text-sm">
                {{ strtoupper(substr(auth()->user()->username ?? 'G', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-[#111827] truncate">{{ auth()->user()->username ?? 'Guru' }}</p>
                <p class="text-xs text-[#6B7280] truncate">Guru Piket</p>
            </div>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="text-[#6B7280] hover:text-[#EF4444] transition-colors" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>