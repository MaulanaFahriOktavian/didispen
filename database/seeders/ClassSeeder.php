<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            'PPLG' => 2,
            'AKL'  => 2,
            'PM'   => 2,
            'MPLB' => 3,
            'TO'   => 2,
        ];

        foreach ($majors as $majorCode => $totalClass) {

            $major = Major::where('code', $majorCode)->first();

            foreach (['X', 'XI', 'XII'] as $grade) {

                for ($i = 1; $i <= $totalClass; $i++) {

                    SchoolClass::create([
                        'major_id'     => $major->id,
                        'grade'        => $grade,
                        'class_number' => $i,
                        'name'         => "{$grade} {$majorCode} {$i}",
                        'is_active'    => true,
                    ]);

                }
            }
        }
    }
}