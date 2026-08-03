<x-layouts.student title="Ajukan Dispensasi">
    <nav class="flex items-center text-sm text-[#6B7280] mb-6">
        <a href="{{ route('student.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="font-semibold text-[#111827]">Ajukan Dispensasi</span>
    </nav>

    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-[#111827]">Form Pengajuan Dispensasi</h1>
            <p class="text-sm text-[#6B7280] mt-1">Isi formulir di bawah ini dengan data yang benar dan lengkap.</p>
        </div>

        <x-ui.card padding="lg">
            <form action="{{ route('student.dispensation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div>
                    <h3 class="text-base font-bold text-[#111827] mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-[#5B3DF5]/10 text-[#5B3DF5] text-xs font-bold">1</span>
                        Informasi Dasar
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-forms.input 
                            label="Nama Siswa" 
                            name="student_name" 
                            value="{{ auth('student')->user()->name }}" 
                            :disabled="true"
                        />
                        <x-forms.input 
                            label="NIS" 
                            name="nis" 
                            value="{{ auth('student')->user()->nis }}" 
                            :disabled="true"
                        />
                    </div>
                </div>

                <div class="border-t border-[#E5E7EB]"></div>

                <div>
                    <h3 class="text-base font-bold text-[#111827] mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-[#5B3DF5]/10 text-[#5B3DF5] text-xs font-bold">2</span>
                        Detail Dispensasi
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-[#111827] mb-2">Kategori Dispensasi <span class="text-[#EF4444]">*</span></label>
                            <select name="category_id" class="block w-full h-[54px] px-4 rounded-[16px] border-2 border-[#E5E7EB] bg-white text-[#111827] focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium">
                                <option value="">Pilih Kategori...</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-[#111827] mb-2">Tanggal <span class="text-[#EF4444]">*</span></label>
                                <input type="date" name="dispensation_date" min="{{ date('Y-m-d') }}" class="block w-full h-[54px] px-4 rounded-[16px] border-2 border-[#E5E7EB] bg-white text-[#111827] focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium">
                                @error('dispensation_date')
                                    <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#111827] mb-2">Waktu Berangkat <span class="text-[#EF4444]">*</span></label>
                                <input type="time" name="leave_time" class="block w-full h-[54px] px-4 rounded-[16px] border-2 border-[#E5E7EB] bg-white text-[#111827] focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium">
                                @error('leave_time')
                                    <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#111827] mb-2">Waktu Kembali</label>
                                <input type="time" name="return_time" class="block w-full h-[54px] px-4 rounded-[16px] border-2 border-[#E5E7EB] bg-white text-[#111827] focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#E5E7EB]"></div>

                <div>
                    <h3 class="text-base font-bold text-[#111827] mb-4 flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-[#5B3DF5]/10 text-[#5B3DF5] text-xs font-bold">3</span>
                        Alasan
                    </h3>
                    <div>
                        <label class="block text-sm font-semibold text-[#111827] mb-2">Alasan Dispensasi <span class="text-[#EF4444]">*</span></label>
                        <textarea name="reason" rows="4" placeholder="Jelaskan alasan pengajuan dispensasi secara detail..." class="block w-full rounded-[16px] border-2 border-[#E5E7EB] bg-white text-[#111827] placeholder-[#6B7280]/50 focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium p-4 resize-none">{{ old('reason') }}</textarea>
                        @error('reason')
                            <p class="mt-1.5 text-xs text-[#EF4444]">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-6 border-t border-[#E5E7EB]">
                    <a href="{{ route('student.dashboard') }}" class="px-6 py-3 rounded-[16px] text-sm font-semibold text-[#6B7280] hover:bg-[#F8FAFC] hover:text-[#111827] transition-all">
                        Batal
                    </a>
                    <x-ui.button variant="primary" size="md" type="submit" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'>
                        Ajukan Dispensasi
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.student>