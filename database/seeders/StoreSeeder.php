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

         // Buat toko
         Store::firstOrCreate(
             ['user_id' => $owner->id], 
             [
                 'name' => 'Ethereal Stationary',
                 'logo' => 'asset', 
                 'about' => 'Menyediakan berbagai macam stationary dan perlengkapan belajar.',
                 'phone' => '081234567890',
                 'city' => 'Malang',
                 'address' => 'Jl. Jakarta No. 23',
                 'is_verified' => true,
             ]
         );
    }
}