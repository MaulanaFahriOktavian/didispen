<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DispensationDestination;

class DispensationDestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [

            [
                'name' => 'Rumah',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Rumah Sakit',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Puskesmas',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Bank',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Kantor Desa',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Kantor Kecamatan',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Tempat PKL',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Kegiatan Sekolah',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Instansi',
                'need_description' => false,
                'is_active' => true,
            ],

            [
                'name' => 'Lainnya',
                'need_description' => true,
                'is_active' => true,
            ],
        ];

        DispensationDestination::insert($destinations);
    }
}