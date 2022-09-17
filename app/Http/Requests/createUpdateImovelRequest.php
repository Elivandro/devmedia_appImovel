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
            'number' => 'required | integer',
            'postal_code' => 'required',
            'city' => 'required | string',
            'state' => 'required | string',
            'price' => 'required | integer',
            'roomQty' => 'required | integer',
            'type'  => 'required | integer',
            'purpose' => 'required | integer',
        ];

        return $rules;
    }
}
