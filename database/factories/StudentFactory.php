<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Major;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),

            'major_id' => Major::inRandomOrder()->value('id'),

            'classroom_id' => Classroom::inRandomOrder()->value('id'),

            'nis' => fake()->unique()->numerify('##########'),

            'nisn' => fake()->unique()->numerify('##########'),

            'full_name' => fake()->name(),

            'gender' => fake()->randomElement(['L', 'P']),

            'phone' => fake()->phoneNumber(),

            'email' => fake()->unique()->safeEmail(),

            'status' => 'aktif',
        ];
    }
}