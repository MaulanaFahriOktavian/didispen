{{-- Sidebar Guru --}}
<aside class="w-72 bg-white border-r border-gray-200 flex flex-col shadow-xl z-20 fixed h-full">
    {{-- Logo Section --}}
    <div class="h-20 flex items-center px-8 border-b border-gray-100 bg-gradient-to-r from-[#10B981] to-[#34D399]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-white tracking-tight">DIDISPEN</h1>
                <p class="text-xs text-white/80 font-medium">Panel Guru Piket</p>
            </div>
        </div>
    </div>

    {{-- User Info Section --}}
    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-br from-gray-50 to-white">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#10B981] to-[#34D399] flex items-center justify-center text-white font-bold shadow-lg">
                {{ strtoupper(substr(auth()->user()->name ?? 'G', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name ?? 'Guru' }}</p>
                <p class="text-xs text-gray-500 font-medium">Guru Piket</p>
            </div>
        </div>
    </div>

    {{-- Navigation Menu --}}
    <nav class="flex-1 overflow-y-auto p-4 space-y-1">
        <div class="mb-2">
            <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-wider">MENU UTAMA</p>
        </div>
        
        <a href="{{ route('guru.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('guru.dashboard') ? 'bg-gradient-to-r from-[#10B981]/10 to-transparent text-[#10B981] border-r-3 border-[#10B981]' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <div class="pt-6 pb-2">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">MANAJEMEN</p>
        </div>
        
        <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Riwayat Dispensasi
        </a>

        <div class="pt-6 pb-2">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">LAINNYA</p>
        </div>

        <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 text-gray-600 hover:text-gray-900 hover:bg-gray-50 opacity-60 cursor-not-allowed">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Laporan
            <span class="ml-auto text-[10px] bg-gray-200 text-gray-600 px-2 py-0.5 rounded-full font-semibold">Soon</span>
        </a>
    </nav>

    {{-- Logout Section --}}
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-600 rounded-xl hover:bg-red-50 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>