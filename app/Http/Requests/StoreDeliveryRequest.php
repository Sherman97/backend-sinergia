<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryRequest extends FormRequest
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
            'client_id'            => ['required','exists:clients,id'],
            'product_id'           => ['required','exists:products,id'],
            'delivery_location_id' => ['required','exists:delivery_locations,id'],
            'transport_type_id'    => ['required','exists:transport_types,id'],
            'quantity'             => ['required','integer','min:1'],
            'unit_price'           => ['required','numeric','min:0'],
            'estimated_delivery'   => ['required','date','after_or_equal:now'],
            'guide_number'         => ['required','string','unique:deliveries,guide_number'],
        ];
    }
}
