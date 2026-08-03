<x-layouts.admin title="Kategori Dispensasi">
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-[#6B7280] mb-6">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="font-semibold text-[#111827]">Kategori Dispensasi</span>
    </nav>

    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#111827]">Kategori Dispensasi</h1>
            <p class="text-sm text-[#6B7280] mt-1">Kelola jenis-jenis dispensasi yang tersedia dalam sistem.</p>
        </div>
        <x-ui.button variant="primary" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>' @click="$dispatch('open-modal', 'create-category')">
            Tambah Kategori
        </x-ui.button>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <x-ui.alert type="success" title="Berhasil!" :message="session('success')" class="mb-6" />
    @endif

    <!-- Table -->
    <x-tables.table 
        :columns="[
            ['label' => 'Nama Kategori', 'key' => 'name'],
            ['label' => 'Deskripsi', 'key' => 'description'],
            ['label' => 'Status', 'key' => 'is_active', 'render' => fn($row) => $row->is_active ? '<span class=\"inline-flex items-center px-2.5 py-1 rounded-full bg-[#22C55E]/10 text-[#22C55E] text-xs font-semibold border border-[#22C55E]/20\">Aktif</span>' : '<span class=\"inline-flex items-center px-2.5 py-1 rounded-full bg-[#6B7280]/10 text-[#6B7280] text-xs font-semibold border border-[#6B7280]/20\">Tidak Aktif</span>']
        ]"
        :data="$categories"
        :searchable="true"
        :bulkActions="true"
    />

    <!-- Modal Tambah Kategori -->
    <x-modals.form name="create-category" title="Tambah Kategori Baru" size="md" submitText="Simpan">
        <form id="create-category-form" method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
            @csrf
            <x-forms.input label="Nama Kategori" name="name" placeholder="Masukkan nama kategori" required />
            <div>
                <label class="block text-sm font-semibold text-[#111827] mb-2">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsi singkat (opsional)" class="block w-full rounded-xl border-2 border-[#E5E7EB] bg-white text-[#111827] placeholder-[#6B7280]/50 focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium px-4 py-3 resize-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-[#111827] mb-2">Status</label>
                <select name="is_active" class="block w-full h-[50px] px-4 rounded-xl border-2 border-[#E5E7EB] bg-white text-[#111827] focus:outline-none focus:ring-4 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all text-sm font-medium">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </form>
    </x-modals.form>

    <!-- Toast Component -->
    <x-ui.toast />
</x-layouts.admin>