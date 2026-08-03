<x-layouts.student title="Dashboard Siswa">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#111827] tracking-tight">
            Halo, {{ auth('student')->user()->name }}! 👋
        </h1>
        <p class="text-[#6B7280] mt-2 text-base font-medium">
            Berikut ringkasan dispensasi Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-cards.stat 
            title="Total Pengajuan" 
            value="{{ $stats['total'] ?? 0 }}" 
            color="primary"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>'
        />
        <x-cards.stat 
            title="Menunggu Persetujuan" 
            value="{{ $stats['pending'] ?? 0 }}" 
            color="warning"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
        <x-cards.stat 
            title="Disetujui" 
            value="{{ $stats['approved'] ?? 0 }}" 
            color="success"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
        <x-cards.stat 
            title="Selesai" 
            value="{{ $stats['finished'] ?? 0 }}" 
            color="info"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
        />
    </div>

    <div class="mb-6">
        <a href="{{ route('student.dispensation.create') }}">
            <x-ui.button variant="primary" size="lg" icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>'>
                Ajukan Dispensasi Baru
            </x-ui.button>
        </a>
    </div>

    <x-ui.card padding="none" class="overflow-hidden">
        <div class="px-6 py-5 border-b border-[#E5E7EB] flex items-center justify-between bg-white">
            <h3 class="text-base font-bold text-[#111827]">Riwayat Dispensasi Saya</h3>
            <a href="{{ route('student.dispensation.index') }}" class="text-sm font-semibold text-[#5B3DF5] hover:text-[#6D4CFF] transition-colors flex items-center gap-1 group">
                Lihat Semua 
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#F8FAFC] text-[#6B7280] font-semibold uppercase text-[11px] tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Diajukan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5E7EB] bg-white">
                    @forelse($recentDispensations ?? [] as $disp)
                        <tr class="hover:bg-[#F8FAFC] transition-colors group">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-[#111827]">{{ $disp->category?->name ?? '-' }}</p>
                                <p class="text-xs text-[#6B7280]">{{ $disp->destination?->name ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4 text-[#6B7280] font-medium">
                                {{ $disp->dispensation_date ? \Carbon\Carbon::parse($disp->dispensation_date)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <x-ui.badge :status="$disp->status">{{ ucfirst($disp->status) }}</x-ui.badge>
                            </td>
                            <td class="px-6 py-4 text-right text-[#6B7280] font-medium">
                                {{ $disp->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <x-ui.empty-state 
                                    title="Belum ada pengajuan dispensasi" 
                                    description="Ajukan dispensasi pertama Anda untuk melihat riwayat di sini."
                                    :action="app('router')->has('student.dispensation.create') ? (new \Illuminate\Support\HtmlString('<a href=\''.route('student.dispensation.create').'\'><x-ui.button variant=\'primary\' size=\'sm\'>Ajukan Sekarang</x-ui.button></a>')) : null"
                                />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.student>