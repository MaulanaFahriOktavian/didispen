@props([
    'icon' => 'inbox',
    'title' => 'No Data Found',
    'description' => 'Start adding data to see it appear here.',
    'action' => null
])

@php
    $icons = [
        'inbox' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>',
        'search' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>',
        'folder' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>',
    ];
@endphp

<div class="flex flex-col items-center justify-center py-12">
    <div class="w-16 h-16 rounded-full bg-[#F8FAFC] flex items-center justify-center mb-4">
        <svg class="w-8 h-8 text-[#6B7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icons[$icon] ?? $icons['inbox'] !!}
        </svg>
    </div>
    <p class="font-bold text-[#111827] mb-1">{{ $title }}</p>
    <p class="text-sm text-[#6B7280] max-w-xs text-center">{{ $description }}</p>
    @if($action)
        <div class="mt-4">
            {{ $action }}
        </div>
    @endif
</div>