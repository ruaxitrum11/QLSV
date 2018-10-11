<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('clients', 'email')->ignore($this->route('id'))
            ],
            'phone_number' => [
                Rule::unique('clients', 'phone_number')->ignore($this->route('id'))
            ]
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email',
            'name' => 'Tên người dùng',
            'phone_number' => 'Số điện thoại'
        ];
    }
}
