<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('brand', 'categories');

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        $products = $query->get();
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $product = Product::with('brand', 'categories')->findOrFail($id);
        return view('products.show', ['product' => $product]);
    }
}