@props(['status'])

@php

$class = match($status){

    'pending' => 'bg-yellow-100 text-yellow-700',

    'approved' => 'bg-green-100 text-green-700',

    'finished' => 'bg-blue-100 text-blue-700',

    'rejected' => 'bg-red-100 text-red-700',

    default => 'bg-zinc-100 text-zinc-700',

};

@endphp

<span class="rounded-full px-4 py-2 text-sm font-semibold {{ $class }}">

    {{ ucfirst($status) }}

</span>