<x-layouts.app title="Edit Jurusan">
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <flux:button href="{{ route('majors.index') }}" variant="ghost" icon="arrow-left">Kembali</flux:button>
            <h1 class="text-2xl font-bold text-gray-900">Edit Jurusan</h1>
        </div>

        <flux:card>
            <form action="{{ route('majors.update', $major) }}" method="POST">
                @csrf
                @method('PUT')
                @include('majors._form', ['major' => $major])
            </form>
        </flux:card>
    </div>
</x-layouts.app>