<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'offers.*' => [
                'integer',
            ],
            'offers' => [
                'array',
            ],
            'sub_total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'delivery' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'delivery_data' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'delivery_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'recipient' => [
                'string',
                'nullable',
            ],
            'recipient_phone' => [
                'string',
                'nullable',
            ],
            'postcard' => [
                'string',
                'nullable',
            ],
            'comment' => [
                'string',
                'nullable',
            ],
        ];
    }
}
