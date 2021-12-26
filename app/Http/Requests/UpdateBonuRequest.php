<?php

namespace App\Http\Requests;

use App\Models\Bonu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBonuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bonu_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
