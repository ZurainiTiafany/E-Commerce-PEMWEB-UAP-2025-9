<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class SellerCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('seller.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('seller.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        ProductCategory::create(['name' => $request->name]);

        return redirect()->route('seller.categories');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('seller.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('seller.categories');
    }

    public function delete($id)
    {
        ProductCategory::destroy($id);
        return back();
    }
}