<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Dispensation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        
        // 1. Ambil Statistik Real untuk siswa ini
        $stats = [
            'total'    => Dispensation::where('student_id', $student->id)->count(),
            'pending'  => Dispensation::where('student_id', $student->id)->where('status', 'pending')->count(),
            'approved' => Dispensation::where('student_id', $student->id)->where('status', 'approved')->count(),
            'finished' => Dispensation::where('student_id', $student->id)->where('status', 'finished')->count(),
        ];

        // 2. Ambil 5 Dispensasi Terbaru siswa ini
        $recentDispensations = Dispensation::where('student_id', $student->id)
            ->with(['category', 'destination'])
            ->latest()
            ->take(5)
            ->get();

        // 3. DEBUG: Hapus tanda komentar (//) di baris bawah ini jika masih error, 
        // untuk memastikan data benar-benar sampai di sini sebelum ke view.
        // dd($stats, $recentDispensations);

        // 4. Kirim ke view
        return view('student.dashboard', compact('stats', 'recentDispensations'));
    }
}