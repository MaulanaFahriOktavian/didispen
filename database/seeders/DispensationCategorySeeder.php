<?php

namespace Database\Seeders;

use App\Models\DispensationCategory;
use Illuminate\Database\Seeder;

class DispensationCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Organisasi',
                'description' => 'Kegiatan organisasi sekolah',
            ],

            [
                'name' => 'BK',
                'description' => 'Bimbingan Konseling',
            ],

            [
                'name' => 'Lomba',
                'description' => 'Mengikuti perlombaan',
            ],

            [
                'name' => 'Kegiatan Sekolah',
                'description' => 'Kegiatan resmi sekolah',
            ],

            [
                'name' => 'Pribadi',
                'description' => 'Keperluan pribadi',
            ],

            [
                'name' => 'Lainnya',
                'description' => 'Keperluan lainnya',
            ],

        ];

        foreach ($categories as $category) {

            DispensationCategory::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'is_active' => true,
            ]);

        }
    }
}