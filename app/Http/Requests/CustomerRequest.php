<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'fullname' => [
                'required',
                'string',
                'min:3',
                'max:30',
                Rule::unique('customers', 'fullname')->ignore($this->route('customer'))
            ],
            'card_id' => ['nullable', 'string', 'max:20'],
            'phone_number' => ['required', 'string', 'max:15']
        ];
    }
}
