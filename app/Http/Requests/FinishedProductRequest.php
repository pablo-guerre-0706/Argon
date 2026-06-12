<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FinishedProductRequest extends FormRequest
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
            'name_bread' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('finished_products', 'name_bread')->ignore($this->route('finished_product'))
            ],
            'description' => ['required', 'string', 'min:5', 'max:100'],
            'sale_price' => ['required', 'numeric', 'min:0']
        ];
    }
}
