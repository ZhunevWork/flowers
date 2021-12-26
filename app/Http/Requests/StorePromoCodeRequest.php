<?php

namespace App\Http\Requests;

use App\Models\PromoCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePromoCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('promo_code_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'summ' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'percent' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'is_active' => [
                'required',
            ],
            'active_until' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
