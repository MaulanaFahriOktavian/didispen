<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispensation;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'total' => Dispensation::count(),

            'pending' => Dispensation::where('status','pending')->count(),

            'approved' => Dispensation::where('status','approved')->count(),

            'out' => Dispensation::where('status','out')->count(),

            'finished' => Dispensation::where('status','finished')->count(),

            'recent' => Dispensation::latest()
                        ->take(10)
                        ->get(),

        ]);
    }
}