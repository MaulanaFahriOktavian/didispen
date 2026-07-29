<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Major;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        $major = Major::inRandomOrder()->first();

        $class = SchoolClass::where('major_id', $major->id)
            ->inRandomOrder()
            ->first();

        $academicYear = AcademicYear::where('is_active', true)->first();

        return [
            'nis' => fake()->unique()->numerify('24#####'),
            'nisn' => fake()->unique()->numerify('##########'),

            'full_name' => fake()->name(),

            'gender' => fake()->randomElement(['L', 'P']),

            'birth_place' => fake()->city(),

            'birth_date' => fake()->dateTimeBetween('2008-01-01', '2011-12-31')->format('Y-m-d'),

            'address' => fake()->address(),

            'phone' => fake()->phoneNumber(),

            'email' => fake()->unique()->safeEmail(),

            'major_id' => $major->id,

            'class_id' => $class->id,

            'academic_year_id' => $academicYear->id,

            'status' => 'aktif',

            'photo' => null,
        ];
    }
}