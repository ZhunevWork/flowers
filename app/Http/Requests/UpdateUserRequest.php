<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'surname' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'patronymic' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:users,phone,' . request()->route('user')->id,
            ],
            'birthday' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'bonus' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
