<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required']);
        Category::create($request->only('nom'));
        return redirect('/admin/categories');
    }

    public function show(string $id)
    {
        $category = Category::with('products')->findOrFail($id);
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['nom' => 'required']);
        $category = Category::findOrFail($id);
        $category->update($request->only('nom'));
        return redirect('/admin/categories');
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }
}