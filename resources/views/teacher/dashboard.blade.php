<x-layouts.guru title="Dashboard Guru">
    <div class="space-y-4 md:space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    Dashboard Guru Piket ‍🏫
                </h1>
                <p class="mt-1 text-xs md:text-sm text-gray-500">
                    Kelola approval dispensasi siswa dari dashboard ini.
                </p>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Menunggu Approval</p>
                        <p class="text-2xl md:text-3xl font-bold text-amber-600 mt-1 md:mt-2">{{ $stats['pending'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Perlu ditinjau</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-400 to-amber-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Disetujui Hari Ini</p>
                        <p class="text-2xl md:text-3xl font-bold text-green-600 mt-1 md:mt-2">{{ $stats['approved_today'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Telah diverifikasi</p>
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
                        <p class="text-xs md:text-sm font-medium text-gray-500">Total Approval</p>
                        <p class="text-2xl md:text-3xl font-bold text-[#10b981] mt-1 md:mt-2">{{ $stats['total_approved'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Semua waktu</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-[#10b981] to-[#059669] flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Dispensations --}}
        <div class="bg-white rounded-xl border border-gray-200/60 shadow-sm overflow-hidden">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-sm md:text-base font-bold text-gray-900">Menunggu Persetujuan</h3>
                </div>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-amber-100 text-amber-800">
                    {{ $stats['pending'] ?? 0 }} pengajuan
                </span>
            </div>
            
            <div class="divide-y divide-gray-200">
                @forelse($pendingDispensations ?? [] as $disp)
                    <div class="px-4 md:px-6 py-3 md:py-4 hover:bg-gray-50 transition-colors">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="flex items-center gap-3 flex-1 min-w-0">
                                <div class="flex-shrink-0 w-9 h-9 md:w-10 md:h-10 rounded-full bg-gradient-to-br from-[#10b981] to-[#059669] flex items-center justify-center text-white font-bold text-xs shadow-md">
                                    {{ strtoupper(substr($disp->student?->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs md:text-sm font-semibold text-gray-900 truncate">
                                        {{ $disp->student?->name ?? 'Tidak Diketahui' }}
                                    </p>
                                    <p class="text-[10px] md:text-xs text-gray-500 truncate">
                                        {{ $disp->student?->classroom?->full_name ?? '-' }} • {{ $disp->category?->name ?? 'Tanpa Kategori' }}
                                    </p>
                                    <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">
                                        {{ $disp->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 sm:ml-4">
                                <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors min-h-[36px]">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Setujui
                                </button>
                                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors min-h-[36px]">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Tolak
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pengajuan menunggu</h3>
                        <p class="mt-1 text-xs text-gray-500">Semua pengajuan dispensasi sudah ditinjau.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.guru>