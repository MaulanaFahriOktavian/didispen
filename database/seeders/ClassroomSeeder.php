<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $majorsData = [
            'PPLG' => 'Pengembangan Perangkat Lunak dan Gim',
            'AKL'  => 'Akuntansi Keuangan Lembaga',
            'MPLB' => 'Manajemen Perkantoran dan Layanan Bisnis',
            'PM'   => 'Pemasaran',
            'TO'   => 'Teknik Otomotif',
        ];

        $grades = ['X', 'XI', 'XII'];

        foreach ($majorsData as $code => $majorName) {
            // Cari atau buat jurusan
            $major = Major::firstOrCreate(
                ['code' => $code],
                [
                    'name' => $majorName,
                    'status' => 'active',
                    'description' => "Jurusan {$majorName} SMKN 1 Bangsri"
                ]
            );

            // Buat 2 kelas untuk setiap tingkat (X, XI, XII)
            foreach ($grades as $grade) {
                for ($i = 1; $i <= 2; $i++) {
                    Classroom::create([
                        'major_id'  => $major->id,
                        'grade'     => $grade,
                        'name'      => "{$code} {$i}",
                        'full_name' => "{$grade} {$code} {$i}",
                        'capacity'  => 36,
                        'is_active' => true,
                    ]);
                }
            }
        }
    }
}