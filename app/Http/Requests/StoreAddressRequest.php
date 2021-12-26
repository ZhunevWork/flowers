<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_create');
    }

    public function rules()
    {
        return [
            'city' => [
                'string',
                'nullable',
            ],
            'street' => [
                'string',
                'nullable',
            ],
            'home' => [
                'string',
                'nullable',
            ],
            'entrance' => [
                'string',
                'nullable',
            ],
            'floor' => [
                'string',
                'nullable',
            ],
            'apartment' => [
                'string',
                'nullable',
            ],
            'intercom' => [
                'string',
                'nullable',
            ],
        ];
    }
}
