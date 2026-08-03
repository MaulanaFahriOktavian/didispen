<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    /**
     * Tampilkan form login siswa
     */
    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    /**
     * Proses login siswa
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'nis' => 'required|string',
            'birth_date' => 'required|date_format:Y-m-d',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date_format' => 'Format tanggal lahir harus YYYY-MM-DD.',
        ]);

        // 2. Cari siswa berdasarkan NIS dan Tanggal Lahir
        // PERHATIAN: TIDAK ADA where('status', ...) karena kolom status tidak ada di tabel students
        $student = Student::where('nis', $request->nis)
            ->whereDate('birth_date', $request->birth_date)
            ->first();

        // 3. Jika siswa ditemukan, lakukan login
        if ($student) {
            // Login menggunakan guard 'student' yang sudah kita setup
            Auth::guard('student')->login($student);

            // Regenerasi session untuk mencegah session fixation
            $request->session()->regenerate();

            // Redirect ke dashboard siswa (sesuaikan dengan nama route Anda)
            return redirect()->intended(route('student.dashboard')); 
        }

        // 4. Jika tidak ditemukan, kembalikan error
        return back()->withErrors([
            'nis' => 'NIS atau Tanggal Lahir yang Anda masukkan tidak sesuai.',
        ])->withInput($request->only('nis'));
    }

    /**
     * Proses logout siswa
     */
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Atau route('student.login')
    }
}