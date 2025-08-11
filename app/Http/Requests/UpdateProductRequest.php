<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'                     => ['sometimes', 'required', 'string'],
            'description'              => ['sometimes', 'nullable', 'string'],
            'product_type_id'          => ['sometimes', 'required', 'exists:product_types,id'],
            'transport_type_ids'       => ['sometimes', 'required', 'array'],
            'transport_type_ids.*'     => ['integer', 'exists:transport_types,id'],
            'requires_special_handling'=> ['sometimes', 'boolean'],
        ];
    }
}
