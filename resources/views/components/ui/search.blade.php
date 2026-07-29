<div class="relative">

    <input
        type="text"
        placeholder="Cari..."
        {{ $attributes->merge([
            'class'=>'w-full rounded-xl border border-zinc-300 pl-11 pr-4 py-3'
        ]) }}
    >

    <svg
        class="absolute left-4 top-3.5 w-5 h-5 text-zinc-400"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">

        <path d="M21 21l-4.3-4.3"/>

        <circle cx="11" cy="11" r="7"/>

    </svg>

</div>