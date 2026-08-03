<x-layouts.auth title="Admin Login">
    <div class="min-h-screen flex items-center justify-center bg-[#F8FAFC] p-6">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-[20px] shadow-xl border border-[#E5E7EB] p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-[#5B3DF5] flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#5B3DF5]/30">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-[#111827]">Admin Portal</h1>
                    <p class="text-sm text-[#6B7280] mt-1">Login sebagai Administrator</p>
                </div>

                @if ($errors->any())
                    <x-ui.alert type="danger" title="Login Gagal" :message="$errors->first()" class="mb-6" />
                @endif

                <form method="POST" action="{{ route('admin.login.process') }}" class="space-y-4">
                    @csrf
                    <x-forms.input label="Username" name="username" placeholder="Masukkan username admin" required 
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
                    />
                    <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" required
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>'
                    />
                    <x-ui.button variant="primary" size="lg" type="submit" class="w-full">
                        Masuk sebagai Admin
                    </x-ui.button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-xs font-medium text-[#6B7280] hover:text-[#5B3DF5] transition-colors">
                        ← Kembali ke halaman login utama
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>