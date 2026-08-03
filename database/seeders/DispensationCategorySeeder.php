<?php

namespace Database\Seeders;

use App\Models\DispensationCategory;
use Illuminate\Database\Seeder;

class DispensationCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Izin Sakit',               'description' => 'Dispensasi karena sakit atau berobat'],
            ['name' => 'Izin Keluarga',             'description' => 'Dispensasi karena urusan keluarga'],
            ['name' => 'Keperluan Lomba',           'description' => 'Dispensasi untuk mengikuti lomba atau kompetisi'],
            ['name' => 'Urusan Administrasi',       'description' => 'Dispensasi untuk urusan administrasi di luar sekolah'],
            ['name' => 'Kegiatan Ekstrakurikuler',  'description' => 'Dispensasi untuk kegiatan ekstrakurikuler di luar sekolah'],
        ];

        foreach ($categories as $category) {
            DispensationCategory::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}