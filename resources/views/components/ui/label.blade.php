@props([
    'required' => false
])

<label

{{ $attributes->merge([

'class'=>'block text-sm font-semibold text-zinc-700'

]) }}

>

{{ $slot }}

@if($required)

<span class="text-red-500">*</span>

@endif

</label>