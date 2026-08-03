@props([
    'name',
    'title' => 'Konfirmasi',
    'maxWidth' => 'md'
])

@php
    $maxWidthClasses = match($maxWidth) {
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        default => 'max-w-md'
    };
@endphp

<div x-data="{ open: false }" 
     x-on:open-modal.window="$event.detail == '{{ $name }}' ? open = true : null" 
     x-on:close-modal.window="open = false" 
     x-on:keydown.escape.window="open = false"
     x-show="open" 
     class="relative z-50" 
     x-cloak>
    
    <div x-show="open" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-[#111827]/50 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div x-show="open" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 @click.outside="open = false" 
                 {{ $attributes->merge(['class' => "relative transform overflow-hidden rounded-[20px] bg-white text-left shadow-xl border border-[#E5E7EB] transition-all sm:my-8 sm:w-full {$maxWidthClasses}"]) }}>
                
                <div class="bg-white px-6 py-4 border-b border-[#E5E7EB] flex items-center justify-between">
                    <h3 class="text-base font-bold text-[#111827]">{{ $title }}</h3>
                    <button @click="open = false" class="text-[#6B7280] hover:text-[#111827] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="px-6 py-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>