<x-layouts.student title="Dashboard Siswa">
    <div class="space-y-4 md:space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    Halo, {{ auth('student')->user()->name }}! 👋
                </h1>
                <p class="mt-1 text-xs md:text-sm text-gray-500">
                    Berikut ringkasan dispensasi Anda.
                </p>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Total Pengajuan</p>
                        <p class="text-2xl md:text-3xl font-bold text-[#8b5cf6] mt-1 md:mt-2">{{ $stats['total'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Semua pengajuan</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-[#8b5cf6] to-[#7c3aed] flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Menunggu</p>
                        <p class="text-2xl md:text-3xl font-bold text-amber-600 mt-1 md:mt-2">{{ $stats['pending'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Sedang diproses</p>
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
                        <p class="text-xs md:text-sm font-medium text-gray-500">Disetujui</p>
                        <p class="text-2xl md:text-3xl font-bold text-green-600 mt-1 md:mt-2">{{ $stats['approved'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Telah disetujui</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-green-400 to-green-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group col-span-2 lg:col-span-1">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Selesai</p>
                        <p class="text-2xl md:text-3xl font-bold text-blue-600 mt-1 md:mt-2">{{ $stats['finished'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Telah selesai</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-blue-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Button --}}
        <div class="mb-4 md:mb-6">
            <a href="{{ route('student.dispensation.create') }}" class="inline-flex items-center px-5 py-2.5 md:px-6 md:py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#8b5cf6] hover:bg-[#7c3aed] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8b5cf6] transition-all min-h-[44px]">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajukan Dispensasi Baru
            </a>
        </div>

        {{-- Recent Dispensations --}}
        <div class="bg-white rounded-xl border border-gray-200/60 shadow-sm overflow-hidden">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div>
                    <h3 class="text-sm md:text-base font-bold text-gray-900">Riwayat Dispensasi Saya</h3>
                    <p class="text-xs text-gray-500 mt-0.5">5 pengajuan terakhir</p>
                </div>
                <a href="{{ route('student.dispensation.index') }}" class="text-xs md:text-sm font-semibold text-[#8b5cf6] hover:text-[#7c3aed] transition-colors">
                    Lihat Semua →
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50 text-gray-600 font-semibold text-[10px] md:text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-4 md:px-6 py-3 md:py-4">Kategori</th>
                            <th class="px-4 md:px-6 py-3 md:py-4">Tanggal</th>
                            <th class="px-4 md:px-6 py-3 md:py-4">Status</th>
                            <th class="px-4 md:px-6 py-3 md:py-4 text-right">Diajukan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($recentDispensations ?? [] as $disp)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 md:px-6 py-3 md:py-4">
                                    <p class="text-xs md:text-sm font-semibold text-gray-900">{{ $disp->category?->name ?? '-' }}</p>
                                    <p class="text-[10px] md:text-xs text-gray-500">{{ $disp->destination?->name ?? '-' }}</p>
                                </td>
                                <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-medium text-xs md:text-sm">
                                    {{ $disp->dispensation_date ? \Carbon\Carbon::parse($disp->dispensation_date)->format('d M Y') : '-' }}
                                </td>
                                <td class="px-4 md:px-6 py-3 md:py-4">
                                    @if($disp->status === 'pending')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-amber-100 text-amber-800">
                                            Menunggu
                                        </span>
                                    @elseif($disp->status === 'approved')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @elseif($disp->status === 'rejected')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] md:text-xs font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 md:px-6 py-3 md:py-4 text-right text-gray-600 font-medium text-xs md:text-sm">
                                    {{ $disp->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pengajuan dispensasi</h3>
                                    <p class="mt-1 text-xs text-gray-500">Ajukan dispensasi pertama Anda untuk melihat riwayat di sini.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('student.dispensation.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#8b5cf6] hover:bg-[#7c3aed] min-h-[40px]">
                                            Ajukan Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.student>