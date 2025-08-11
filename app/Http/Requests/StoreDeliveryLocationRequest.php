<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryLocationRequest extends FormRequest
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
            'name'               => ['required', 'string'],
            'location'           => ['required', 'string'],
            'geo_scope_id'       => ['required', 'exists:geo_scopes,id'],
            'transport_type_id'  => ['required', 'exists:transport_types,id'],
            'capacity'           => ['required', 'integer', 'min:0'],
            'current_occupancy'  => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
