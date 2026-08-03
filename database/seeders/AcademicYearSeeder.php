<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    public function run(): void
    {
        AcademicYear::updateOrCreate(
            ['year' => '2025/2026'],
            ['is_active' => true]
        );

        AcademicYear::updateOrCreate(
            ['year' => '2026/2027'],
            ['is_active' => false]
        );
    }
}