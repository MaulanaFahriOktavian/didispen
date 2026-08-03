<x-layouts.satpam title="Dashboard Satpam">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#111827] tracking-tight">
            Dashboard Satpam ️
        </h1>
        <p class="text-[#6B7280] mt-2 text-base font-medium">
            Monitoring keluar-masuk siswa melalui verifikasi QR Code.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <x-cards.stat 
            title="Siswa Keluar Hari Ini" 
            value="{{ $stats['out_today'] ?? 0 }}" 
            color="info"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>'
        />
        <x-cards.stat 
            title="Siswa Kembali" 
            value="{{ $stats['returned_today'] ?? 0 }}" 
            color="success"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
        <x-cards.stat 
            title="Masih di Luar" 
            value="{{ $stats['currently_out'] ?? 0 }}" 
            color="warning"
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        />
    </div>

    <x-ui.card class="text-center py-12">
        <div class="w-20 h-20 rounded-full bg-[#5B3DF5]/10 flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-[#111827] mb-2">QR Scanner</h3>
        <p class="text-[#6B7280] mb-6">Scan QR Code dispensasi siswa untuk verifikasi</p>
        <x-ui.button variant="primary" size="lg" icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>'>
            Buka Scanner
        </x-ui.button>
    </x-ui.card>
</x-layouts.satpam>