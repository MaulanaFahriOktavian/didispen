<x-layouts.app title="Master Jurusan">
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Master Jurusan</h1>
                <p class="text-sm text-gray-500">Kelola data jurusan sekolah.</p>
            </div>
            <div class="flex items-center gap-3">
                @can('create', \App\Models\Major::class)
                    <flux:button href="{{ route('majors.create') }}" variant="primary" icon="plus">
                        Tambah Jurusan
                    </flux:button>
                @endcan
            </div>
        </div>

        <flux:card>
            <form method="GET" action="{{ route('majors.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <flux:input name="search" value="{{ request('search') }}" placeholder="Cari nama atau kode jurusan..." icon="magnifying-glass" />
                </div>
                <div>
                    <flux:select name="status" placeholder="Filter Status">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </flux:select>
                </div>
                <div class="flex items-end gap-2">
                    <flux:button type="submit" variant="primary" class="w-full">Filter</flux:button>
                    <flux:button href="{{ route('majors.index') }}" variant="ghost" class="w-full">Reset</flux:button>
                </div>
            </form>

            <form id="bulkActionForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="bulkMethod" value="DELETE">
                
                <div class="overflow-x-auto">
                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>
                                <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </flux:table.column>
                            <flux:table.column>Kode</flux:table.column>
                            <flux:table.column>Nama Jurusan</flux:table.column>
                            <flux:table.column>Status</flux:table.column>
                            <flux:table.column align="right">Aksi</flux:table.column>
                        </flux:table.columns>
                        <flux:table.rows>
                            @forelse($majors as $major)
                                <flux:table.row class="{{ $major->trashed() ? 'bg-red-50' : '' }}">
                                    <flux:table.cell>
                                        @if(!$major->trashed())
                                            <input type="checkbox" name="ids[]" value="{{ $major->id }}" class="row-checkbox rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        @endif
                                    </flux:table.cell>
                                    <flux:table.cell class="font-medium">{{ $major->code }}</flux:table.cell>
                                    <flux:table.cell>{{ $major->name }}</flux:table.cell>
                                    <flux:table.cell>
                                        @if($major->trashed())
                                            <flux:badge color="red">Dihapus</flux:badge>
                                        @else
                                            <flux:badge color="{{ $major->status === 'active' ? 'green' : 'gray' }}">
                                                {{ $major->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                            </flux:badge>
                                        @endif
                                    </flux:table.cell>
                                    <flux:table.cell align="right">
                                        <div class="flex justify-end gap-2">
                                            @if($major->trashed())
                                                @can('restore', $major)
                                                    <form action="{{ route('majors.restore', $major->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        <flux:button type="submit" variant="ghost" size="sm" icon="arrow-uturn-left" tooltip="Pulihkan" />
                                                    </form>
                                                @endcan
                                            @else
                                                @can('update', $major)
                                                    <flux:button href="{{ route('majors.edit', $major) }}" variant="ghost" size="sm" icon="pencil" tooltip="Edit" />
                                                @endcan
                                                @can('delete', $major)
                                                    <form action="{{ route('majors.destroy', $major) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <flux:button type="submit" variant="ghost" size="sm" icon="trash" color="red" tooltip="Hapus" />
                                                    </form>
                                                @endcan
                                            @endif
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="5" class="text-center py-8 text-gray-500">
                                        Tidak ada data jurusan ditemukan.
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforelse
                        </flux:table.rows>
                    </flux:table>
                </div>

                @if($majors->hasPages())
                    <div class="mt-4">
                        {{ $majors->links() }}
                    </div>
                @endif

                <div id="bulkActions" class="hidden mt-4 flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                    <span class="text-sm text-gray-700"><span id="selectedCount">0</span> item dipilih</span>
                    <div class="flex gap-2">
                        @if(request('trashed'))
                            @can('restore', \App\Models\Major::class)
                                <flux:button type="button" onclick="submitBulkAction('POST', '{{ route('majors.bulk-restore') }}')" variant="primary" size="sm" icon="arrow-uturn-left">
                                    Pulihkan Terpilih
                                </flux:button>
                            @endcan
                        @else
                            @can('delete', \App\Models\Major::class)
                                <flux:button type="button" onclick="submitBulkAction('DELETE', '{{ route('majors.bulk-destroy') }}')" variant="danger" size="sm" icon="trash">
                                    Hapus Terpilih
                                </flux:button>
                            @endcan
                        @endif
                    </div>
                </div>
            </form>
        </flux:card>
    </div>

    @push('scripts')
    <script>
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.row-checkbox');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');
        const bulkMethod = document.getElementById('bulkMethod');
        const bulkForm = document.getElementById('bulkActionForm');

        function updateBulkActions() {
            const checked = document.querySelectorAll('.row-checkbox:checked');
            selectedCount.textContent = checked.length;
            if (checked.length > 0) {
                bulkActions.classList.remove('hidden');
            } else {
                bulkActions.classList.add('hidden');
            }
        }

        selectAll?.addEventListener('change', function() {
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
            updateBulkActions();
        });

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkActions);
        });

        function submitBulkAction(method, url) {
            if (confirm('Apakah Anda yakin ingin melakukan aksi ini pada item yang dipilih?')) {
                bulkMethod.value = method;
                bulkForm.action = url;
                bulkForm.submit();
            }
        }
    </script>
    @endpush
</x-layouts.app>