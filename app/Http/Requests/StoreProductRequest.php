<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'                     => ['required', 'string'],
            'description'              => ['nullable', 'string'],
            'product_type_id'          => ['required', 'exists:product_types,id'],
            'transport_type_ids'       => ['required', 'array'],
            'transport_type_ids.*'     => ['integer', 'exists:transport_types,id'],
            'requires_special_handling'=> ['boolean'],
        ];
    }
}
