<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'acc_username' => 'required',
            'acc_password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'acc_username.required' => 'Username không được bỏ trống!',
            'acc_password.required' => 'Password không được bỏ trống!'
        ];
    }
}
