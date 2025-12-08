<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::first();

        $categories = ProductCategory::all();

        if (!$store || $categories->count() == 0) {
            return;
        }

        $products = [
            [   'name' => 'Pulpen Zebra Kokoro Gel Pen Color 0.5 mm', 
                'slug' => 'Pulpen-Zebra-Kokoro-Gel-Pen-Color-0.5-mm', 
                'price' => 60000, 
                'category' => 'pulpen'
            ],
            [   'name' => 'Pulpen Zebra Sarasa Clip 0.5 Retractable Gel Ink', 
                'slug' => 'Pulpen-Zebra-Sarasa-Clip-0.5-Retractable-Gel-Ink', 
                'price' => 177000, 
                'category' => 'pulpen'
            ],
            [   'name' => 'Buku Tulis Sidu 38 Lembar (1 Pack Isi 10 Pcs)', 
                'slug' => 'Buku-Tulis-Sidu-38-Lembar-(-1-Pack-Isi-10-Pcs-)', 
                'price' => 35000, 
                'category' => 'buku'
            ],
            [   'name' => 'Buku Catatan Notebook A5 Kerja Buku Jurnal', 
                'slug' => 'Buku-Catatan-Notebook-A5-Kerja-Buku-Jurnal', 
                'price' => 54000, 
                'category' => 'buku'
            ],
            [   'name' => 'Faber-Castell Pencil Castell 9000-2B', 
                'slug' => 'Faber-Castell-Pencil-Castell-9000-2B', 
                'price' => 56000, 
                'category' => 'pensil'
            ],
            [   'name' => 'Pensil 2B Staedtler', 
                'slug' => 'Pensil 2B Staedtler', 
                'price' => 47000, 
                'category' => 'pensil'
            ],
            [   'name' => 'Joyko HI-69-6 Erasable Highlighter 1 Set Isi 6 Pcs Dual Tip', 
                'slug' => 'Joyko-HI-69-6-Erasable-Highlighter-1-Set-Isi-6-Pcs-Dual-Tip', 
                'price' => 90000, 
                'category' => 'highlighter'
            ],
            [   'name' => 'Highlighter Kenko Ovaliner Pink', 
                'slug' => 'Highlighter-Kenko-Ovaliner-Pink', 
                'price' => 22000, 
                'category' => 'highlighter'
            ],
            [   'name' => 'Washie Tape Dekorasi Pastel Kartun Lucu', 
                'slug' => 'Washie-Tape-Dekorasi-Pastel-Kartun-Lucu', 
                'price' => 30000, 
                'category' => 'washie-tape'
            ],
            [   'name' => 'Washie Tape Spring Flower Romantic Series', 
                'slug' => 'Washie-Tape-Spring-Flower-Romantic-Series', 
                'price' => 36000, 
                'category' => 'washie-tape'
            ],
        ];

        foreach ($products as $p) {

            $category = ProductCategory::where('slug', $p['category'])->first();

            Product::firstOrCreate(
                ['slug' => $p['slug']],
                [
                    'store_id' => $store->id,
                    'product_category_id' => $category->id,
                    'name' => $p['name'],
                    'price' => $p['price'],
                    'description' => 'Produk alat tulis berkualitas.',
                    'stock' => 100,
                ]
            );
        }
    }
}