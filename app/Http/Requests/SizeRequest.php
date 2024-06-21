<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:product_sizes,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên kích cỡ sản phẩm là bắt buộc.',
            'name.string' => 'Tên kích cỡ sản phẩm phải là một chuỗi.',
            'name.max' => 'Tên kích cỡ sản phẩm không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên kích cỡ sản phẩm đã tồn tại.',
        ];
    }
}

