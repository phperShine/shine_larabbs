<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
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

    public function rules()
    {
        return [
            // UTF8 正则匹配常见用户名 中英混杂 emoji
            'name' => 'required|between:3,25|regex:/[\w\x{4e00}-\x{9fa5}]{2,25}/u|unique:users,name', //
            'password' => 'required|alpha_dash|min:6',
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ];
    }
}
