<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $owner = User::where('email', 'elenorakriya@gmail.com')->first();

        Store::firstOrCreate(
            ['user_id' => $owner->id], 
            [
                'name' => 'Ethereal Stationary',
                'logo' => 'Aset/image/logo.png', 
                'about' => 'Menyediakan Berbagai Macam Alat Tulis dan Stationary',
                'phone' => '081234567890',
                'city' => 'Jakarta',
                'address' => 'Jl. Melati No. 23',
                'is_verified' => true,
            ]
        );
    }
}