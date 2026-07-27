<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        Major::insert([
            [
                'code' => 'PPLG',
                'name' => 'Pengembangan Perangkat Lunak dan Gim',
                'is_active' => true,
            ],
            [
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'is_active' => true,
            ],
            [
                'code' => 'PM',
                'name' => 'Pemasaran',
                'is_active' => true,
            ],
            [
                'code' => 'MPLB',
                'name' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'is_active' => true,
            ],
            [
                'code' => 'TO',
                'name' => 'Teknik Otomotif',
                'is_active' => true,
            ],
        ]);
    }
}