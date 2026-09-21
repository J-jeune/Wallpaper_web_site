<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'categories')->get();
        return view('products.index', ['products' => $products]);
    }
    public function show($id)
    {
        $product = Product::with('brand', 'categories')->findOrFail($id);
        return view('products.show', ['product' => $product]);
    }
}
