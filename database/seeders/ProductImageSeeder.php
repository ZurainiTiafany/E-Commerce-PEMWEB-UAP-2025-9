<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
    
            foreach ($products as $product) {
    
                // Gambar pulpen sarasa 1
                ProductImage::create([
                    'product_id'  => $product->id,
                    'image'       => 'products/' . $product->slug . 'public/assets/images/zebra-sarasa-1.jpg',
                    'is_thumbnail'=> true,
                ]);
    
                // Gambar pulpen serasa 2
                ProductImage::create([
                    'product_id'  => $product->id,
                    'image'       => 'products/' . $product->slug . '',
                    'is_thumbnail'=> false,
                ]);
    
                // Gambar tambahan 3
                ProductImage::create([
                    'product_id'  => $product->id,
                    'image'       => 'products/' . $product->slug . '-3.jpg',
                    'is_thumbnail'=> false,
            ]);
        }
        
    }
}
