<x-layouts.auth title="Login — DIDISPEN">
    <div class="min-h-screen flex" x-data="loginForm()">
        
        <!-- ============================================ -->
        <!-- LEFT SIDE: BRANDING & FEATURES (55%) -->
        <!-- ============================================ -->
        <div class="hidden lg:flex lg:w-[55%] relative overflow-hidden">
        
            <!-- Layer 1: Background Photo -->
            <div class="absolute inset-0">
                <img 
                    src="{{ asset('images/fotosmk.png') }}" 
                    alt="SMKN 1 Bangsri"
                    class="w-full h-full object-cover"
                    style="transform: scale(1.05);"
                >
            </div>
            
            <!-- Layer 2: Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#4c1d95]/75 via-[#5b21b6]/65 to-[#1e1b4b]/80"></div>
            
            <!-- Layer 3: Noise Pattern -->
            <div class="absolute inset-0 opacity-[0.04]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22 numOctaves=%224%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');"></div>
            
            <!-- Layer 4: Glow Effects -->
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-primary/25 rounded-full blur-[100px] -translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary-light/20 rounded-full blur-[80px] translate-x-1/4 translate-y-1/4"></div>

            <!-- Content (Padding dikurangi agar lebih compact) -->
            <div class="relative z-20 flex flex-col justify-between w-full px-10 xl:px-14 py-8">
                
                <!-- Header -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="absolute inset-0 bg-primary/50 rounded-2xl blur-xl"></div>
                            <div class="relative flex items-center justify-center w-11 h-11 rounded-2xl bg-white/10 backdrop-blur-2xl border border-white/25 p-2">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 1 Bangsri" class="w-full h-full object-contain">
                            </div>
                        </div>
                        <div>
                            <h1 class="text-white font-bold text-base tracking-tight">SMKN 1 Bangsri</h1>
                            <p class="text-white/70 text-[11px] font-medium tracking-wide">Official School Information System</p>
                        </div>
                    </div>

                    <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-2xl border border-white/20">
                        <span class="relative flex h-2 w-2 mr-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-success"></span>
                        </span>
                        <span class="text-white text-xs font-semibold">System Online</span>
                    </div>
                </div>

                <!-- Hero Section (Ukuran font diturunkan agar proporsional) -->
                <div class="space-y-5 max-w-xl">
                    <div class="space-y-3">
                        <h2 class="text-5xl xl:text-6xl font-black text-white leading-none tracking-tighter">
                            DIDISPEN
                        </h2>
                        <div class="space-y-0.5">
                            <h3 class="text-xl xl:text-2xl font-bold text-white/95 leading-tight">Digital School</h3>
                            <h3 class="text-xl xl:text-2xl font-bold text-white/95 leading-tight">Dispensation System</h3>
                        </div>
                        <p class="text-white/75 text-sm leading-relaxed max-w-md pt-2">
                            Sistem informasi dispensasi sekolah berbasis digital yang membantu proses perizinan siswa menjadi lebih cepat, aman, terdokumentasi, dan terintegrasi.
                        </p>
                    </div>

                    <!-- Feature Cards (Padding dan icon diperkecil) -->
                    <div class="grid grid-cols-3 gap-3 pt-4">
                        <!-- Card 1 -->
                        <div class="group relative overflow-hidden rounded-2xl bg-white/[0.08] backdrop-blur-2xl border border-white/15 p-4 hover:bg-white/[0.12] hover:border-white/30 hover:-translate-y-1 transition-all duration-300">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative space-y-2">
                                <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-success/20 text-success group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <div class="space-y-0.5">
                                    <h3 class="text-white font-bold text-xs">Secure</h3>
                                    <p class="text-white/60 text-[10px]">Encrypted Database</p>
                                </div>
                                <div class="h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                                <p class="text-white/50 text-[10px] leading-relaxed">Keamanan data berlapis</p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="group relative overflow-hidden rounded-2xl bg-white/[0.08] backdrop-blur-2xl border border-white/15 p-4 hover:bg-white/[0.12] hover:border-white/30 hover:-translate-y-1 transition-all duration-300">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative space-y-2">
                                <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-info/20 text-info group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                                </div>
                                <div class="space-y-0.5">
                                    <h3 class="text-white font-bold text-xs">QR Verification</h3>
                                    <p class="text-white/60 text-[10px]">Validasi QR Code</p>
                                </div>
                                <div class="h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                                <p class="text-white/50 text-[10px] leading-relaxed">Anti pemalsuan surat</p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="group relative overflow-hidden rounded-2xl bg-white/[0.08] backdrop-blur-2xl border border-white/15 p-4 hover:bg-white/[0.12] hover:border-white/30 hover:-translate-y-1 transition-all duration-300">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative space-y-2">
                                <div class="flex items-center justify-center w-9 h-9 rounded-xl bg-primary-light/25 text-primary-light group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                </div>
                                <div class="space-y-0.5">
                                    <h3 class="text-white font-bold text-xs">Realtime Monitoring</h3>
                                    <p class="text-white/60 text-[10px]">Live Tracking</p>
                                </div>
                                <div class="h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                                <p class="text-white/50 text-[10px] leading-relaxed">Pantau status langsung</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-white font-bold text-xs">SMKN 1 Bangsri</p>
                            <p class="text-white/60 text-[10px]">Version 2.0</p>
                        </div>
                        <div class="px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-2xl border border-white/20">
                            <span class="text-white/80 text-[10px] font-semibold">Powered by DIDISPEN</span>
                        </div>
                    </div>
                    <div class="h-px bg-gradient-to-r from-white/20 via-white/10 to-transparent"></div>
                    <p class="text-white/40 text-[10px]">© 2026 All rights reserved</p>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- RIGHT SIDE: LOGIN FORM (45%) -->
        <!-- ============================================ -->
        <div class="flex-1 flex items-center justify-center p-6 sm:p-8 lg:p-10 bg-gradient-to-br from-zinc-50 via-white to-primary/[0.02]">
            <div class="w-full max-w-md">
                
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center justify-center mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-2xl bg-white shadow-lg shadow-primary/20 p-2">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 1 Bangsri" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h1 class="text-zinc-900 font-bold text-base">SMKN 1 Bangsri</h1>
                            <p class="text-zinc-500 text-[11px]">Official School Platform</p>
                        </div>
                    </div>
                </div>

                <!-- Welcome Text (Lebih compact) -->
                <div class="mb-5 text-center lg:text-left">
                    <h2 class="text-2xl font-bold text-zinc-900 tracking-tight mb-1">Selamat Datang</h2>
                    <p class="text-zinc-500 text-sm">Silakan pilih peran Anda untuk mengakses DIDISPEN</p>
                </div>

                <!-- Role Selector (Lebih compact) -->
                <div class="grid grid-cols-3 gap-2 mb-5">
                    <template x-for="role in roles" :key="role.id">
                        <button
                            type="button"
                            @click="activeRole = role.id"
                            class="relative flex flex-col items-center justify-center py-3.5 px-2 rounded-xl border-2 transition-all duration-300 group"
                            :class="activeRole === role.id 
                                ? 'bg-gradient-to-br from-primary/10 to-primary-light/10 border-primary text-primary shadow-lg shadow-primary/20 scale-105' 
                                : 'bg-white border-zinc-100 text-zinc-400 hover:border-zinc-200 hover:text-zinc-600 hover:shadow-md hover:-translate-y-0.5'"
                        >
                            <div class="mb-1.5 transition-all duration-300" :class="activeRole === role.id ? 'scale-110' : 'scale-100 group-hover:scale-105'" x-html="role.icon"></div>
                            <span class="text-xs font-bold" x-text="role.label"></span>
                            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-1 rounded-full transition-all duration-300" :class="activeRole === role.id ? 'bg-primary opacity-100' : 'bg-transparent opacity-0'"></div>
                        </button>
                    </template>
                </div>

                <!-- Login Card (Padding lebih kecil) -->
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary via-primary-light to-primary rounded-3xl opacity-15 blur-2xl transition-opacity duration-700"></div>
                    
                    <div class="relative glass rounded-2xl p-5 border border-zinc-100 shadow-2xl shadow-zinc-200/50">
                        
                        <!-- Card Header (Icon lebih kecil) -->
                        <div class="mb-5 flex items-center space-x-3 pb-4 border-b border-zinc-100">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-primary to-primary-light rounded-xl blur-md opacity-60"></div>
                                <div class="relative flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-primary to-primary-light shadow-lg shadow-primary/40 transition-all duration-300" x-html="getActiveRole().iconLarge"></div>
                            </div>
                            <div>
                                <h3 class="font-bold text-zinc-900 text-sm" x-text="'Login sebagai ' + getActiveRole().label"></h3>
                                <p class="text-xs text-zinc-500 mt-0.5" x-text="getActiveRole().description"></p>
                            </div>
                        </div>

                        <!-- Error Alert -->
                        @if ($errors->any())
                            <div class="mb-4 p-3 rounded-xl bg-danger/5 border border-danger/20 flex items-start space-x-3 animate-fade-in-up">
                                <svg class="w-4 h-4 text-danger flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-bold text-danger">Login Gagal</h4>
                                    <p class="text-sm text-danger/80 mt-0.5">{{ $errors->first() }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- FORM SISWA (Spacing lebih kecil) -->
                        <form x-show="activeRole === 'student'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" method="POST" action="{{ route('student.login.process') }}" class="space-y-3.5" @submit="loading = true">
                            @csrf
                            
                            <div class="group">
                                <label for="nis" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">NIS</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                        </svg>
                                    </div>
                                    <input id="nis" name="nis" type="text" value="{{ old('nis') }}" required autofocus placeholder="Masukkan NIS" class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <div class="group">
                                <label for="birth_date" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">Tanggal Lahir</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}" required class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <button type="submit" :disabled="loading" @click="createRipple($event)" class="group relative w-full flex justify-center items-center h-[50px] px-4 border border-transparent rounded-xl text-sm font-bold text-white bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary focus:outline-none focus:ring-4 focus:ring-primary/30 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed overflow-hidden">
                                <svg x-show="loading" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-show="!loading" class="flex items-center">
                                    Masuk sebagai Siswa
                                    <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                                <span x-show="loading">Memproses...</span>
                            </button>
                        </form>

                        <!-- FORM GURU -->
                        <form x-show="activeRole === 'teacher'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" method="POST" action="{{ route('user.login.process') }}" class="space-y-3.5" @submit="loading = true">
                            @csrf
                            <input type="hidden" name="role" value="guru">
                            
                            <div class="group">
                                <label for="teacher_username" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">Username / NIP</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <input id="teacher_username" name="username" type="text" value="{{ old('username') }}" required autofocus placeholder="Masukkan username atau NIP" class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <div class="group">
                                <label for="teacher_password" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input id="teacher_password" name="password" type="password" required placeholder="••••••••" class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <button type="submit" :disabled="loading" @click="createRipple($event)" class="group relative w-full flex justify-center items-center h-[50px] px-4 border border-transparent rounded-xl text-sm font-bold text-white bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary focus:outline-none focus:ring-4 focus:ring-primary/30 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed overflow-hidden">
                                <svg x-show="loading" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-show="!loading" class="flex items-center">
                                    Masuk sebagai Guru
                                    <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                                <span x-show="loading">Memproses...</span>
                            </button>
                        </form>

                        <!-- FORM SATPAM -->
                        <form x-show="activeRole === 'security'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" method="POST" action="{{ route('user.login.process') }}" class="space-y-3.5" @submit="loading = true">
                            @csrf
                            <input type="hidden" name="role" value="satpam">
                            
                            <div class="group">
                                <label for="security_username" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">Username</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <input id="security_username" name="username" type="text" value="{{ old('username') }}" required autofocus placeholder="Masukkan username" class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <div class="group">
                                <label for="security_password" class="block text-sm font-semibold text-zinc-700 mb-1.5 transition-colors group-focus-within:text-primary">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-zinc-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input id="security_password" name="password" type="password" required placeholder="••••••••" class="block w-full h-[50px] pl-11 pr-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-sm font-medium">
                                </div>
                            </div>

                            <button type="submit" :disabled="loading" @click="createRipple($event)" class="group relative w-full flex justify-center items-center h-[50px] px-4 border border-transparent rounded-xl text-sm font-bold text-white bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-primary focus:outline-none focus:ring-4 focus:ring-primary/30 shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed overflow-hidden">
                                <svg x-show="loading" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-show="!loading" class="flex items-center">
                                    Masuk sebagai Satpam
                                    <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                                <span x-show="loading">Memproses...</span>
                            </button>
                        </form>

                        <!-- Footer -->
                        <div class="mt-4 pt-4 border-t border-zinc-100 text-center">
                            <a href="#" class="text-xs font-medium text-zinc-500 hover:text-primary transition-colors">Butuh bantuan? Hubungi Administrator</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Footer -->
                <div class="lg:hidden mt-6 text-center text-xs text-zinc-400">
                    <p>© 2026 SMKN 1 Bangsri · DIDISPEN v2.0</p>
                </div>
            </div>
        </div>

    <script>
        function loginForm() {
            return {
                activeRole: 'student',
                loading: false,
                roles: [
                    {
                        id: 'student', label: 'Siswa', description: 'Login menggunakan NIS dan tanggal lahir',
                        icon: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>`,
                        iconLarge: `<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>`
                    },
                    {
                        id: 'teacher', label: 'Guru', description: 'Login menggunakan username atau NIP',
                        icon: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>`,
                        iconLarge: `<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>`
                    },
                    {
                        id: 'security', label: 'Satpam', description: 'Login untuk monitoring gerbang',
                        icon: `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>`,
                        iconLarge: `<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>`
                    }
                ],
                getActiveRole() {
                    return this.roles.find(r => r.id === this.activeRole);
                },
                createRipple(event) {
                    const button = event.currentTarget;
                    const circle = document.createElement('span');
                    const diameter = Math.max(button.clientWidth, button.clientHeight);
                    const radius = diameter / 2;
                    
                    circle.style.width = circle.style.height = `${diameter}px`;
                    circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
                    circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
                    circle.classList.add('ripple');
                    
                    const existingRipple = button.querySelector('.ripple');
                    if (existingRipple) {
                        existingRipple.remove();
                    }
                    
                    button.appendChild(circle);
                    setTimeout(() => circle.remove(), 600);
                }
            }
        }
    </script>

    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            background-color: rgba(255, 255, 255, 0.4);
            pointer-events: none;
        }
        @keyframes ripple {
            to { transform: scale(4); opacity: 0; }
        }
    </style>
</x-layouts.auth>