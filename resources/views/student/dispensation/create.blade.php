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

    <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">

    <div class="flex flex-col gap-6 md:flex-row md:items-center">

        <div class="flex h-20 w-20 items-center justify-center rounded-full bg-violet-600 text-3xl font-bold text-white">

            {{ strtoupper(substr($student->full_name,0,1)) }}

        </div>

        <div class="grid flex-1 grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <p class="text-sm text-zinc-500">

                    Nama Siswa

                </p>

                <p class="font-semibold">

                    {{ $student->full_name }}

                </p>

            </div>

            <div>

                <p class="text-sm text-zinc-500">

                    NIS

                </p>

                <p class="font-semibold">

                    {{ $student->nis }}

                </p>

            </div>

            <div>

                <p class="text-sm text-zinc-500">

                    Kelas

                </p>

                <p class="font-semibold">

                    {{ $student->class->name ?? '-' }}

                </p>

            </div>

            <div>

                <p class="text-sm text-zinc-500">

                    Jurusan

                </p>

                <p class="font-semibold">

                    {{ $student->major->name ?? '-' }}

                </p>

            </div>

        </div>

    </div>

</div>

    <x-ui.card>

            <div class="mb-8">

        <h2 class="text-xl font-semibold">

            Formulir Dispensasi

        </h2>

        <p class="mt-1 text-sm text-zinc-500">

            Lengkapi seluruh data dengan benar sebelum mengirim pengajuan.

        </p>

    </div>

        <form
            action="{{ route('student.dispensation.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Kategori --}}
                <x-forms.field>

                    <x-ui.label required>
                        Kategori Dispensasi
                    </x-ui.label>

                    <x-ui.select name="category_id">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected(old('category_id') == $item->id)>

                                {{ $item->name }}

                            </option>

                        @endforeach

                    </x-ui.select>

                    <x-ui.error name="category_id"/>

                </x-forms.field>

                {{-- Tujuan --}}
                <x-forms.field>

                    <x-ui.label required>
                        Tujuan
                    </x-ui.label>

                    <x-ui.select name="destination_id">

                        <option value="">
                            -- Pilih Tujuan --
                        </option>

                        @foreach($destinations as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected(old('destination_id') == $item->id)>

                                {{ $item->name }}

                            </option>

                        @endforeach

                    </x-ui.select>

                    <x-ui.error name="destination_id"/>

                </x-forms.field>

            </div>

            {{-- Tanggal --}}
            <x-forms.field>

                <x-ui.label required>
                    Tanggal Dispensasi
                </x-ui.label>

                <x-ui.input
                    type="date"
                    name="dispensation_date"/>

                <x-ui.error
                    name="dispensation_date"/>

            </x-forms.field>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Jam Keluar --}}
                <x-forms.field>

                    <x-ui.label required>
                        Jam Keluar
                    </x-ui.label>

                    <x-ui.input
                        type="time"
                        name="leave_time"/>

                    <x-ui.error
                        name="leave_time"/>

                </x-forms.field>

                {{-- Jam Kembali --}}
                <x-forms.field>

                    <x-ui.label required>
                        Jam Kembali
                    </x-ui.label>

                    <x-ui.input
                        type="time"
                        name="return_time"/>

                    <x-ui.error
                        name="return_time"/>

                </x-forms.field>

            </div>

            {{-- Keperluan --}}
            <x-forms.field>

                <x-ui.label required>
                    Keperluan
                </x-ui.label>

                <x-ui.textarea
                    name="reason"
                    rows="5"/>

                <x-ui.error
                    name="reason"/>

            </x-forms.field>

            <div class="flex justify-end gap-3 border-t border-zinc-200 pt-6">

                <x-ui.button
                    type="reset"
                    variant="secondary">

                    Reset

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Kirim Pengajuan

                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</div>

@endsection