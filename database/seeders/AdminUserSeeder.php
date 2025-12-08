<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin 
        User::firstOrCreate(
            ['email' => 'zahra@gmail.com'],
            [
                'name' => 'Zahra',
                'password' => Hash::make('zahra123'),
                'role' => 'admin',
            ]
        );

        // 2. Member 1
        User::firstOrCreate(
            ['email' => 'tia@gmail.com'],
            [
                'name' => 'Tia',
                'password' => Hash::make('tiaa456'),
                'role' => 'member',
            ]
        );

        // 3. Member 2
        User::firstOrCreate(
            ['email' => 'nia@gmail.com'],
            [
                'name' => 'Nia',
                'password' => Hash::make('niaa789'),
                'role' => 'member',
            ]
        );
    }
}

