<x-layouts.satpam title="Dashboard Satpam">
    <div class="space-y-4 md:space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    Dashboard Satpam 🛡️
                </h1>
                <p class="mt-1 text-xs md:text-sm text-gray-500">
                    Monitoring keluar-masuk siswa melalui verifikasi QR Code.
                </p>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Siswa Keluar Hari Ini</p>
                        <p class="text-2xl md:text-3xl font-bold text-blue-600 mt-1 md:mt-2">{{ $stats['out_today'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Telah diverifikasi</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-blue-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Siswa Kembali</p>
                        <p class="text-2xl md:text-3xl font-bold text-green-600 mt-1 md:mt-2">{{ $stats['returned_today'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Sudah kembali</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-green-400 to-green-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Masih di Luar</p>
                        <p class="text-2xl md:text-3xl font-bold text-amber-600 mt-1 md:mt-2">{{ $stats['currently_out'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Belum kembali</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-400 to-amber-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- QR Scanner Section --}}
        <div class="bg-white rounded-xl border border-gray-200/60 shadow-sm overflow-hidden">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex items-center gap-2">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-[#3b82f6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                </svg>
                <h3 class="text-sm md:text-base font-bold text-gray-900">QR Scanner</h3>
            </div>
            
            <div class="p-6 md:p-12 text-center">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-2xl md:rounded-3xl bg-gradient-to-br from-[#3b82f6] to-[#2563eb] flex items-center justify-center mx-auto mb-4 md:mb-6 shadow-xl shadow-blue-500/30">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Scan QR Code Dispensasi</h3>
                <p class="text-xs md:text-sm text-gray-500 mb-4 md:mb-6">Arahkan kamera ke QR Code pada surat dispensasi siswa untuk memverifikasi.</p>
                <button class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#3b82f6] hover:bg-[#2563eb] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3b82f6] transition-all min-h-[44px]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Mulai Scan
                </button>
            </div>
        </div>
    </div>
</x-layouts.satpam>