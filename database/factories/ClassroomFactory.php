<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    protected $model = Classroom::class;

    public function definition(): array
    {
        return [
            'name'     => fake()->randomElement(['X', 'XI', 'XII']) . ' ' . fake()->numberBetween(1, 10),
            'major_id' => Major::factory(),
        ];
    }
}