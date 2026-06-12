<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProdOrderDetailRequest extends FormRequest
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
            'required_mat_quantity' => ['nullable', 'numeric', 'min:0.000'],
            'dispatched_mat_quantity' => ['nullable', 'numeric', 'min:0.000'],
            'scheduled_quantity' => ['nullable', 'numeric', 'min:0.000'],
            'quantity_produced' => ['nullable', 'numeric', 'min:0.000'],
            'loss_quantity' => ['nullable', 'numeric', 'min:0.000'],
            'bake_number' =>['nullable', 'integer', 'min:1'],
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed', 'canceled'])
            ],
            'production_order_id' => ['required', 'exists:production_orders,id'],
            'recipe_id' => ['required', 'exists:recipes,id'],
            'finished_product_id' => ['required', 'exists:finished_products,id']
        ];
    }
}
