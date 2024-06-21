<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:product_colors,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên màu sản phẩm là bắt buộc.',
            'name.string' => 'Tên màu sản phẩm phải là một chuỗi.',
            'name.max' => 'Tên màu sản phẩm không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên màu sản phẩm đã tồn tại.',
        ];
    }
}

