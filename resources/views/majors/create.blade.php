<x-layouts.app title="Tambah Jurusan">
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('majors.index') }}" variant="ghost" icon="arrow-left">Kembali</flux:button>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Jurusan Baru</h1>
        </div>

        <flux:card>
            <form action="{{ route('majors.store') }}" method="POST">
                @csrf
                @include('majors._form')
            </form>
        </flux:card>
    </div>
</x-layouts.app>