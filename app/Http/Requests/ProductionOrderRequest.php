<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductionOrderRequest extends FormRequest
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
                Rule::unique('production_orders', 'order_number')->ignore($this->route('production_order'))
            ],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'status' => ['nullable', Rule::in(['draft', 'approved', 'completed', 'canceled'])],
            'user_id' => ['required', 'exists:users,id']
        ];
    }
}
