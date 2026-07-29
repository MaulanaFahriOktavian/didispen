@extends('layouts.student')

@section('content')

<div class="space-y-8">

    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold">

                Riwayat Dispensasi

            </h1>

            <p class="mt-2 text-zinc-500">

                Semua pengajuan dispensasi Anda.

            </p>

        </div>

        <a
            href="{{ route('student.dispensation.create') }}"
            class="rounded-xl bg-violet-600 px-5 py-3 text-white hover:bg-violet-700">

            Ajukan Baru

        </a>

    </div>

    <div class="rounded-3xl border bg-white shadow-sm">

        <div class="border-b p-5">

            <x-ui.search />

        </div>

        <table class="w-full">

            <thead class="bg-zinc-50">

                <tr>

                    <th class="p-4 text-left">Kode</th>
                    <th class="p-4 text-left">Kategori</th>
                    <th class="p-4 text-left">Tujuan</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($dispensations as $item)

                <tr class="border-t hover:bg-zinc-50">

                    <td class="p-4">

                        {{ $item->code }}

                    </td>

                    <td class="p-4">

                        {{ $item->category->name }}

                    </td>

                    <td class="p-4">

                        {{ $item->destination->name }}

                    </td>

                    <td class="p-4">

                        {{ $item->dispensation_date }}

                    </td>

                    <td class="p-4">

                        <x-badges.status
                            :status="$item->status"/>

                    </td>

                    <td class="p-4 text-center">

                        <button
                            class="rounded-lg border px-3 py-2 hover:bg-zinc-100">

                            Detail

                        </button>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="p-10 text-center text-zinc-500">

                        Belum ada data dispensasi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="border-t p-5">

            {{ $dispensations->links() }}

        </div>

    </div>

</div>

@endsection