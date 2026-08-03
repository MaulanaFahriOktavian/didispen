@props([
    'type' => 'info',
    'title' => null,
    'message' => '',
    'dismissible' => true
])

@php
    $colors = match($type) {
        'success' => 'bg-[#22C55E]/5 border-[#22C55E]/20 text-[#22C55E]',
        'warning' => 'bg-[#F59E0B]/5 border-[#F59E0B]/20 text-[#F59E0B]',
        'danger' => 'bg-[#EF4444]/5 border-[#EF4444]/20 text-[#EF4444]',
        default => 'bg-[#3B82F6]/5 border-[#3B82F6]/20 text-[#3B82F6]'
    };
    $iconColors = match($type) {
        'success' => 'text-[#22C55E]',
        'warning' => 'text-[#F59E0B]',
        'danger' => 'text-[#EF4444]',
        default => 'text-[#3B82F6]'
    };
@endphp

<div x-data="{ show: true }" x-show="show" {{ $attributes->merge(['class' => "rounded-[12px] border p-4 {$colors} transition-all duration-300"]) }} role="alert">
    <div class="flex items-start">
        <div class="flex-shrink-0 {{ $iconColors }}">
            @if($type === 'success')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @elseif($type === 'warning')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            @elseif($type === 'danger')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @endif
        </div>
        <div class="ml-3 flex-1">
            @if($title)
                <h3 class="text-sm font-bold mb-1">{{ $title }}</h3>
            @endif
            <div class="text-sm opacity-90">
                {{ $message }}
                {{ $slot }}
            </div>
        </div>
        @if($dismissible)
            <div class="ml-4 flex-shrink-0">
                <button @click="show = false" class="inline-flex rounded-md p-1.5 focus:outline-none hover:bg-white/20 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        @endif
    </div>
</div>