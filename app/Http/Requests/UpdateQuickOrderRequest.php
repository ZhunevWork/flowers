<?php

namespace App\Http\Requests;

use App\Models\QuickOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuickOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quick_order_edit');
    }

    public function rules()
    {
        return [
            'bouquet_id' => [
                'required',
                'integer',
            ],
            'sizes.*' => [
                'integer',
            ],
            'sizes' => [
                'required',
                'array',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
        ];
    }
}
