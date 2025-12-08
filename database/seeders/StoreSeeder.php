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
        DB::table('stores')->insert([
            'user_id' => 2,
            'name' => 'Ethereal Stasionary',
            'address' => 'Jl. Jakarta No.12, Malang, Jawa Timur',
            'description' => 'Toko yang menyediakan berbagai macam stasionary.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}