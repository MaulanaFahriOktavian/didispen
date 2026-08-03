<?php

namespace Database\Factories;

use App\Models\DispensationDestination;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispensationDestinationFactory extends Factory
{
    protected $model = DispensationDestination::class;

    public function definition(): array
    {
        return [
            'name'    => fake()->unique()->company(),
            'address' => fake()->address(),
        ];
    }
}