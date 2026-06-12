<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\RecipeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        return view('recipes.create');
    }

    public function store(RecipeRequest $request): RedirectResponse
    {
        Recipe::create($request->validated());
        return redirect()->route('recipes.index')
            ->with('success', 'Receta registrada exitosamente.');
    }

    public function show(Recipe $recipe): View
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe): View
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(RecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update($request->validated());
        return redirect()->route('recipes.index')
            ->with('success', 'Receta actualizada con éxito.');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()->route('recipes.index')
            ->with('success', 'Receta eliminada con exito');
    }
}
