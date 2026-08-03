<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Kit - DIDISPEN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-text-primary font-sans antialiased">
    <div class="min-h-screen p-8 max-w-7xl mx-auto space-y-16">
        
        <!-- Header -->
        <div class="border-b border-border pb-8">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 rounded-[12px] bg-primary flex items-center justify-center shadow-lg shadow-primary/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-text-primary">DIDISPEN Design System</h1>
                    <p class="text-sm text-text-secondary">Dokumentasi komponen UI v1.0</p>
                </div>
            </div>
        </div>

        <!-- 1. BUTTONS -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">01</span>
                <h2 class="text-xl font-bold text-text-primary">Buttons</h2>
            </div>
            <div class="flex flex-wrap gap-4 items-center">
                <x-ui.button variant="primary">Primary Button</x-ui.button>
                <x-ui.button variant="secondary">Secondary</x-ui.button>
                <x-ui.button variant="outline">Outline</x-ui.button>
                <x-ui.button variant="ghost">Ghost</x-ui.button>
                <x-ui.button variant="danger">Danger</x-ui.button>
                <x-ui.button variant="success">Success</x-ui.button>
                <x-ui.button variant="primary" size="sm">Small</x-ui.button>
                <x-ui.button variant="primary" size="lg">Large</x-ui.button>
                <x-ui.button variant="primary" :loading="true">Loading</x-ui.button>
            </div>
        </section>

        <!-- 2. FORMS -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">02</span>
                <h2 class="text-xl font-bold text-text-primary">Forms</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl">
                <x-forms.input label="Username" name="username" placeholder="Masukkan username" 
                    icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
                />
                <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" 
                    icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>' 
                />
                <x-forms.input label="Dengan Error" name="error_field" error="Field ini wajib diisi" />
                <x-forms.input label="Disabled" name="disabled_field" value="Tidak bisa diubah" :disabled="true" />
            </div>
        </section>

        <!-- 3. BADGES -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">03</span>
                <h2 class="text-xl font-bold text-text-primary">Badges & Status</h2>
            </div>
            <div class="flex flex-wrap gap-3">
                <x-ui.badge status="pending">Pending</x-ui.badge>
                <x-ui.badge status="approved">Approved</x-ui.badge>
                <x-ui.badge status="rejected">Rejected</x-ui.badge>
                <x-ui.badge status="out">Keluar</x-ui.badge>
                <x-ui.badge status="finished">Selesai</x-ui.badge>
                <x-ui.badge status="active">Aktif</x-ui.badge>
                <x-ui.badge status="inactive">Tidak Aktif</x-ui.badge>
                <x-ui.badge status="default">Default</x-ui.badge>
            </div>
        </section>

        <!-- 4. CARDS & STATS -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">04</span>
                <h2 class="text-xl font-bold text-text-primary">Cards & Statistics</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <x-cards.stat 
                    title="Total Dispensasi" 
                    value="1,248" 
                    trend="up"
                    icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>'
                />
                <x-cards.stat 
                    title="Menunggu Persetujuan" 
                    value="42" 
                    color="warning"
                    icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                />
                <x-ui.card variant="glass" class="flex items-center justify-center min-h-[120px]">
                    <p class="text-text-secondary font-medium">Glass Card Variant</p>
                </x-ui.card>
            </div>
        </section>

        <!-- 5. ALERTS -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">05</span>
                <h2 class="text-xl font-bold text-text-primary">Alerts</h2>
            </div>
            <div class="space-y-4 max-w-2xl">
                <x-ui.alert type="success" title="Berhasil!" message="Data dispensasi berhasil disimpan ke dalam sistem." />
                <x-ui.alert type="warning" title="Perhatian" message="Terdapat 5 dispensasi yang belum diverifikasi oleh guru piket." />
                <x-ui.alert type="danger" title="Gagal" message="Terjadi kesalahan pada server, silakan coba lagi nanti." />
                <x-ui.alert type="info" message="Sistem akan melakukan maintenance pada pukul 02:00 WIB." :dismissible="false" />
            </div>
        </section>

        <!-- 6. MODALS -->
        <section class="space-y-6">
            <div class="flex items-center space-x-2">
                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded">06</span>
                <h2 class="text-xl font-bold text-text-primary">Modals</h2>
            </div>
            <x-ui.button variant="primary" x-on:click="$dispatch('open-modal', 'demo-modal')">
                Buka Modal Konfirmasi
            </x-ui.button>

            <x-ui.modal name="demo-modal" title="Konfirmasi Penghapusan" maxWidth="md">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-danger/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div>
                        <p class="text-text-secondary text-sm mb-6">
                            Apakah Anda yakin ingin menghapus data dispensasi ini? Tindakan ini tidak dapat dibatalkan dan data akan dihapus secara permanen dari sistem.
                        </p>
                        <div class="flex justify-end space-x-3">
                            <x-ui.button variant="ghost" x-on:click="$dispatch('close-modal')">Batal</x-ui.button>
                            <x-ui.button variant="danger">Ya, Hapus Data</x-ui.button>
                        </div>
                    </div>
                </div>
            </x-ui.modal>
        </section>

        <div class="pt-12 border-t border-border text-center text-text-secondary text-sm">
            <p>DIDISPEN UI Kit v1.0 &copy; 2026 &mdash; Built with Laravel 13, Tailwind CSS & Alpine.js</p>
        </div>
    </div>
</body>
</html>