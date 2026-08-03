@props([
    'label' => null,
    'name' => '',
    'id' => null,
    'placeholder' => 'Select...',
    'options' => [],
    'value' => null,
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

    <select 
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => "block w-full h-[54px] px-4 rounded-[16px] border-2 bg-white text-[#111827] focus:outline-none focus:ring-4 disabled:bg-[#F8FAFC] disabled:cursor-not-allowed transition-all text-sm font-medium " . ($hasError ? 'border-[#EF4444] focus:border-[#EF4444] focus:ring-[#EF4444]/10' : 'border-[#E5E7EB] focus:border-[#5B3DF5] focus:ring-[#5B3DF5]/10')]) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @if($hasError)
        <p class="text-xs text-[#EF4444] flex items-center mt-1 font-medium">
            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ $error ?? $errors->first($name) }}
        </p>
    @endif
</div>