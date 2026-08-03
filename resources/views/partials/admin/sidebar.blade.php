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
        <p class="px-3 text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-2">Menu Utama</p>
        
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#5B3DF5]/10 text-[#5B3DF5]' : 'text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827]' }} transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <p class="px-3 text-xs font-semibold text-[#6B7280] uppercase tracking-wider mt-6 mb-2">Master Data</p>

        <a href="{{ route('admin.major.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.major.*') ? 'bg-[#5B3DF5]/10 text-[#5B3DF5]' : 'text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827]' }} transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            Master Major
        </a>

        <p class="px-3 text-xs font-semibold text-[#6B7280] uppercase tracking-wider mt-6 mb-2">Sistem</p>

        <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827] transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Pengaturan
        </a>
    </nav>

    <div class="border-t border-[#E5E7EB] p-4">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-[#5B3DF5]/10 flex items-center justify-center text-[#5B3DF5] font-bold text-sm">
                {{ strtoupper(substr(auth()->user()->username ?? 'A', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-[#111827] truncate">{{ auth()->user()->username ?? 'Admin' }}</p>
                <p class="text-xs text-[#6B7280] truncate capitalize">{{ auth()->user()->role ?? 'Administrator' }}</p>
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