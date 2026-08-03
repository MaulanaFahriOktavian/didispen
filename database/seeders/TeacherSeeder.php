<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        Teacher::insert([
            [
                'user_id' => 2,
                'nip' => '198812012010011001',
                'full_name' => 'Ahmad Fauzi',
                'gender' => 'L',
                'phone' => '081234567890',
                'email' => 'guru1@didispen.sch.id',
                'is_homeroom_teacher' => true,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}