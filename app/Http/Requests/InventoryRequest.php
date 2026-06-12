<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InventoryRequest extends FormRequest
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
            'real_stock' => ['required', 'numeric', 'min:0.000'],
            'max_stock' => ['required', 'numeric', 'min:0.000'],
            'min_stock' => ['required', 'numeric', 'min:0.000'],
            'raw_material_id' => ['nullable', 'required_without:finished_product_id', 'exists:raw_materials,id'],
            'finished_product_id' => ['nullable', 'required_without:raw_material_id', 'exists:finished_products,id']
        ];
    }
}
