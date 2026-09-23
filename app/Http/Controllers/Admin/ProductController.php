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
            'image' => 'required|image|max:2048',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/products'), $imageName);

        $product = Product::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imageName,
            'brand_id' => $request->brand_id,
        ]);

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
            'image' => 'nullable|image|max:2048',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::findOrFail($id);

        $data = $request->only('titre', 'description', 'prix', 'brand_id');

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);
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