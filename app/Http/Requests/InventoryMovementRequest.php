<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InventoryMovementRequest extends FormRequest
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
            'movement_date' => ['required', 'date'],
            'movement_type' => [
                'required', 
                Rule::in([
                    'purchase_entry',
                    'production_dispatch',
                    'production_entry',
                    'sale_dispatch'
                ])
            ],
            'quantity' => ['required', 'numeric', 'min:0.000'],
            'observations' => ['nullable', 'string', 'max:100'],
            'user_id' => ['required', 'exists:users,id'],
            'raw_material_id' => ['nullable', 'exists:raw_materials,id'],
            'finished_product_id' => ['nullable', 'exists:finished_products,id'],
            'purchase_order_detail_id' => ['nullable', 'exists:purchase_order_details,id'],
            'sale_detail_id' => ['nullable', 'exists:sale_details,id'],
            'prod_order_detail_id' => ['nullable', 'exists:prod_order_details,id']
        ];
    }
}
