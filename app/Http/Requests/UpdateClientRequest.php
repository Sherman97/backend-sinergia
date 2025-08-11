<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $client = request()->route('client');
        $id = $client instanceof Client ? $client->id : null;

        return [
            'name'           => ['sometimes', 'required', 'string'],
            'email'          => ['sometimes', 'required', 'email', "unique:clients,email,{$id}"],
            'address'        => ['sometimes', 'required', 'string'],
            'phone'          => ['sometimes', 'required', 'string'],
            'client_type_id' => ['sometimes', 'required', 'exists:client_types,id'],
            'geo_scope_id'   => ['sometimes', 'required', 'exists:geo_scopes,id'],
        ];
    }
}
