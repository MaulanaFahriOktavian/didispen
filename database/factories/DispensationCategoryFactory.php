<?php

namespace Database\Factories;

use App\Models\DispensationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispensationCategoryFactory extends Factory
{
    protected $model = DispensationCategory::class;

    public function definition(): array
    {
        return [
            'name'        => fake()->unique()->randomElement(['Izin Sakit', 'Izin Keluarga', 'Keperluan Lomba', 'Urusan Administrasi', 'Kegiatan Ekstrakurikuler']),
            'description' => fake()->sentence(),
        ];
    }
}