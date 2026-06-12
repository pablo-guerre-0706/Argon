<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleRequest extends FormRequest
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
            'sale_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('sales', 'sale_number')->ignore($this->route('sale'))
            ],
            'sale_date' => ['required', 'date'],
            'total_to_pay' =>  ['required', 'numeric', 'min:0.00'],
            'user_id' => ['required', 'exists:users,id'],
            'customer_id' => ['required', 'exists:customers,id']
        ];
    }
}
