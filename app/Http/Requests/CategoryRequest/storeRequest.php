<?php

namespace App\Http\Requests\CategoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name' => "required|unique:categories",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập trường này",
            'name.unique' => "Tên danh mục đã tồn tại, Vui lòng thử lại"
        ];
    }
}
