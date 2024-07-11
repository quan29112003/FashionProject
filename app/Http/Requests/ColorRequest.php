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
            'color' => 'required|string|max:255|unique:product_colors,name',
        ];
    }

    public function messages()
    {
        return [
            'color.required' => 'Tên màu sản phẩm là bắt buộc.',
            'color.string' => 'Tên màu sản phẩm phải là một chuỗi.',
            'color.max' => 'Tên màu sản phẩm không được vượt quá 255 ký tự.',
            'color.unique' => 'Tên màu sản phẩm đã tồn tại.',
        ];
    }
}

