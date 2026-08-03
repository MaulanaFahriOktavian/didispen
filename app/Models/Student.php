<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes, AuthenticatableTrait;

    protected $fillable = [
        'nis',
        'name',
        'birth_date',
        'gender',
    ];

    protected $hidden = [
        'birth_date',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Authentication Overrides
    |--------------------------------------------------------------------------
    */

    public function getAuthIdentifierName()
    {
        return 'nis';
    }

    public function getAuthPasswordName()
    {
        return 'birth_date';
    }

    public function getAuthPassword()
    {
        return $this->birth_date->format('Y-m-d');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(
            Classroom::class,
            'student_classrooms'
        )->withPivot('academic_year_id', 'semester_id')
         ->withTimestamps();
    }

    public function dispensations(): HasMany
    {
        return $this->hasMany(Dispensation::class);
    }
}