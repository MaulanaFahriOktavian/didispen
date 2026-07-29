@extends('layouts.student')

@section('content')

<div class="space-y-8">

    {{-- Welcome --}}
    <section
        class="rounded-3xl bg-gradient-to-r from-violet-700 to-purple-600 p-8 text-white shadow-lg">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-violet-200">

                    Selamat Datang 👋

                </p>

                <h1 class="mt-2 text-4xl font-bold">

                    {{ $student->full_name }}

                </h1>

                <p class="mt-3 text-violet-100">

                    Kelola dispensasi sekolah dengan cepat, aman dan terdokumentasi.

                </p>

            </div>

            <a
                href="{{ route('student.dispensation.create') }}"
                class="rounded-2xl bg-white px-6 py-3 font-semibold text-violet-700 shadow hover:scale-105 duration-300">

                Ajukan Dispensasi

            </a>

        </div>

    </section>

    {{-- Statistik --}}
    <section
        class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

        <x-cards.stat-card
            title="Total Dispensasi"
            :value="$total"
            color="violet">

            <x-slot:icon>

                <x-heroicon-o-document-text class="h-7 w-7"/>

            </x-slot:icon>

        </x-cards.stat-card>

        <x-cards.stat-card
            title="Pending"
            :value="$pending"
            color="yellow">

            <x-slot:icon>

                <x-heroicon-o-clock class="h-7 w-7"/>

            </x-slot:icon>

        </x-cards.stat-card>

        <x-cards.stat-card
            title="Approved"
            :value="$approved"
            color="green">

            <x-slot:icon>

                <x-heroicon-o-check-circle class="h-7 w-7"/>

            </x-slot:icon>

        </x-cards.stat-card>

        <x-cards.stat-card
            title="Finished"
            :value="$finished"
            color="blue">

            <x-slot:icon>

                <x-heroicon-o-archive-box class="h-7 w-7"/>

            </x-slot:icon>

        </x-cards.stat-card>

    </section>

    {{-- Quick Action --}}
    <section
        class="rounded-3xl bg-white p-6 shadow-sm border">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-xl font-bold">

                    Quick Action

                </h2>

                <p class="mt-1 text-zinc-500">

                    Ajukan dispensasi baru atau lihat riwayat dispensasi.

                </p>

            </div>

            <div class="flex gap-4">

                <a
                    href="{{ route('student.dispensation.create') }}"
                    class="rounded-xl bg-violet-600 px-5 py-3 text-white hover:bg-violet-700">

                    Ajukan

                </a>

                <button
                    class="rounded-xl border px-5 py-3 hover:bg-zinc-50">

                    Riwayat

                </button>

            </div>

        </div>

    </section>

    {{-- Riwayat --}}
    <section
        class="rounded-3xl bg-white shadow-sm border overflow-hidden">

        <div
            class="flex items-center justify-between border-b px-6 py-5">

            <h2 class="text-xl font-bold">

                Riwayat Dispensasi

            </h2>

            <button
                class="text-violet-600 hover:underline">

                Lihat Semua

            </button>

        </div>

        <table class="w-full">

            <thead class="bg-zinc-50">

                <tr>

                    <th class="px-6 py-4 text-left">Kode</th>

                    <th class="px-6 py-4 text-left">Tujuan</th>

                    <th class="px-6 py-4 text-left">Tanggal</th>

                    <th class="px-6 py-4 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($histories as $item)

                <tr class="border-t hover:bg-violet-50 duration-200">

                    <td class="px-6 py-5 font-semibold">

                        {{ $item->code }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $item->destination->name ?? '-' }}

                    </td>

                    <td class="px-6 py-5">

                        {{ $item->dispensation_date }}

                    </td>

                    <td class="px-6 py-5">

                        <x-badges.status :status="$item->status"/>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="4"
                        class="py-12 text-center text-zinc-500">

                        Belum ada data dispensasi.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </section>

</div>

@endsection