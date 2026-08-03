@props([
    'variant' => 'primary',
    'size' => 'md',
    'loading' => false,
    'icon' => null,
    'type' => 'button',
    'disabled' => false
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold transition-all duration-200 focus:outline-none focus:ring-4 disabled:opacity-50 disabled:cursor-not-allowed rounded-[16px] active:scale-[0.98]';
    
    $sizeClasses = match($size) {
        'sm' => 'px-4 py-2 text-xs gap-2',
        'md' => 'px-6 py-3 text-sm gap-2.5',
        'lg' => 'px-8 py-4 text-base gap-3',
        default => 'px-6 py-3 text-sm gap-2.5'
    };

    $variantClasses = match($variant) {
        'primary' => 'bg-[#5B3DF5] text-white hover:bg-[#6D4CFF] focus:ring-[#5B3DF5]/20 shadow-lg shadow-[#5B3DF5]/20 hover:shadow-xl hover:shadow-[#5B3DF5]/30 hover:-translate-y-0.5',
        'secondary' => 'bg-[#5B3DF5]/10 text-[#5B3DF5] hover:bg-[#5B3DF5]/20 focus:ring-[#5B3DF5]/10',
        'outline' => 'bg-transparent border border-[#E5E7EB] text-[#111827] hover:bg-[#F8FAFC] hover:border-[#5B3DF5] focus:ring-[#5B3DF5]/10',
        'ghost' => 'bg-transparent text-[#6B7280] hover:text-[#111827] hover:bg-[#F8FAFC] focus:ring-[#E5E7EB]',
        'danger' => 'bg-[#EF4444] text-white hover:bg-red-600 focus:ring-[#EF4444]/20 shadow-lg shadow-[#EF4444]/20 hover:-translate-y-0.5',
        'success' => 'bg-[#22C55E] text-white hover:bg-green-600 focus:ring-[#22C55E]/20 shadow-lg shadow-[#22C55E]/20 hover:-translate-y-0.5',
        default => 'bg-[#5B3DF5] text-white'
    };

    $isDisabled = $disabled || $loading;
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }} 
    {{ $isDisabled ? 'disabled' : '' }}
>
    @if($loading)
        <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @elseif($icon)
        <span class="flex items-center">{!! $icon !!}</span>
    @endif
    
    <span>{{ $slot }}</span>
</button>