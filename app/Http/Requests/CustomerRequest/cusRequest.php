<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class cusRequest extends FormRequest
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
            'name' => "required|",
            'phone_number' => 'required|regex:/^[0-9]{10}+$/',
            'address' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập trường này.",
            'phone_number.required' => "Vui lòng nhập trường này.",
            'phone_number.regex' => "Số điện thoại không định dạng",
            'address.required' => "Vui lòng nhập trường này"
        ];
    }
}
