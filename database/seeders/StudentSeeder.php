<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Major;
use App\Models\Classroom;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {

            $major = Major::inRandomOrder()->first();
            $classroom = Classroom::where('major_id', $major->id)
                ->inRandomOrder()
                ->first();

            Student::create([
                'major_id' => $major->id,
                'classroom_id' => $classroom?->id,

                'nis' => '2310'.str_pad($i,4,'0',STR_PAD_LEFT),
                'nisn' => fake()->unique()->numerify('##########'),

                'full_name' => fake()->name(),

                'gender' => fake()->randomElement(['L','P']),

                'birth_date' => fake()->date('Y-m-d','2010-01-01'),

                'phone' => fake()->phoneNumber(),

                'email' => fake()->unique()->safeEmail(),

                'status' => 'aktif',
            ]);
        }
    }
}