<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->get();
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', ['brands' => $brands, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::create($request->only('titre', 'description', 'prix', 'image', 'brand_id'));

        $product->categories()->sync($request->input('categories', []));

        return redirect('/admin/products');
    }

    public function show(string $id)
    {
        $product = Product::with('brand', 'categories')->findOrFail($id);
        return view('admin.products.show', ['product' => $product]);
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('titre', 'description', 'prix', 'image', 'brand_id'));

        $product->categories()->sync($request->input('categories', []));

        return redirect('/admin/products');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products');
    }
}