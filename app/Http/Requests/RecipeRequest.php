<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecipeRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('recipes', 'name')->ignore($this->route('recipe'))
            ],
            'preparat_instructions' => ['required', 'string', 'min:3', 'max:255'],
            'estimated_time_minutes' => ['required', 'integer', 'min:0'],
            'oven_temperature_c' => ['required', 'numeric', 'min:0']
        ];
    }
}
