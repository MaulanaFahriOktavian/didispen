<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::insert([
            [
                'name' => 'Ganjil',
                'code' => 'GANJIL',
                'is_active' => true,
            ],
            [
                'name' => 'Genap',
                'code' => 'GENAP',
                'is_active' => false,
            ],
        ]);
    }
}