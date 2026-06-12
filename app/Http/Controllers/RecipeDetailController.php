<?php

namespace App\Http\Controllers;

use App\Models\RecipeDetail;
use App\Http\Requests\RecipeDetailRequest;
use Illuminate\Http\RedirectResponse;

class RecipeDetailController extends Controller
{
    public function store(RecipeDetailRequest $request): RedirectResponse
    {
        RecipeDetail::create($request->validated());
        return redirect()->route('recipe_details.show', $request->recipe_id)
            ->with('success', 'Ingrediente agregado a la receta con éxito.');
    }
    
    public function destroy(RecipeDetail $recipe_detail): RedirectResponse
    {      
        $recipe_detail->delete();
        return redirect()->route('recipe_details.show', $recipe_detail)
            ->with('success', 'Ingrediente removido de la receta exitosamente.');
    }
}
