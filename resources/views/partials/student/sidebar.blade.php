{{-- Sidebar Student --}}
<aside class="w-72 bg-white border-r border-gray-200 flex flex-col shadow-xl z-20 fixed h-full">
    {{-- Logo Section --}}
    <div class="h-20 flex items-center px-8 border-b border-gray-100 bg-gradient-to-r from-[#8B5CF6] to-[#A78BFA]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-white tracking-tight">DIDISPEN</h1>
                <p class="text-xs text-white/80 font-medium">Portal Siswa</p>
            </div>
        </div>
    </div>

    {{-- User Info Section --}}
    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-br from-gray-50 to-white">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#8B5CF6] to-[#A78BFA] flex items-center justify-center text-white font-bold shadow-lg">
                {{ strtoupper(substr(auth('student')->user()->name ?? 'S', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-900 truncate">{{ auth('student')->user()->name ?? 'Siswa' }}</p>
                <p class="text-xs text-gray-500 font-medium">{{ auth('student')->user()->classroom?->full_name ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Navigation Menu --}}
    <nav class="flex-1 overflow-y-auto p-4 space-y-1">
        <div class="mb-2">
            <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-wider">MENU UTAMA</p>
        </div>
        
        <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('student.dashboard') ? 'bg-gradient-to-r from-[#8B5CF6]/10 to-transparent text-[#8B5CF6] border-r-3 border-[#8B5CF6]' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <div class="pt-6 pb-2">
            <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">DISPENSASI</p>
        </div>
        
        <a href="{{ route('student.dispensation.create') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('student.dispensation.create') ? 'bg-gradient-to-r from-[#8B5CF6]/10 to-transparent text-[#8B5CF6] border-r-3 border-[#8B5CF6]' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajukan Dispensasi
        </a>

        <a href="{{ route('student.dispensation.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('student.dispensation.*') ? 'bg-gradient-to-r from-[#8B5CF6]/10 to-transparent text-[#8B5CF6] border-r-3 border-[#8B5CF6]' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Riwayat Dispensasi
        </a>
    </nav>

    {{-- Logout Section --}}
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('student.logout') }}">
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