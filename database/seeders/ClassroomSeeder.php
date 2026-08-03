<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $majors = Major::all();

        foreach ($majors as $major) {
            foreach (['X', 'XI', 'XII'] as $grade) {
                for ($i = 1; $i <= 2; $i++) {
                    Classroom::firstOrCreate([
                        'name'     => $grade . ' ' . $major->code . ' ' . $i,
                        'major_id' => $major->id,
                    ]);
                }
            }
        }
    }
}