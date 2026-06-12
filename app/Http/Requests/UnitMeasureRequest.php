<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitMeasureRequest extends FormRequest
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
                'max:20',
                Rule::unique('units_measures', 'name')->ignore($this->route('unit_measures'))
            ],
            'type' => ['required', 'string', 'min:3', 'max:20'],
            'abbreviation' => ['required', 'string', 'min:2', 'max:10']
        ];
    }
}
