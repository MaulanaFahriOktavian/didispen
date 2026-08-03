<x-layouts.admin title="Dashboard">
    <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-[#111827] tracking-tight">
                Selamat Datang Kembali, {{ auth()->user()->username }}! 👋
            </h1>
            <p class="text-[#6B7280] mt-2 text-base font-medium">
                Berikut adalah ringkasan aktivitas dispensasi di SMKN 1 Bangsri hari ini.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <x-ui.button variant="outline" size="md" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>'>
                Export Laporan
            </x-ui.button>
            <x-ui.button variant="primary" size="md" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>'>
                Dispensasi Baru
            </x-ui.button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-cards.stat 
            title="Total Dispensasi" 
            value="{{ number_format($stats['total'] ?? 0) }}" 
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
            title="Ditolak" 
            value="{{ $stats['rejected'] ?? 0 }}" 
            color="danger"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <x-ui.card padding="none" class="overflow-hidden h-full">
                <div class="px-6 py-5 border-b border-[#E5E7EB] flex items-center justify-between bg-white">
                    <h3 class="text-base font-bold text-[#111827]">Aktivitas Dispensasi Terbaru</h3>
                    <a href="#" class="text-sm font-semibold text-[#5B3DF5] hover:text-[#6D4CFF] transition-colors flex items-center gap-1 group">
                        Lihat Semua 
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-[#F8FAFC] text-[#6B7280] font-semibold uppercase text-[11px] tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Pemohon</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E5E7EB] bg-white">
                            @forelse($recentDispensations ?? [] as $disp)
                                <tr class="hover:bg-[#F8FAFC] transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-[#5B3DF5]/10 flex items-center justify-center text-[#5B3DF5] font-bold text-xs">
                                                {{ strtoupper(substr($disp->student?->name ?? $disp->teacher?->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-[#111827]">{{ $disp->student?->name ?? $disp->teacher?->name ?? 'Tidak Diketahui' }}</p>
                                                <p class="text-xs text-[#6B7280]">{{ $disp->request_type === 'student' ? 'Siswa' : 'Guru' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-[#6B7280] font-medium">
                                        {{ $disp->category?->name ?? '-' }}
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
                                            title="Belum ada data dispensasi" 
                                            description="Data pengajuan dispensasi akan muncul di sini setelah ada siswa atau guru yang mengajukan."
                                        />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-ui.card>
        </div>

        <div class="space-y-6">
            <x-ui.alert type="info" title="Info Sistem" message="Pastikan jadwal guru piket minggu ini sudah diatur di menu Pengaturan." :dismissible="false" />
            
            <x-ui.card class="space-y-4">
                <h3 class="text-base font-bold text-[#111827] mb-2">Aksi Cepat</h3>
                
                <a href="{{ route('admin.major.index') }}" class="flex items-center gap-3 p-3 rounded-[16px] border border-[#E5E7EB] hover:border-[#5B3DF5] hover:bg-[#5B3DF5]/5 transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-[12px] bg-[#5B3DF5]/10 text-[#5B3DF5] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#111827]">Kelola Major</p>
                        <p class="text-xs text-[#6B7280]">Master data jurusan</p>
                    </div>
                </a>

                <a href="#" class="flex items-center gap-3 p-3 rounded-[16px] border border-[#E5E7EB] hover:border-[#5B3DF5] hover:bg-[#5B3DF5]/5 transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-[12px] bg-[#22C55E]/10 text-[#22C55E] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#111827]">Kelola Data Siswa</p>
                        <p class="text-xs text-[#6B7280]">Impor atau perbarui data</p>
                    </div>
                </a>

                <a href="#" class="flex items-center gap-3 p-3 rounded-[16px] border border-[#E5E7EB] hover:border-[#5B3DF5] hover:bg-[#5B3DF5]/5 transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-[12px] bg-[#F59E0B]/10 text-[#F59E0B] flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#111827]">Pengaturan</p>
                        <p class="text-xs text-[#6B7280]">Konfigurasi sistem aplikasi</p>
                    </div>
                </a>
            </x-ui.card>
        </div>
    </div>
</x-layouts.admin>