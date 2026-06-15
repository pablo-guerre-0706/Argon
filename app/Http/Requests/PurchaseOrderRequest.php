<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PurchaseOrderRequest extends FormRequest
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
            'date_order' => ['required', 'date'],
            'order_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('purchase_orders', 'order_number')->ignore($this->route('purchase_order'))
            ],
            'subtotal' => ['required', 'numeric', 'min:0.00'],
            'tax' => ['required', 'numeric', 'min:0.00'],
            'total' => ['required', 'numeric', 'min:0.00'],
            'status_order' => [
                'nullable',
                Rule::in(['generated', 'sent', 'suspended', 'canceled'])
            ],
            'user_id' => ['required', 'exists:users,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],

            'raw_material_id'   => ['required', 'array', 'min:1'],
            'raw_material_id.*' => ['required', 'exists:raw_materials,id'],
            
            'ordered_quantity'   => ['required', 'array', 'min:1'],
            'ordered_quantity.*' => ['required', 'numeric', 'min:0.001'],
            
            'unit_cost'   => ['required', 'array', 'min:1'],
            'unit_cost.*' => ['required', 'numeric', 'min:0.01']
        ];
    }
}
