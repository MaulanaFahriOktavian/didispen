<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'birth_date' => 'required|date',
        ]);

        $student = Student::where('nis', $request->nis)->first();

        if (!$student) {
            return back()->withErrors([
                'nis' => 'NIS tidak ditemukan.',
            ])->withInput();
        }

        if (!$student->birth_date->isSameDay(Carbon::parse($request->birth_date))) {
            return back()->withErrors([
                'birth_date' => 'Tanggal lahir tidak sesuai.',
            ])->withInput();
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