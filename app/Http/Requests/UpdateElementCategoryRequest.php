<?php

namespace App\Http\Requests;

use App\Models\ElementCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateElementCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('element_category_edit');
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
