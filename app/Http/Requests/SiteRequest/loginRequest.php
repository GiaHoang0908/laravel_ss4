<?php

namespace App\Http\Requests\SiteRequest;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email'=> "required|regex:/^.+@.+$/",
            'password'=> "required",
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>"Bạn chưa nhập Email",
            'email.regex' => "Email không hợp lệ, Vui lòng kiểm tra lại",
            'password.required' => "Mật khẩu không được để trống",
        ];
    }
}
