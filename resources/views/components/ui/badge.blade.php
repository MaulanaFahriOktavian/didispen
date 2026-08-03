@props([
    'status' => 'default',
    'size' => 'md'
])

@php
    $sizeClasses = $size === 'sm' ? 'px-2 py-0.5 text-[10px]' : 'px-2.5 py-1 text-xs';
    
    $statusClasses = match(strtolower($status)) {
        'pending' => 'bg-[#F59E0B]/10 text-[#F59E0B] border-[#F59E0B]/20',
        'approved', 'finished', 'active', 'returned' => 'bg-[#22C55E]/10 text-[#22C55E] border-[#22C55E]/20',
        'rejected', 'inactive' => 'bg-[#EF4444]/10 text-[#EF4444] border-[#EF4444]/20',
        'out' => 'bg-[#3B82F6]/10 text-[#3B82F6] border-[#3B82F6]/20',
        default => 'bg-[#F8FAFC] text-[#6B7280] border-[#E5E7EB]'
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center font-semibold rounded-[12px] border {$sizeClasses} {$statusClasses} transition-colors"]) }}>
    @if($status === 'pending')
        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    @elseif(in_array($status, ['approved', 'finished', 'active', 'returned']))
        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
    @elseif(in_array($status, ['rejected', 'inactive']))
        <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    @endif
    {{ $slot }}
</span>