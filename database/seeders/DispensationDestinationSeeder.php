<?php

namespace Database\Seeders;

use App\Models\DispensationDestination;
use Illuminate\Database\Seeder;

class DispensationDestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            ['name' => 'Rumah Sakit Umum Daerah', 'address' => 'Jl. Kesehatan No. 10'],
            ['name' => 'Puskesmas Kecamatan',     'address' => 'Jl. Sejahtera No. 5'],
            ['name' => 'Kantor Dinas Pendidikan', 'address' => 'Jl. Pemerintahan No. 1'],
            ['name' => 'Gedung Olahraga Kota',    'address' => 'Jl. Sport Center No. 88'],
        ];

        foreach ($destinations as $destination) {
            DispensationDestination::updateOrCreate(
                ['name' => $destination['name']],
                $destination
            );
        }
    }
}