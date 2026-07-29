<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dispensation extends Model
{
    use HasFactory;

    protected $fillable = [

        'code',
        'uuid',

        'student_id',

        'category_id',

        'destination_id',

        'approved_by',

        'purpose',

        'description',

        'dispensation_date',

        'exit_plan',

        'return_plan',

        'exit_at',

        'return_at',

        'approved_at',

        'teacher_note',

        'pdf_file',

        'status',

    ];

    protected $casts = [
        'dispensation_date' => 'date',
        'exit_at' => 'datetime',
        'return_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dispensation) {

            $dispensation->uuid = (string) Str::uuid();

            $year = now()->year;

            $last = self::whereYear('created_at', $year)->count() + 1;

            $dispensation->code = 'DISP-'.$year.'-'.str_pad($last,6,'0',STR_PAD_LEFT);

        });
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function category()
    {
        return $this->belongsTo(DispensationCategory::class, 'category_id');
    }

    public function destination()
    {
        return $this->belongsTo(DispensationDestination::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}