<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecipeDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ingredient_quantity' => ['required', 'numeric', 'min:0.001'],
            'unit_measure_recipe' => ['required', 'string'],
            'recipe_id' => ['required', 'exists:recipes,id'],
            'raw_material_id' => ['required', 'exists:raw_materials,id'],
            'unit_measure_id' => ['required', 'exists:units_measures,id']
        ];
    }
}
