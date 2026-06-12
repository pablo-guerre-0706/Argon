<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleDetailRequest extends FormRequest
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
            'quantity_sold' => ['required', 'numeric', 'min:0.000'],
            'unit_price' => ['required', 'numeric', 'min:0.00'],
            'subtotal' => ['required', 'numeric', 'min:0.00'],
            'unit_measure_id' => ['required', 'exists:units_measures,id'],
            'sale_id' => ['required', 'exists:sales,id'],
            'finished_product_id' => ['required', 'exists:finished_products,id']
        ];
    }
}
