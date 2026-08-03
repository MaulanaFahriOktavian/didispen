<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya data master yang selalu dibutuhkan aplikasi
        $this->call([
            AdminUserSeeder::class,
            SchoolSettingSeeder::class,
            AcademicYearSeeder::class,
            SemesterSeeder::class,
            MajorSeeder::class,
            ClassroomSeeder::class,
            DispensationCategorySeeder::class,
            DispensationDestinationSeeder::class,
            UserSeeder::class,
            DutyScheduleSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
        ]);
    }
}