<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name'  => fake()->name(),
            'nip'   => fake()->unique()->numerify('##############'),
            'phone' => fake()->phoneNumber(),
        ];
    }

    public function withUser(): static
    {
        return $this->afterCreating(function (Teacher $teacher) {
            $user = User::factory()->guru()->create();
            $teacher->update(['user_id' => $user->id]);
        });
    }
}