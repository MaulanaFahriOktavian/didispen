@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'type' => 'text',
    'placeholder' => '',
    'icon' => null,
    'error' => null,
    'disabled' => false
])

@php
    $id = $id ?? $name;
    $hasError = $error ?? $errors->has($name);
@endphp

<div class="space-y-2">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-semibold text-[#111827]">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <span class="text-[#6B7280] flex items-center">{!! $icon !!}</span>
            </div>
        @endif

        <input 
            type="{{ $type }}" 
            name="{{ $name }}" 
            id="{{ $id }}"
            value="{{ old($name, $attributes->get('value')) }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge(['class' => "block w-full h-[54px] rounded-[16px] border-2 bg-white text-[#111827] placeholder-[#6B7280]/50 shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 disabled:bg-[#F8FAFC] disabled:cursor-not-allowed " . ($icon ? 'pl-12' : 'pl-4') . " pr-4 text-sm font-medium " . ($hasError ? 'border-[#EF4444] focus:border-[#EF4444] focus:ring-[#EF4444]/10' : 'border-[#E5E7EB] focus:border-[#5B3DF5] focus:ring-[#5B3DF5]/10')]) }}
        >
    </div>

    @if($hasError)
        <p class="text-xs text-[#EF4444] flex items-center mt-1 font-medium">
            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ $error ?? $errors->first($name) }}
        </p>
    @endif
</div>