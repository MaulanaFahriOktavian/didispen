<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>

    @include('partials.head')

</head>

<body class="bg-[#F5F7FB] text-zinc-800">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('partials.student.sidebar')

    {{-- Content --}}
    <div class="flex-1 ml-64">

        {{-- Header --}}
        @include('partials.student.header')

        {{-- Page --}}
        <main class="px-8 py-6">

            @yield('content')

        </main>

    </div>

</div>

@fluxScripts

</body>
</html>