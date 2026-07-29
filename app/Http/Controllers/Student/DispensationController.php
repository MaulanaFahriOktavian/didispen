<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Dispensation;
use App\Models\DispensationCategory;
use App\Models\DispensationDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DispensationController extends Controller
{
    public function create()
    {
        return view('student.dispensation.create', [

            'categories' => DispensationCategory::all(),

            'destinations' => DispensationDestination::all(),

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_id'=>'required',

            'destination_id'=>'required',

            'dispensation_date'=>'required|date',

            'leave_time'=>'required',

            'return_time'=>'required',

            'reason'=>'required',

        ]);

        Dispensation::create([

            'code'=>'DSP-'.date('Ymd').'-'.strtoupper(Str::random(5)),

            'student_id'=>auth('student')->id(),

            'category_id'=>$request->category_id,

            'destination_id'=>$request->destination_id,

            'dispensation_date'=>$request->dispensation_date,

            'leave_time'=>$request->leave_time,

            'return_time'=>$request->return_time,

            'reason'=>$request->reason,

            'status'=>'pending',

        ]);

        return redirect()
            ->route('student.dashboard')
            ->with('success','Dispensasi berhasil diajukan.');
    }
}