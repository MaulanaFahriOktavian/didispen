<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'nis'        => fake()->unique()->numerify('##########'),
            'name'       => fake()->name(),
            'birth_date' => fake()->date('Y-m-d', '2010-01-01'),
            'gender'     => fake()->randomElement(['L', 'P']),
        ];
    }
}