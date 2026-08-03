<?php

namespace Database\Seeders;

use App\Models\SchoolSetting;
use Illuminate\Database\Seeder;

class SchoolSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'school_name',      'value' => 'SMK Negeri 1 Contoh'],
            ['key' => 'school_address',   'value' => 'Jl. Pendidikan No. 1, Kota Contoh'],
            ['key' => 'school_phone',     'value' => '021-1234567'],
            ['key' => 'school_email',     'value' => 'info@smkn1contoh.sch.id'],
            ['key' => 'school_npsn',      'value' => '20100001'],
            ['key' => 'headmaster_name',  'value' => 'Dr. H. Kepala Sekolah, M.Pd.'],
            ['key' => 'headmaster_nip',   'value' => '197001012000011001'],
            ['key' => 'piket_start_time', 'value' => '07:00'],
            ['key' => 'piket_end_time',   'value' => '15:00'],
        ];

        foreach ($settings as $setting) {
            SchoolSetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}