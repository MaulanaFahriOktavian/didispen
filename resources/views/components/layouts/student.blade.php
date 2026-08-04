<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Portal Siswa - DIDISPEN' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect { background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px); }
        .sidebar-gradient { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }
        .menu-item-active { background: linear-gradient(90deg, rgba(139,92,246,0.12) 0%, transparent 100%); color: #8b5cf6; border-right: 3px solid #8b5cf6; }
        .menu-item:hover { background: rgba(139,92,246,0.06); }
        @media (max-width: 768px) {
            .mobile-sidebar { transform: translateX(-100%); transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
            .mobile-sidebar.open { transform: translateX(0); }
            .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); backdrop-filter: blur(4px); z-index: 40; }
            .overlay.show { display: block; }
        }
    </style>
</head>
<body class="bg-gray-50/50">
    <div class="overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="mobile-sidebar w-64 bg-white border-r border-gray-200/60 flex flex-col shadow-lg z-50 fixed h-full md:relative">
            {{-- Logo Section --}}
            <div class="sidebar-gradient px-5 py-4 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12 blur-xl"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/10 rounded-full -ml-10 -mb-10 blur-lg"></div>
                
                <div class="flex items-center gap-2.5 relative z-10">
                    <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center backdrop-blur-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white tracking-tight">DIDISPEN</h1>
                        <p class="text-[10px] text-white/70 font-medium">Portal Siswa</p>
                    </div>
                </div>
            </div>

            {{-- User Info --}}
            <div class="px-4 py-3 border-b border-gray-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-[#8b5cf6] to-[#7c3aed] flex items-center justify-center text-white font-bold text-sm shadow-md">
                        {{ strtoupper(substr(auth('student')->user()->name ?? 'S', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">{{ auth('student')->user()->name ?? 'Siswa' }}</p>
                        <p class="text-[11px] text-gray-500 font-medium truncate">{{ auth('student')->user()->classroom?->full_name ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Navigation Menu --}}
            <nav class="flex-1 overflow-y-auto py-3 px-3 space-y-0.5">
                <div class="mb-2">
                    <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Menu Utama</p>
                </div>
                
                <a href="{{ route('student.dashboard') }}" class="menu-item flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-semibold rounded-lg transition-all duration-200 {{ request()->routeIs('student.dashboard') ? 'menu-item-active' : 'text-gray-600' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <div class="pt-3 pb-1">
                    <p class="px-3 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Dispensasi</p>
                </div>
                
                <a href="{{ route('student.dispensation.create') }}" class="menu-item flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-semibold rounded-lg transition-all duration-200 {{ request()->routeIs('student.dispensation.create') ? 'menu-item-active' : 'text-gray-600' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajukan Dispensasi
                    <span class="ml-auto text-[9px] bg-violet-100 text-violet-700 px-1.5 py-0.5 rounded font-bold">New</span>
                </a>

                <a href="{{ route('student.dispensation.index') }}" class="menu-item flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-semibold rounded-lg transition-all duration-200 {{ request()->routeIs('student.dispensation.*') && !request()->routeIs('student.dispensation.create') ? 'menu-item-active' : 'text-gray-600' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Riwayat Dispensasi
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-3 border-t border-gray-100">
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2.5 text-[13px] font-semibold text-red-600 rounded-lg hover:bg-red-50 transition-all duration-200 group">
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Navbar --}}
            <header class="glass-effect border-b border-gray-200/60 flex items-center justify-between px-6 py-3 sticky top-0 z-30">
                {{-- Left: Hamburger & Breadcrumb --}}
                <div class="flex items-center gap-3">
                    <button onclick="toggleSidebar()" class="md:hidden p-1.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    
                    <div class="hidden md:flex items-center gap-1.5 text-sm">
                        <a href="{{ route('student.dashboard') }}" class="text-gray-500 hover:text-violet-600 font-medium transition-colors">Dashboard</a>
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-gray-900 font-bold">{{ $title ?? 'Siswa' }}</span>
                    </div>
                </div>

                {{-- Right: Actions --}}
                <div class="flex items-center gap-2.5">
                    {{-- Date Badge --}}
                    <div class="hidden md:flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-violet-50 to-purple-50 rounded-lg border border-violet-200/60">
                        <svg class="w-3.5 h-3.5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs font-bold text-violet-800">{{ now()->format('d M Y') }}</span>
                    </div>

                    {{-- Notifications --}}
                    <button class="relative p-2 text-gray-400 hover:text-violet-600 transition-colors rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>

                    {{-- User Avatar --}}
                    <div class="flex items-center gap-2 pl-2 border-l border-gray-200">
                        <div class="text-right hidden md:block">
                            <p class="text-xs font-bold text-gray-900">{{ auth('student')->user()->name ?? 'Siswa' }}</p>
                            <p class="text-[10px] text-gray-500 truncate">{{ auth('student')->user()->classroom?->full_name ?? '-' }}</p>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#8b5cf6] to-[#7c3aed] flex items-center justify-center text-white font-bold text-xs shadow-md">
                            {{ strtoupper(substr(auth('student')->user()->name ?? 'S', 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto bg-gray-50/50 p-4 md:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.mobile-sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }
    </script>
</body>
</html>