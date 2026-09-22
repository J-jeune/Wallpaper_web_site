<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required']);
        Brand::create($request->only('nom'));
        return redirect('/admin/brands');
    }

    public function show(string $id)
    {
        $brand = Brand::with('products')->findOrFail($id);
        return view('admin.brands.show', ['brand' => $brand]);
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', ['brand' => $brand]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['nom' => 'required']);
        $brand = Brand::findOrFail($id);
        $brand->update($request->only('nom'));
        return redirect('/admin/brands');
    }

    public function destroy(string $id)
    {
        Brand::findOrFail($id)->delete();
        return redirect('/admin/brands');
    }
}