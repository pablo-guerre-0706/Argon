<?php

namespace App\Http\Controllers;

use App\Models\CategoryMat;
use App\Http\Requests\CategoryMatRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryMatController extends Controller
{
    public function index(): View
    {
        $categories_mat = CategoryMat::all();
        return view('categories_mat.index', compact('categories_mat'));
    }
    
    public function create(): View
    {
        return view('categories_mat.create');
    }

    public function store(CategoryMatRequest $request): RedirectResponse
    {
        CategoryMat::create($request->validated());
        return redirect()->route('categories_mat.index')
            ->with('success', 'Categoría registrada exitosamente.');
    }

    public function show(CategoryMat $category_mat): View
    {
        return view('categories_mat.show', compact('category_mat'));
    }

    public function edit(CategoryMat $category_mat): View
    {
        return view('categories_mat.edit', compact('category_mat'));
    }

    public function update(CategoryMatRequest $request, CategoryMat $category_mat): RedirectResponse
    {
        $category_mat->update($request->validated());
        return redirect()->route('categories_mat.index')
            ->with('success', 'Categoría de materiales actualizada con éxito.');
    }

    public function destroy(CategoryMat $category_mat): RedirectResponse
    {
        $category_mat->delete();
        return redirect()->route('categories_mat.index')
        ->with('success', 'Categoría de materiales eliminada exitosamente.');
    }
}
