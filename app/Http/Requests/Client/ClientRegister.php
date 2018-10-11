<?php

namespace App\Http\Requests\Client;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRegister extends FormRequest
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
                Rule::unique('clients', 'email')
            ],
            'name' => [
                'required',
            ],
            'password' => [
                'required',
                'min:5',
                'confirmed'
            ]
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email',
            'name' => 'Tên người dùng',
            'password' => 'Mật khẩu'
        ];
    }
}
