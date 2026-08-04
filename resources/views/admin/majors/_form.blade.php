<div class="space-y-6">
    {{-- Section: Informasi Dasar --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Informasi Dasar Jurusan
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            {{-- Kode Jurusan --}}
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Kode Jurusan <span class="text-red-500">*</span>
                </label>
                <input type="text" name="code" id="code" 
                       placeholder="Contoh: PPLG, AKL, MPLB"
                       value="{{ old('code', $major->code ?? '') }}" 
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all uppercase @error('code') border-red-300 bg-red-50 @enderror">
                <p class="mt-1.5 text-xs text-gray-500">Kode singkat jurusan (3-4 huruf)</p>
                @error('code') 
                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Nama Jurusan --}}
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Nama Jurusan <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" 
                       placeholder="Contoh: Pengembangan Perangkat Lunak dan Gim"
                       value="{{ old('name', $major->name ?? '') }}" 
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('name') border-red-300 bg-red-50 @enderror">
                @error('name') 
                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200"></div>

    {{-- Section: Deskripsi --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Deskripsi Jurusan
        </h3>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">
                Deskripsi
            </label>
            <textarea name="description" id="description" rows="4" 
                      placeholder="Jelaskan tentang jurusan ini, kompetensi keahlian, dan prospek karir..."
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('description') border-red-300 bg-red-50 @enderror">{{ old('description', $major->description ?? '') }}</textarea>
            <p class="mt-1.5 text-xs text-gray-500">Deskripsi singkat tentang jurusan dan kompetensi keahliannya</p>
            @error('description') 
                <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200"></div>

    {{-- Section: Status --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Status Jurusan
        </h3>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="status" id="status" 
                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('status') border-red-300 bg-red-50 @enderror">
                <option value="active" {{ old('status', $major->status ?? 'active') == 'active' ? 'selected' : '' }}>
                    ✅ Aktif - Jurusan dapat digunakan untuk pendaftaran siswa baru
                </option>
                <option value="inactive" {{ old('status', $major->status ?? '') == 'inactive' ? 'selected' : '' }}>
                    ⏸️ Tidak Aktif - Jurusan tidak dapat digunakan (tutup sementara)
                </option>
            </select>
            @error('status') 
                <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
        <a href="{{ route('admin.majors.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Batal
        </a>
        <button type="submit" 
                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#5B3DF5] text-white text-sm font-medium rounded-lg hover:bg-[#4a31d4] transition-all shadow-sm hover:shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ isset($major) ? 'Perbarui Jurusan' : 'Simpan Jurusan' }}
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Auto-uppercase code field
    const codeInput = document.getElementById('code');
    codeInput.addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });

    // Add smooth focus effects
    document.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('focus', function() {
            this.parentElement.classList.add('transform', 'scale-[1.01]');
        });
        field.addEventListener('blur', function() {
            this.parentElement.classList.remove('transform', 'scale-[1.01]');
        });
    });
</script>
@endpush