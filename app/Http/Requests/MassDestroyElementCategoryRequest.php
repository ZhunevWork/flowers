<?php

namespace App\Http\Requests;

use App\Models\ElementCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyElementCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('element_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:element_categories,id',
        ];
    }
}
