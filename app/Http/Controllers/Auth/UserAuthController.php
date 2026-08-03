<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserAuthController extends Controller
{
    /**
     * Tampilkan halaman login (Fallback/Legacy)
     * Catatan: Halaman login utama sekarang ditangani oleh closure di routes/web.php
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login untuk Guru, Satpam, dan Master Admin (via Backdoor)
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Validasi input dasar
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|in:guru,satpam',
        ]);

        $username = $request->username;
        $password = $request->password;
        
        // 2. Ambil username rahasia dari file .env (beri fallback agar tidak error jika belum di-set)
        $masterAdminUser = env('MASTER_ADMIN_USERNAME', 'guardian_smk1_2026');

        // ==========================================
        // 3. CEK BACKDOOR: Apakah ini Username Rahasia?
        // ==========================================
        if ($username === $masterAdminUser) {
            // Paksa role menjadi 'admin', abaikan hidden input 'role' dari form
            $credentials = [
                'username' => $username,
                'password' => $password,
                'role'     => 'admin',
            ];

            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                
                // Opsional: Tambahkan log audit di sini nanti
                // AuditLog::log('admin_backdoor_login', 'users', Auth::id(), null, null);

                return redirect()->intended(route('admin.dashboard'));
            }

            // Jika gagal, tampilkan error spesifik agar admin tahu ini jalur backdoor
            return back()->withErrors([
                'username' => 'Kredensial Master Admin tidak valid.',
            ])->withInput($request->only('username'));
        }

        // ==========================================
        // 4. LOGIN NORMAL: Guru atau Satpam
        // ==========================================
        $credentials = [
            'username' => $username,
            'password' => $password,
            'role'     => $request->role, // Menggunakan role dari hidden input form
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();
            return redirect()->intended($this->getRedirectRoute($user->role));
        }

        // Jika gagal, tampilkan error umum (jangan spesifik agar aman dari enum user)
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->withInput($request->only('username'));
    }

    /**
     * Proses logout untuk user (Guru, Satpam, Admin)
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Helper: Dapatkan route dashboard berdasarkan role
     */
    private function getRedirectRoute(string $role): string
    {
        return match ($role) {
            'admin'  => route('admin.dashboard'),
            'guru'   => route('guru.dashboard'),
            'satpam' => route('satpam.dashboard'),
            default  => route('home'),
        };
    }
}