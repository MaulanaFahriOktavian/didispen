<header class="bg-white border-b border-[#E5E7EB] h-16 flex items-center justify-between px-6 sticky top-0 z-10">
    <button @click="sidebarOpen = true" class="lg:hidden text-[#6B7280] hover:text-[#111827]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <nav class="hidden md:flex items-center text-sm text-[#6B7280]">
        <a href="{{ route('satpam.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        @if(request()->route()->getName() && request()->route()->getName() != 'satpam.dashboard')
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="font-semibold text-[#111827]">{{ ucwords(str_replace('.', ' ', request()->route()->getName())) }}</span>
        @endif
    </nav>

    <div class="flex items-center gap-4">
        <button class="relative p-2 text-[#6B7280] hover:text-[#111827] hover:bg-[#F8FAFC] rounded-full transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </button>
    </div>
</header>