<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $activeYear = AcademicYear::where('is_active', true)->first();

        if (! $activeYear) {
            return;
        }

        Semester::updateOrCreate(
            ['academic_year_id' => $activeYear->id, 'semester' => 1],
            ['is_active' => true]
        );

        Semester::updateOrCreate(
            ['academic_year_id' => $activeYear->id, 'semester' => 2],
            ['is_active' => false]
        );
    }
}