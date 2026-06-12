<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RawMaterialRequest extends FormRequest
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
                 Rule::unique('raw_materials', 'name')->ignore($this->route('raw_material'))
            ],
            'bar_code' => [
                'required',
                'string',
                Rule::unique('raw_materials', 'bar_code')->ignore($this->route('raw_material'))
                ],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'weight' => ['required', 'numeric', 'min:0'],
            'unit_measure_id' => ['required', 'exists:units_measures,id'],
            'category_mat_id' => ['required', 'exists:categories_mat,id'],
            'brand_id' => ['required', 'exists:brands']
        ];
    }
}
