<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'code' => 'PPLG',
                'name' => 'Pengembangan Perangkat Lunak dan Gim',
                'description' => 'Jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) SMKN 1 Bangsri',
                'status' => 'active',
            ],
            [
                'code' => 'AKL',
                'name' => 'Akuntansi Keuangan Lembaga',
                'description' => 'Jurusan Akuntansi Keuangan Lembaga (AKL) SMKN 1 Bangsri',
                'status' => 'active',
            ],
            [
                'code' => 'MPLB',
                'name' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'description' => 'Jurusan Manajemen Perkantoran dan Layanan Bisnis (MPLB) SMKN 1 Bangsri',
                'status' => 'active',
            ],
            [
                'code' => 'PM',
                'name' => 'Pemasaran',
                'description' => 'Jurusan Pemasaran (PM) SMKN 1 Bangsri',
                'status' => 'active',
            ],
            [
                'code' => 'TO',
                'name' => 'Teknik Otomotif',
                'description' => 'Jurusan Teknik Otomotif (TO) SMKN 1 Bangsri',
                'status' => 'active',
            ],
        ];

        foreach ($majors as $major) {
            Major::updateOrCreate(
                ['code' => $major['code']],
                $major
            );
        }
    }
}