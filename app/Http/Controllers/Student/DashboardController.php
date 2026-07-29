<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth('student')->user();

        return view('student.dashboard', [

            'student' => $student,

            'total' => $student->dispensations()->count(),

            'pending' => $student->dispensations()
                ->where('status', 'pending')
                ->count(),

            'approved' => $student->dispensations()
                ->where('status', 'approved')
                ->count(),

            'finished' => $student->dispensations()
                ->where('status', 'finished')
                ->count(),

            'histories' => $student->dispensations()
                ->with('destination')
                ->latest()
                ->take(5)
                ->get(),

        ]);
    }
}