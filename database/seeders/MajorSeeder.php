<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            ['name' => 'Rekayasa Perangkat Lunak', 'code' => 'RPL'],
            ['name' => 'Teknik Komputer Jaringan', 'code' => 'TKJ'],
            ['name' => 'Multimedia',               'code' => 'MM'],
            ['name' => 'Akuntansi',                'code' => 'AKN'],
        ];

        foreach ($majors as $major) {
            Major::updateOrCreate(['code' => $major['code']], $major);
        }
    }
}