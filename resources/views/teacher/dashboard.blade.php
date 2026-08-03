<x-layouts.guru title="Dashboard Guru">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#111827] tracking-tight">
            Dashboard Guru Piket 
        </h1>
        <p class="text-[#6B7280] mt-2 text-base font-medium">
            Kelola approval dispensasi siswa dari dashboard ini.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <x-cards.stat 
            title="Menunggu Approval" 
            value="{{ $stats['pending'] ?? 0 }}" 
            color="warning"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
        <x-cards.stat 
            title="Disetujui Hari Ini" 
            value="{{ $stats['approved_today'] ?? 0 }}" 
            color="success"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
        <x-cards.stat 
            title="Total Approval" 
            value="{{ $stats['total_approved'] ?? 0 }}" 
            color="primary"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>'
        />
    </div>

    <x-ui.card padding="none" class="overflow-hidden">
        <div class="px-6 py-5 border-b border-[#E5E7EB] flex items-center justify-between bg-white">
            <h3 class="text-base font-bold text-[#111827]">Dispensasi Menunggu Persetujuan</h3>
        </div>
        
        <div class="p-6">
            <x-ui.empty-state 
                icon="inbox"
                title="Tidak ada dispensasi pending" 
                description="Semua dispensasi telah diproses. Kerja bagus!"
            />
        </div>
    </x-ui.card>
</x-layouts.guru>