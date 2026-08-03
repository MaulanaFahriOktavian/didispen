<x-layouts.admin title="{{ $pageTitle }}">
    <nav class="flex items-center text-sm text-[#6B7280] mb-6">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-[#5B3DF5] transition-colors">Dashboard</a>
        <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="font-semibold text-[#111827]">{{ $pageTitle }}</span>
    </nav>

    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#111827]">{{ $pageTitle }}</h1>
            <p class="text-sm text-[#6B7280] mt-1">Manage academic majors data.</p>
        </div>
        <div class="flex items-center gap-3">
            @if(($stats['trashed'] ?? 0) > 0)
                <a href="?trashed=1" class="h-10 px-4 rounded-xl border border-[#E5E7EB] bg-white text-sm font-medium text-[#6B7280] hover:bg-[#F8FAFC] hover:border-[#5B3DF5] hover:text-[#5B3DF5] transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Trash ({{ $stats['trashed'] }})
                </a>
            @endif
            <x-ui.button variant="primary" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>' @click="$dispatch('open-modal', 'create-modal')">
                Add Major
            </x-ui.button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-[20px] border border-[#E5E7EB] shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#5B3DF5]/10 text-[#5B3DF5] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div>
                <p class="text-xs text-[#6B7280] font-medium">Total</p>
                <p class="text-xl font-bold text-[#111827]">{{ $stats['total'] ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[20px] border border-[#E5E7EB] shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#22C55E]/10 text-[#22C55E] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-[#6B7280] font-medium">Active</p>
                <p class="text-xl font-bold text-[#111827]">{{ $stats['active'] ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[20px] border border-[#E5E7EB] shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#6B7280]/10 text-[#6B7280] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
            </div>
            <div>
                <p class="text-xs text-[#6B7280] font-medium">Inactive</p>
                <p class="text-xl font-bold text-[#111827]">{{ $stats['inactive'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <x-ui.alert type="success" title="Success!" :message="session('success')" class="mb-6" />
    @endif

    @if(session('error'))
        <x-ui.alert type="danger" title="Error!" :message="session('error')" class="mb-6" />
    @endif

    <x-tables.table 
        :columns="[
            ['label' => 'Code', 'key' => 'code'],
            ['label' => 'Name', 'key' => 'name'],
        ]"
        :data="$data"
        :searchable="true"
        :bulkActions="true"
        :pagination="$data"
        resource="{{ $resourceName }}"
    />

    <x-modals.form name="create-modal" title="Add Major" size="md" submitText="Save">
        <form id="create-modal-form" method="POST" action="{{ route('admin.major.store') }}" class="space-y-4">
            @csrf
            <x-forms.input label="Code" name="code" placeholder="Example: RPL" required />
            <x-forms.input label="Name" name="name" placeholder="Example: Software Engineering" required />
        </form>
    </x-modals.form>

    <x-ui.toast />
</x-layouts.admin>