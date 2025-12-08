<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Pulpen', 'slug' => 'pulpen'],
            ['name' => 'Buku', 'slug' => 'buku'],
            ['name' => 'Pensil', 'slug' => 'pensil'],
            ['name' => 'Highlighter', 'slug' => 'highlighter'],
            ['name' => 'Washie Tape', 'slug' => 'washie-tape'],
        ];

        foreach ($categories as $category) {
            ProductCategory::firstOrCreate(
                ['slug' => $category['slug']],  
                ['name' => $category['name']]
            );
        }
    
    }
}
