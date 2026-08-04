<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <flux:input name="code" label="Kode Jurusan" placeholder="Contoh: RPL, TKJ, MM" required :value="old('code', $major->code ?? '')" />
        <flux:input name="name" label="Nama Jurusan" placeholder="Contoh: Rekayasa Perangkat Lunak" required :value="old('name', $major->name ?? '')" />
    </div>

    <div>
        <flux:textarea name="description" label="Deskripsi" rows="3" placeholder="Deskripsi tambahan tentang jurusan...">{{ old('description', $major->description ?? '') }}</flux:textarea>
    </div>

    <div>
        <flux:select name="status" label="Status" required :value="old('status', $major->status ?? 'active')">
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </flux:select>
    </div>

    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
        <flux:button href="{{ route('majors.index') }}" variant="ghost">Batal</flux:button>
        <flux:button type="submit" variant="primary">
            {{ isset($major) ? 'Perbarui Jurusan' : 'Simpan Jurusan' }}
        </flux:button>
    </div>
</div>