@php
$student = auth('student')->user();
@endphp

<aside
class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-violet-700 to-purple-900 text-white flex flex-col">

    <div class="p-8">

        <h1 class="text-4xl font-black">

            DIDISPEN

        </h1>

        <p class="text-violet-200 mt-1">

            SMKN 1 Bangsri

        </p>

    </div>

    <nav class="px-4 space-y-2">

        <a
            href="{{ route('student.dashboard') }}"
            class="flex items-center gap-3 rounded-2xl px-5 py-4 bg-white text-violet-700 font-semibold">

            <x-heroicon-o-home class="w-6 h-6"/>

            Dashboard

        </a>

        <a
            href="{{ route('student.dispensation.create') }}"
            class="flex items-center gap-3 rounded-2xl px-5 py-4 hover:bg-violet-600 transition">

            <x-heroicon-o-document-plus class="w-6 h-6"/>

            Ajukan Dispensasi

        </a>

        <a
            href="#"
            class="flex items-center gap-3 rounded-2xl px-5 py-4 hover:bg-violet-600 transition">

            <x-heroicon-o-clipboard-document-list class="w-6 h-6"/>

            Riwayat

        </a>

        <a
            href="#"
            class="flex items-center gap-3 rounded-2xl px-5 py-4 hover:bg-violet-600 transition">

            <x-heroicon-o-user-circle class="w-6 h-6"/>

            Profil

        </a>

    </nav>

    <div class="mt-auto p-5">

        <div class="rounded-3xl bg-white/10 p-5">

            <div class="font-bold">

                {{ $student->full_name }}

            </div>

            <div class="text-violet-200 text-sm">

                {{ $student->nis }}

            </div>

            <form
                action="{{ route('student.logout') }}"
                method="POST"
                class="mt-5">

                @csrf

                <button
                    class="w-full rounded-xl bg-red-500 py-3 font-semibold hover:bg-red-600">

                    Logout

                </button>

            </form>

        </div>

    </div>

</aside>