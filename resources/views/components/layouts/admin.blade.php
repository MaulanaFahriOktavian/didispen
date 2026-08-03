<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Dashboard Admin' }} — DIDISPEN</title>
    
    @include('partials.head')
</head>
<body class="h-full bg-[#F8FAFC] text-[#111827] font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-full">
        @include('partials.admin.sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden lg:pl-64">
            @include('partials.admin.header')
            
            <main class="flex-1 overflow-y-auto p-6 lg:p-8 scroll-smooth">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 lg:hidden" x-cloak>
        <div class="fixed inset-0 bg-[#111827]/50 backdrop-blur-sm transition-opacity" @click="sidebarOpen = false"></div>
        <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-2xl transform transition-transform duration-300 ease-in-out" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            @include('partials.admin.sidebar')
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>