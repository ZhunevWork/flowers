<?php

namespace App\Http\Requests;

use App\Models\BouquetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBouquetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bouquet_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
