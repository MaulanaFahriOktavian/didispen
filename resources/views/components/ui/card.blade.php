@props([
    'variant' => 'default',
    'padding' => 'md'
])

@php
    $paddingClasses = match($padding) {
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
        'none' => 'p-0',
        default => 'p-6'
    };

    $variantClasses = match($variant) {
        'glass' => 'bg-white/80 backdrop-blur-xl shadow-lg',
        'hover' => 'bg-white border border-[#E5E7EB] shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300',
        default => 'bg-white border border-[#E5E7EB] shadow-sm'
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-[20px] {$paddingClasses} {$variantClasses}"]) }}>
    {{ $slot }}
</div>