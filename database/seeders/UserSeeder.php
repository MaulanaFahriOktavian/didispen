<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [

            // ==========================
            // ADMIN
            // ==========================
            [
                'username' => 'admin',
                'password' => 'admin123',
                'role' => 'admin',
            ],

            [
                'username' => 'mimindispen',
                'password' => 'eskasaba323',
                'role' => 'admin',
            ],

            // ==========================
            // GURU
            // ==========================
            [
                'username' => 'guru01',
                'password' => 'guru123',
                'role' => 'guru',
            ],

            [
                'username' => 'guru02',
                'password' => 'guru123',
                'role' => 'guru',
            ],

            [
                'username' => 'guru03',
                'password' => 'guru123',
                'role' => 'guru',
            ],

            // ==========================
            // SATPAM
            // ==========================
            [
                'username' => 'satpam01',
                'password' => 'satpam123',
                'role' => 'satpam',
            ],

            [
                'username' => 'satpam02',
                'password' => 'satpam123',
                'role' => 'satpam',
            ],

        ];

        foreach ($users as $user) {

            User::updateOrCreate(
                ['username' => $user['username']],
                [
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                ]
            );
        }
    }
}