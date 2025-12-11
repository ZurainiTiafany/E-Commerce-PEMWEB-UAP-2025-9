<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    // HOME PAGE
    public function index()
    {
        $categories = ProductCategory::all();

        $products = Product::with('store', 'images')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products', 'categories'));
    }

    // DETAIL PRODUK
    public function show($slug)
    {
        $product = Product::with(['store', 'images', 'reviews.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}