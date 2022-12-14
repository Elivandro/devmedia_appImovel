<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUpdateImovelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'description' => 'required',
            'address' => 'required',
            'neighborhood' => 'required',
            'number' => 'required | numeric',
            'postal_code' => 'required | numeric',
            'city' => 'required | string',
            'state' => 'required | string',
            'price' => 'required | numeric',
            'roomQty' => 'required | numeric',
            'type'  => 'required | integer',
            'purpose' => 'required | integer',
        ];

        return $rules;
    }
}
