<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nis',
        'nisn',
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'phone',
        'email',
        'major_id',
        'class_id',
        'academic_year_id',
        'status',
        'photo',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    protected $hidden = [
        'birth_date',
    ];

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn () => $this->full_name,
        );
    }

    public function dispensations()
    {
        return $this->hasMany(Dispensation::class);
    }

    public function getAuthPassword()
    {
        return null;
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}