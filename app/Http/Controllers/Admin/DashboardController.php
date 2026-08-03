<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispensation;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Statistik
        $stats = [
            'total'    => Dispensation::count(),
            'pending'  => Dispensation::where('status', 'pending')->count(),
            'approved' => Dispensation::where('status', 'approved')->count(),
            'rejected' => Dispensation::where('status', 'rejected')->count(),
            'today'    => Dispensation::whereDate('created_at', today())->count(),
        ];

        // 2. Ambil 5 Data Terbaru
        $recentDispensations = Dispensation::with(['student', 'teacher', 'category'])
            ->latest()
            ->take(5)
            ->get();

        // DEBUG: Hapus tanda komentar (//) di baris bawah ini jika masih error, 
        // untuk memastikan data benar-benar sampai di sini.
        // dd($stats, $recentDispensations);

        // 3. Kirim ke View
        return view('admin.dashboard', compact('stats', 'recentDispensations'));
    }
}