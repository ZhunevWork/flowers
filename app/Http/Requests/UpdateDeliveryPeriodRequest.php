<?php

namespace App\Http\Requests;

use App\Models\DeliveryPeriod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeliveryPeriodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_period_edit');
    }

    public function rules()
    {
        return [
            'start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
