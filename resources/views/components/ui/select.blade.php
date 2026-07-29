@props([
    'name'
])

<select

name="{{ $name }}"

{{ $attributes->merge([

'class'=>'

w-full
rounded-2xl
border
border-zinc-300

bg-white

px-4
py-3

transition

focus:ring-4
focus:ring-violet-100
focus:border-violet-500

'

]) }}

>

{{ $slot }}

</select>