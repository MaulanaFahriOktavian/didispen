<x-layouts.student title="Dashboard Siswa">
    <div class="space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Halo, {{ auth('student')->user()->name }}! 👋
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Berikut ringkasan dispensasi Anda.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="4"/>
                    </svg>
                    {{ now()->format('l, d M Y') }}
                </span>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Total Pengajuan --}}
            <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500">Total Pengajuan</p>
                        <p class="text-3xl font-bold text-[#5B3DF5] mt-2">{{ $stats['total'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400 mt-1">Semua pengajuan</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Menunggu Persetujuan --}}
            <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500">Menunggu Persetujuan</p>
                        <p class="text-3xl font-bold text-amber-600 mt-2">{{ $stats['pending'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400 mt-1">Sedang diproses</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Disetujui --}}
            <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500">Disetujui</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['approved'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400 mt-1">Telah disetujui</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Selesai --}}
            <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500">Selesai</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $stats['finished'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400 mt-1">Telah selesai</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Button --}}
        <div class="mb-6">
            <a href="{{ route('student.dispensation.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#5B3DF5] hover:bg-[#4a31d4] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5B3DF5] transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajukan Dispensasi Baru
            </a>
        </div>

        {{-- Recent Dispensations --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Riwayat Dispensasi Saya</h3>
                    <p class="text-sm text-gray-500">5 pengajuan terakhir</p>
                </div>
                <a href="{{ route('student.dispensation.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-[#5B3DF5] hover:text-[#4a31d4] transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
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
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($recentDispensations ?? [] as $disp)
                            <tr class="hover:bg-gray-50 transition-colors group">
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-gray-900">{{ $disp->category?->name ?? '-' }}</p>
                                    <p class="text-xs text-gray-500">{{ $disp->destination?->name ?? '-' }}</p>
                                </td>
                                <td class="px-6 py-4 text-gray-600 font-medium">
                                    {{ $disp->dispensation_date ? \Carbon\Carbon::parse($disp->dispensation_date)->format('d M Y') : '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($disp->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                            Menunggu
                                        </span>
                                    @elseif($disp->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @elseif($disp->status === 'rejected')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-gray-600 font-medium">
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
                                    <p class="mt-1 text-sm text-gray-500">Ajukan dispensasi pertama Anda untuk melihat riwayat di sini.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('student.dispensation.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#5B3DF5] hover:bg-[#4a31d4]">
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