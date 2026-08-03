<x-layouts.student title="Riwayat Dispensasi">
    <nav class="flex items-center text-sm text-[#6B7280] mb-6">
        <a href="{{ route('student.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="font-semibold text-[#111827]">Riwayat Dispensasi</span>
    </nav>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#111827]">Riwayat Dispensasi</h1>
            <p class="text-sm text-[#6B7280] mt-1">Lihat semua pengajuan dispensasi Anda.</p>
        </div>
        <a href="{{ route('student.dispensation.create') }}">
            <x-ui.button variant="primary" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>'>
                Ajukan Baru
            </x-ui.button>
        </a>
    </div>

    <x-ui.card padding="none" class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#F8FAFC] text-[#6B7280] font-semibold uppercase text-[11px] tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Nomor</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5E7EB] bg-white">
                    @forelse($dispensations ?? [] as $disp)
                        <tr class="hover:bg-[#F8FAFC] transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-[#6B7280]">{{ $disp->dispensation_number ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-[#111827]">{{ $disp->category?->name ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4 text-[#6B7280]">
                                {{ $disp->dispensation_date ? \Carbon\Carbon::parse($disp->dispensation_date)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <x-ui.badge :status="$disp->status">{{ ucfirst($disp->status) }}</x-ui.badge>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('student.dispensation.show', $disp) }}" class="text-sm font-semibold text-[#5B3DF5] hover:text-[#6D4CFF]">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <x-ui.empty-state 
                                    title="Belum ada dispensasi" 
                                    description="Anda belum pernah mengajukan dispensasi."
                                />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.student>