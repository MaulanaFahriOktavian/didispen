<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => ['required'],
            'birth_date' => ['required', 'date'],
        ]);

        $student = Student::where('nis', $request->nis)
            ->whereDate('birth_date', $request->birth_date)
            ->first();

        if (!$student) {
            return back()->withErrors([
                'nis' => 'NIS atau Tanggal Lahir salah.',
            ]);
        }

        Auth::guard('student')->login($student);

        $request->session()->regenerate();

        return redirect()->route('student.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}