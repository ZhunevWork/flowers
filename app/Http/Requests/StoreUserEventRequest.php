<?php

namespace App\Http\Requests;

use App\Models\UserEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_event_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'event_type' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
