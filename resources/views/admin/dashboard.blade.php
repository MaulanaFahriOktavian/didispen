<x-layouts.admin title="Dashboard Admin">
    <div class="space-y-4 md:space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    Selamat Datang, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="mt-1 text-xs md:text-sm text-gray-500">
                    Berikut ringkasan aktivitas dispensasi di SMKN 1 Bangsri hari ini.
                </p>
            </div>
        </div>

        {{-- Stats Cards - Responsive Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            {{-- Total Dispensasi --}}
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Total Dispensasi</p>
                        <p class="text-2xl md:text-3xl font-bold text-gray-900 mt-1 md:mt-2">{{ number_format($stats['total'] ?? 0) }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Semua waktu</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Menunggu Persetujuan --}}
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Menunggu</p>
                        <p class="text-2xl md:text-3xl font-bold text-amber-600 mt-1 md:mt-2">{{ $stats['pending'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Perlu tindakan</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-amber-400 to-amber-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Disetujui --}}
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Disetujui</p>
                        <p class="text-2xl md:text-3xl font-bold text-green-600 mt-1 md:mt-2">{{ $stats['approved'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Telah diverifikasi</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-green-400 to-green-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Ditolak --}}
            <div class="bg-white rounded-xl border border-gray-200/60 p-4 md:p-5 hover:shadow-lg transition-all duration-300 group col-span-2 lg:col-span-1">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs md:text-sm font-medium text-gray-500">Ditolak</p>
                        <p class="text-2xl md:text-3xl font-bold text-red-600 mt-1 md:mt-2">{{ $stats['rejected'] ?? 0 }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-1">Tidak disetujui</p>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg md:rounded-xl bg-gradient-to-br from-red-400 to-red-500 flex items-center justify-center group-hover:scale-110 transition-transform shadow-md">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            {{-- Recent Activities --}}
            <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200/60 shadow-sm overflow-hidden">
                <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm md:text-base font-bold text-gray-900">Aktivitas Terbaru</h3>
                        <p class="text-xs text-gray-500 mt-0.5">5 pengajuan terakhir</p>
                    </div>
                    <a href="#" class="text-xs md:text-sm font-semibold text-[#667eea] hover:text-[#5a67d8] transition-colors">
                        Lihat Semua →
                    </a>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @forelse($recentDispensations ?? [] as $disp)
                        <div class="px-4 md:px-6 py-3 md:py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <div class="flex-shrink-0 w-9 h-9 md:w-10 md:h-10 rounded-full bg-gradient-to-br from-[#667eea] to-[#764ba2] flex items-center justify-center text-white font-bold text-xs shadow-md">
                                        {{ strtoupper(substr($disp->student?->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs md:text-sm font-semibold text-gray-900 truncate">
                                            {{ $disp->student?->name ?? 'Tidak Diketahui' }}
                                        </p>
                                        <p class="text-[10px] md:text-xs text-gray-500 truncate">
                                            {{ $disp->category?->name ?? 'Tanpa Kategori' }} • {{ $disp->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
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
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktivitas</h3>
                            <p class="mt-1 text-xs text-gray-500">Data dispensasi akan muncul di sini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="space-y-4 md:space-y-6">
                {{-- Info Alert --}}
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-3 md:p-4">
                    <div class="flex gap-2 md:gap-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs md:text-sm font-semibold text-blue-800">Info Sistem</h3>
                            <p class="mt-1 text-xs text-blue-700">
                                Pastikan jadwal guru piket minggu ini sudah diatur di menu Pengaturan.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Quick Actions Card --}}
                <div class="bg-white rounded-xl border border-gray-200/60 shadow-sm p-4 md:p-5">
                    <h3 class="text-sm md:text-base font-bold text-gray-900 mb-3 md:mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 md:w-5 md:h-5 text-[#667eea]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Aksi Cepat
                    </h3>
                    
                    <div class="space-y-2 md:space-y-3">
                        <a href="{{ route('admin.majors.index') }}" class="flex items-center gap-2 md:gap-3 p-2.5 md:p-3 rounded-lg border border-gray-200 hover:border-[#667eea] hover:bg-[#667eea]/5 transition-all duration-200 group">
                            <div class="w-9 h-9 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 text-white flex items-center justify-center group-hover:scale-110 transition-transform shadow-md flex-shrink-0">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs md:text-sm font-semibold text-gray-900">Kelola Jurusan</p>
                                <p class="text-[10px] md:text-xs text-gray-500">Master data jurusan</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-[#667eea] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="{{ route('admin.classrooms.index') }}" class="flex items-center gap-2 md:gap-3 p-2.5 md:p-3 rounded-lg border border-gray-200 hover:border-[#667eea] hover:bg-[#667eea]/5 transition-all duration-200 group">
                            <div class="w-9 h-9 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center group-hover:scale-110 transition-transform shadow-md flex-shrink-0">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs md:text-sm font-semibold text-gray-900">Kelola Kelas</p>
                                <p class="text-[10px] md:text-xs text-gray-500">Master data kelas</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-[#667eea] group-hover:translate-x-1 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="#" class="flex items-center gap-2 md:gap-3 p-2.5 md:p-3 rounded-lg border border-gray-200 opacity-60 cursor-not-allowed">
                            <div class="w-9 h-9 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-amber-400 to-amber-500 text-white flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs md:text-sm font-semibold text-gray-900">Pengaturan</p>
                                <p class="text-[10px] md:text-xs text-gray-500">Segera hadir</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>