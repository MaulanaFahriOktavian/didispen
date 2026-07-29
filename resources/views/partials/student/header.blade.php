@php
$student = auth('student')->user();
@endphp

<header
class="flex h-16 items-center justify-between border-b border-zinc-200 bg-white px-8">

    <div>

        <h2 class="text-3xl font-bold">

            Dashboard

        </h2>

    </div>

    <div class="flex items-center gap-6">

        <input
            type="text"
            placeholder="Cari..."
            class="w-72 rounded-xl border border-zinc-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-violet-500">

        <button>

            <x-heroicon-o-bell class="w-6 h-6 text-zinc-600"/>

        </button>

        <div class="flex items-center gap-3">

            <div
                class="flex h-12 w-12 items-center justify-center rounded-full bg-violet-600 font-bold text-white">

                {{ strtoupper(substr($student->full_name,0,1)) }}

            </div>

            <div>

                <div class="font-semibold">

                    {{ $student->full_name }}

                </div>

                <div class="text-sm text-zinc-500">

                    Siswa

                </div>

            </div>

        </div>

    </div>

</header>