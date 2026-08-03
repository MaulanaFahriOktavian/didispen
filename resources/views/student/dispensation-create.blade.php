<x-layouts.admin title="Ajukan Dispensasi">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-text-secondary mb-2">
            <a href="{{ route('student.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
            <span>/</span>
            <span class="text-text-primary">Ajukan Dispensasi</span>
        </div>
        <h1 class="text-2xl font-bold text-text-primary">Form Pengajuan Dispensasi</h1>
        <p class="text-sm text-text-secondary mt-1">Isi formulir di bawah ini dengan data yang benar dan lengkap.</p>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <x-ui.alert type="success" title="Berhasil!" :message="session('success')" class="mb-6" />
    @endif

    <!-- Form Card -->
    <x-ui.card padding="lg" class="max-w-4xl">
        <form action="{{ route('student.dispensation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="dispensationForm()">
            @csrf

            <!-- Hidden fields for academic year -->
            <input type="hidden" name="activeYear" value="{{ $activeYear?->id }}">
            <input type="hidden" name="activeSemester" value="{{ $activeSemester?->id }}">

            <!-- Section: Informasi Dasar -->
            <div>
                <h3 class="text-lg font-bold text-text-primary mb-4 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center mr-3 text-sm">1</span>
                    Informasi Dasar
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-forms.input 
                        label="Nama Siswa" 
                        name="student_name" 
                        value="{{ auth('student')->user()->name }}" 
                        :disabled="true"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
                    />

                    <x-forms.input 
                        label="NIS" 
                        name="nis" 
                        value="{{ auth('student')->user()->nis }}" 
                        :disabled="true"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>'
                    />
                </div>
            </div>

            <div class="border-t border-border"></div>

            <!-- Section: Detail Dispensasi -->
            <div>
                <h3 class="text-lg font-bold text-text-primary mb-4 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center mr-3 text-sm">2</span>
                    Detail Dispensasi
                </h3>

                <div class="space-y-6">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-text-primary mb-2">
                            Kategori Dispensasi <span class="text-danger">*</span>
                        </label>
                        <select 
                            name="category_id" 
                            x-model="categoryId"
                            @change="updateCategoryDescription()"
                            class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-2.5 text-sm"
                            :class="{ 'border-danger': errors.category_id }"
                        >
                            <option value="">Pilih Kategori...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" data-description="{{ $category->description }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1.5 text-xs text-danger flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                        <p x-show="categoryDescription" x-text="categoryDescription" class="mt-2 text-xs text-text-secondary italic"></p>
                    </div>

                    <!-- Tujuan -->
                    <div>
                        <label class="block text-sm font-semibold text-text-primary mb-2">
                            Tujuan <span class="text-text-secondary font-normal">(Opsional)</span>
                        </label>
                        <select 
                            name="destination_id" 
                            x-model="destinationId"
                            @change="updateDestinationAddress()"
                            class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-2.5 text-sm"
                        >
                            <option value="">Pilih Tujuan...</option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}" data-address="{{ $destination->address }}">
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Alamat Tujuan (Auto-fill) -->
                    <div>
                        <x-forms.input 
                            label="Alamat Tujuan" 
                            name="destination_address" 
                            placeholder="Masukkan alamat tujuan atau pilih dari daftar di atas"
                            icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                        />
                    </div>

                    <!-- Tanggal & Waktu -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-text-primary mb-2">
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                name="dispensation_date" 
                                x-model="dispensationDate"
                                min="{{ date('Y-m-d') }}"
                                class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-2.5 text-sm"
                                :class="{ 'border-danger': errors.dispensation_date }"
                            >
                            @error('dispensation_date')
                                <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-primary mb-2">
                                Waktu Berangkat <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="time" 
                                name="leave_time" 
                                class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-2.5 text-sm"
                                :class="{ 'border-danger': errors.leave_time }"
                            >
                            @error('leave_time')
                                <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text-primary mb-2">
                                Waktu Kembali <span class="text-text-secondary font-normal">(Opsional)</span>
                            </label>
                            <input 
                                type="time" 
                                name="return_time" 
                                class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-2.5 text-sm"
                            >
                            @error('return_time')
                                <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-border"></div>

            <!-- Section: Alasan & Dokumen -->
            <div>
                <h3 class="text-lg font-bold text-text-primary mb-4 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center mr-3 text-sm">3</span>
                    Alasan & Dokumen
                </h3>

                <div class="space-y-6">
                    <!-- Alasan -->
                    <div>
                        <label class="block text-sm font-semibold text-text-primary mb-2">
                            Alasan Dispensasi <span class="text-danger">*</span>
                        </label>
                        <textarea 
                            name="reason" 
                            rows="4"
                            placeholder="Jelaskan alasan pengajuan dispensasi secara detail dan jelas (minimal 20 karakter)..."
                            class="block w-full rounded-[12px] border border-border bg-card text-text-primary shadow-sm transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary px-4 py-3 text-sm resize-none"
                            :class="{ 'border-danger': errors.reason }"
                        >{{ old('reason') }}</textarea>
                        <div class="flex justify-between mt-1.5">
                            @error('reason')
                                <p class="text-xs text-danger flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @else
                                <span></span>
                            @enderror
                            <p class="text-xs text-text-secondary"><span x-text="reasonLength">0</span>/1000 karakter</p>
                        </div>
                    </div>

                    <!-- Upload File -->
                    <div>
                        <label class="block text-sm font-semibold text-text-primary mb-2">
                            Dokumen Pendukung <span class="text-text-secondary font-normal">(Opsional)</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-border border-dashed rounded-[12px] hover:border-primary/50 transition-colors cursor-pointer" @click="$refs.fileInput.click()">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-text-secondary" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-text-secondary justify-center">
                                    <span class="text-primary font-semibold hover:text-primary-hover">Upload file</span>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-text-secondary">PNG, JPG, PDF hingga 2MB</p>
                                <input type="file" name="attachment" x-ref="fileInput" class="hidden" @change="handleFileUpload($event)" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                        </div>
                        <div x-show="fileName" class="mt-2 flex items-center p-3 bg-success/5 border border-success/20 rounded-lg">
                            <svg class="w-5 h-5 text-success mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-sm text-text-primary" x-text="fileName"></span>
                            <button type="button" @click="removeFile()" class="ml-auto text-xs text-danger hover:underline">Hapus</button>
                        </div>
                        @error('attachment')
                            <p class="mt-1.5 text-xs text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-border">
                <a href="{{ route('student.dashboard') }}" class="px-6 py-2.5 text-sm font-semibold text-text-secondary hover:text-text-primary transition-colors">
                    Batal
                </a>
                <x-ui.button variant="primary" size="lg" type="submit" :loading="false" icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'>
                    Ajukan Dispensasi
                </x-ui.button>
            </div>
        </form>
    </x-ui.card>

    <!-- Alpine.js Script -->
    <script>
        function dispensationForm() {
            return {
                categoryId: '',
                categoryDescription: '',
                destinationId: '',
                destinationAddress: '',
                dispensationDate: '',
                fileName: '',
                reasonLength: 0,
                errors: {},

                updateCategoryDescription() {
                    const select = document.querySelector('select[name="category_id"]');
                    const selectedOption = select.options[select.selectedIndex];
                    this.categoryDescription = selectedOption.dataset.description || '';
                },

                updateDestinationAddress() {
                    const select = document.querySelector('select[name="destination_id"]');
                    const selectedOption = select.options[select.selectedIndex];
                    if (selectedOption.dataset.address) {
                        document.querySelector('input[name="destination_address"]').value = selectedOption.dataset.address;
                    }
                },

                handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.fileName = file.name;
                    }
                },

                removeFile() {
                    this.$refs.fileInput.value = '';
                    this.fileName = '';
                },

                init() {
                    // Watch reason textarea for character count
                    this.$watch('reasonLength', () => {
                        const textarea = document.querySelector('textarea[name="reason"]');
                        if (textarea) {
                            this.reasonLength = textarea.value.length;
                        }
                    });
                }
            }
        }
    </script>
</x-layouts.admin>