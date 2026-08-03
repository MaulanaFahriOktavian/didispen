@props([
    'title',
    'value',
    'icon',
    'trend' => null,
    'color' => 'primary'
])

@php
    $colorClasses = match($color) {
        'success' => 'bg-[#22C55E]/10 text-[#22C55E]',
        'warning' => 'bg-[#F59E0B]/10 text-[#F59E0B]',
        'danger' => 'bg-[#EF4444]/10 text-[#EF4444]',
        'info' => 'bg-[#3B82F6]/10 text-[#3B82F6]',
        default => 'bg-[#5B3DF5]/10 text-[#5B3DF5]'
    };
@endphp

<x-ui.card variant="hover" class="flex flex-col justify-between">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-[#6B7280] mb-1">{{ $title }}</p>
            <h3 class="text-3xl font-bold text-[#111827] tracking-tight">{{ $value }}</h3>
        </div>
        <div class="p-3 rounded-[12px] {{ $colorClasses }}">
            {!! $icon !!}
        </div>
    </div>
    
    @if($trend)
        <div class="mt-4 flex items-center text-xs font-medium">
            @if($trend === 'up')
                <span class="text-[#22C55E] flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    Naik
                </span>
            @elseif($trend === 'down')
                <span class="text-[#EF4444] flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                    Turun
                </span>
            @endif
            <span class="text-[#6B7280] ml-2">dibanding bulan lalu</span>
        </div>
    @endif
</x-ui.card>