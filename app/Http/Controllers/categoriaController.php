<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'descripcion' => 'required|string',
            'active' => 'boolean',
        ]);

        Category::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categorias.show', compact('category'));
    }

    public function edit(Category $categoria)
    {
        return view('categorias.editar', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $categoria->id,
            'descripcion' => 'required|string',
            'active' => 'boolean',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index');
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
