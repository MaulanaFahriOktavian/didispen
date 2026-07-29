@props([
    'variant' => 'primary',
    'type' => 'button'
])

@php

$classes = match($variant){

    'primary' => 'bg-violet-600 hover:bg-violet-700 text-white',

    'secondary' => 'bg-white border border-zinc-300 hover:bg-zinc-100 text-zinc-700',

    'danger' => 'bg-red-600 hover:bg-red-700 text-white',

    default => 'bg-violet-600 hover:bg-violet-700 text-white',

};

@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center justify-center rounded-2xl px-6 py-3 font-semibold transition-all duration-300 {$classes}"
    ]) }}>

    {{ $slot }}

</button>