<?php

namespace App\Http\Requests;

use App\Models\BouquetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBouquetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bouquet_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bouquet_categories,id',
        ];
    }
}
