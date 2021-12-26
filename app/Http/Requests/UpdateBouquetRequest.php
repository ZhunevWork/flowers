<?php

namespace App\Http\Requests;

use App\Models\Bouquet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBouquetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bouquet_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'elements.*' => [
                'integer',
            ],
            'elements' => [
                'required',
                'array',
            ],
            'sizes.*' => [
                'integer',
            ],
            'sizes' => [
                'required',
                'array',
            ],
            'bouquetcategories.*' => [
                'integer',
            ],
            'bouquetcategories' => [
                'array',
            ],
            'colors.*' => [
                'integer',
            ],
            'colors' => [
                'array',
            ],
            'events.*' => [
                'integer',
            ],
            'events' => [
                'array',
            ],
            'height' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'all_size' => [
                'string',
                'nullable',
            ],
            'price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discount_price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'images' => [
                'array',
            ],
        ];
    }
}
