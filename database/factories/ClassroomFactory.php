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
        $grade = fake()->randomElement(['X', 'XI', 'XII']);
        $major = Major::factory();
        
        return [
            'major_id' => $major,
            'name' => fake()->randomElement(['Reguler', 'Unggulan', 'Accelerated']) . ' ' . $grade,
            'grade' => $grade,
            'code' => fake()->unique()->lexify(8),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}