<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MajorSeeder::class,
            ClassSeeder::class,
            AcademicYearSeeder::class,
            SemesterSeeder::class,
            StudentSeeder::class,
            DispensationCategorySeeder::class,
            DispensationDestinationSeeder::class,
        ]);
    }
}