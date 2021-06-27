<?php

namespace App\Http\Requests\SiteRequest;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'name' => "required|min:5",
            'email'=> "required|regex:/^.+@.+$/i|unique:users",
            'password'=> "required",
            'confirm-password'=>"required|same:password",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên tài khoản không được để trống",
            'name.min' => "Tên tài khoản không được nhỏ hơn 5 ký tự",
            'email.required' => "Email không không được để trống",
            'email.regex' => "Email không hợp lệ, Vui lòng kiểm tra lại",
            'email.unique' => "Email đã được sử dụng vui lòng thử lại",
            'password.required' => "Mật khẩu không được để trống",
            'confirm-password.required' => 'Bạn chưa nhập trường này',
            'confirm-password.same' => 'Mật khẩu nhập lại không chính xác',
        ];
    }
}
