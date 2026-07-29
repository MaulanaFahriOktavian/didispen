@extends('layouts.student')

@section('content')

<div class="space-y-8">

    <div>

        <h1 class="text-3xl font-bold">

            Ajukan Dispensasi

        </h1>

        <p class="mt-2 text-zinc-500">

            Isi formulir berikut untuk mengajukan dispensasi sekolah.

        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('student.dispensation.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-forms.group>

                    <x-ui.label>
                        Kategori Dispensasi
                    </x-ui.label>

                    <select
                        name="category_id"
                        class="w-full rounded-2xl border border-zinc-300 px-4 py-3 focus:ring-4 focus:ring-violet-100 focus:border-violet-500">

                        @foreach($categories as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>

                </x-forms.group>

                <x-forms.group>

                    <x-ui.label>
                        Tujuan
                    </x-ui.label>

                    <select
                        name="destination_id"
                        class="w-full rounded-2xl border border-zinc-300 px-4 py-3 focus:ring-4 focus:ring-violet-100 focus:border-violet-500">

                        @foreach($destinations as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>

                </x-forms.group>

            </div>

            <x-forms.group>

                <x-ui.label>
                    Tanggal Dispensasi
                </x-ui.label>

                <x-ui.input
                    type="date"
                    name="dispensation_date" />

            </x-forms.group>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-forms.group>

                    <x-ui.label>
                        Jam Keluar
                    </x-ui.label>

                    <x-ui.input
                        type="time"
                        name="leave_time" />

                </x-forms.group>

                <x-forms.group>

                    <x-ui.label>
                        Jam Kembali
                    </x-ui.label>

                    <x-ui.input
                        type="time"
                        name="return_time" />

                </x-forms.group>

            </div>

            <x-forms.group>

                <x-ui.label>
                    Keperluan
                </x-ui.label>

                <textarea
                    name="reason"
                    rows="5"
                    class="w-full rounded-2xl border border-zinc-300 px-4 py-3 focus:ring-4 focus:ring-violet-100 focus:border-violet-500"></textarea>

            </x-forms.group>

            <div class="flex justify-end">

                <x-ui.button
                    type="submit">

                    Kirim Pengajuan

                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</div>

@endsection