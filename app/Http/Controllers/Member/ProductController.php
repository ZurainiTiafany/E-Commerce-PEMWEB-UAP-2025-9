<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    // HOME PAGE
    public function index()
    {
        $categories = ProductCategory::all();

        $products = Product::with('store', 'productImages')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products', 'categories'));
    }

    // DETAIL PRODUK
    public function show($id)
{
    $product = Product::with([
        'store',
        'productImages',
        'reviews' // <— tambah ini
    ])->findOrFail($id);

    return view('member.products.show', compact('product'));
}
}