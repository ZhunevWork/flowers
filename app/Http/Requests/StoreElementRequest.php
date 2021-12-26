<?php

namespace App\Http\Requests;

use App\Models\Element;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreElementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('element_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
            'colors.*' => [
                'integer',
            ],
            'colors' => [
                'array',
            ],
        ];
    }
}
