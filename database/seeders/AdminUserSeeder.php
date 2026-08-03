<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'mimindispen'],
            [
                'password' => Hash::make('eskasaba323'),
                'role' => 'admin',
            ]
        );
    }
}