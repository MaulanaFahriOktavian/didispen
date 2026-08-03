<x-layouts.student title="Detail Dispensasi">
    <nav class="flex items-center text-sm text-[#6B7280] mb-6">
        <a href="{{ route('student.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('student.dispensation.index') }}" class="hover:text-[#5B3DF5] transition-colors">Riwayat</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="font-semibold text-[#111827]">Detail Dispensasi</span>
    </nav>

    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-bold text-[#111827]">Detail Dispensasi</h1>
                <x-ui.badge :status="$dispensation->status ?? 'pending'" size="md">{{ ucfirst($dispensation->status ?? 'Pending') }}</x-ui.badge>
            </div>
            <p class="text-sm text-[#6B7280]">Nomor: <span class="font-mono font-semibold text-[#111827]">{{ $dispensation->dispensation_number ?? '-' }}</span></p>
        </div>

        <x-ui.card>
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">Nama Siswa</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->student?->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">NIS</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->student?->nis ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">Kategori</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->category?->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">Tujuan</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->destination?->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">Tanggal Dispensasi</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->dispensation_date ? \Carbon\Carbon::parse($dispensation->dispensation_date)->format('d M Y') : '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-1">Waktu</p>
                        <p class="text-base font-semibold text-[#111827]">{{ $dispensation->leave_time ?? '-' }} - {{ $dispensation->return_time ?? '-' }}</p>
                    </div>
                </div>

                <div class="border-t border-[#E5E7EB] pt-6">
                    <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-2">Alasan</p>
                    <p class="text-base text-[#111827] leading-relaxed">{{ $dispensation->reason ?? '-' }}</p>
                </div>

                @if($dispensation->attachment)
                    <div class="border-t border-[#E5E7EB] pt-6">
                        <p class="text-xs font-semibold text-[#6B7280] uppercase tracking-wider mb-2">Dokumen Pendukung</p>
                        <a href="{{ asset('storage/' . $dispensation->attachment) }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-semibold text-[#5B3DF5] hover:text-[#6D4CFF]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                            Lihat Dokumen
                        </a>
                    </div>
                @endif
            </div>
        </x-ui.card>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('student.dispensation.index') }}">
                <x-ui.button variant="outline">Kembali ke Riwayat</x-ui.button>
            </a>
        </div>
    </div>
</x-layouts.student>