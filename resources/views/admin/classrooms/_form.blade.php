<div class="space-y-6">
    {{-- Section: Informasi Dasar --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Informasi Dasar
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            {{-- Jurusan --}}
            <div class="md:col-span-2">
                <label for="major_id" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Jurusan <span class="text-red-500">*</span>
                </label>
                <select name="major_id" id="major_id" 
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('major_id') border-red-300 bg-red-50 @enderror">
                    <option value="">Pilih Jurusan</option>
                    @foreach($majors as $major)
                        <option value="{{ $major->id }}" {{ old('major_id', $classroom->major_id ?? '') == $major->id ? 'selected' : '' }}>
                            {{ $major->code }} - {{ $major->name }}
                        </option>
                    @endforeach
                </select>
                @error('major_id') 
                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Tingkat --}}
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Tingkat <span class="text-red-500">*</span>
                </label>
                <select name="grade" id="grade" 
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('grade') border-red-300 bg-red-50 @enderror">
                    <option value="">Pilih Tingkat</option>
                    <option value="X" {{ old('grade', $classroom->grade ?? '') == 'X' ? 'selected' : '' }}>Kelas X (Sepuluh)</option>
                    <option value="XI" {{ old('grade', $classroom->grade ?? '') == 'XI' ? 'selected' : '' }}>Kelas XI (Sebelas)</option>
                    <option value="XII" {{ old('grade', $classroom->grade ?? '') == 'XII' ? 'selected' : '' }}>Kelas XII (Dua Belas)</option>
                </select>
                @error('grade') 
                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Kapasitas --}}
            <div>
                <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Kapasitas (Siswa) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="number" name="capacity" id="capacity" min="1" max="100"
                           value="{{ old('capacity', $classroom->capacity ?? 36) }}" 
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('capacity') border-red-300 bg-red-50 @enderror">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-400 text-sm">siswa</span>
                    </div>
                </div>
                @error('capacity') 
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

    {{-- Section: Detail Kelas --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Detail Kelas
        </h3>
        <div class="space-y-5">
            {{-- Nama Kelas --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Nama Kelas <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" 
                       placeholder="Contoh: PPLG 1, AKL 2"
                       value="{{ old('name', $classroom->name ?? '') }}" 
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('name') border-red-300 bg-red-50 @enderror">
                <p class="mt-1.5 text-xs text-gray-500">Nama singkat kelas (tanpa tingkat)</p>
                @error('name') 
                    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Nama Lengkap (Auto-generate) --}}
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1.5">
                    Nama Lengkap Kelas <span class="text-red-500">*</span>
                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                        Otomatis
                    </span>
                </label>
                <div class="relative">
                    <input type="text" name="full_name" id="full_name" 
                           value="{{ old('full_name', $classroom->full_name ?? '') }}" 
                           readonly
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm bg-gray-50 text-gray-700 cursor-not-allowed">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-1.5 text-xs text-gray-500">Format: [Tingkat] [Nama Kelas] (Contoh: X PPLG 1)</p>
                @error('full_name') 
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

    {{-- Section: Status --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#5B3DF5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Status Kelas
        </h3>
        <div>
            <label for="is_active" class="block text-sm font-medium text-gray-700 mb-1.5">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="is_active" id="is_active" 
                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#5B3DF5] focus:border-[#5B3DF5] transition-all @error('is_active') border-red-300 bg-red-50 @enderror">
                <option value="1" {{ old('is_active', $classroom->is_active ?? true) == '1' ? 'selected' : '' }}>
                    ✅ Aktif - Kelas dapat digunakan untuk pendaftaran siswa
                </option>
                <option value="0" {{ old('is_active', $classroom->is_active ?? '') == '0' ? 'selected' : '' }}>
                    ⏸️ Tidak Aktif - Kelas tidak dapat digunakan
                </option>
            </select>
            @error('is_active') 
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
        <a href="{{ route('admin.classrooms.index') }}" 
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
            {{ isset($classroom) ? 'Perbarui Kelas' : 'Simpan Kelas' }}
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate full_name
    const gradeSelect = document.getElementById('grade');
    const nameInput = document.getElementById('name');
    const fullNameInput = document.getElementById('full_name');

    function updateFullName() {
        const grade = gradeSelect.value;
        const name = nameInput.value.trim();
        
        if (grade && name) {
            fullNameInput.value = `${grade} ${name}`;
            fullNameInput.classList.add('bg-blue-50', 'border-blue-300');
        } else {
            fullNameInput.value = '';
            fullNameInput.classList.remove('bg-blue-50', 'border-blue-300');
        }
    }

    gradeSelect.addEventListener('change', updateFullName);
    nameInput.addEventListener('input', updateFullName);
    
    // Initialize on load
    updateFullName();

    // Add smooth focus effects
    document.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('focus', function() {
            this.parentElement.classList.add('transform', 'scale-[1.01]');
        });
        field.addEventListener('blur', function() {
            this.parentElement.classList.remove('transform', 'scale-[1.01]');
        });
    });
</script>
@endpush