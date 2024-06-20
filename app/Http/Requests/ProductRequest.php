<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_product' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'productVariant' => 'required|array',
            // 'productVariant.*.color' => 'required|integer|exists:colors,id',
            // 'productVariant.*.size' => 'required|integer|exists:sizes,id',
            // 'productVariant.*.quantity' => 'required|integer|min:0',
            // 'productVariant.*.price' => 'required|numeric|min:0',
            // 'productVariant.*.price_sale' => 'nullable|numeric|min:0',
            // 'productVariant.*.SKU' => 'required|string|max:255|unique:product_variants,SKU',
            'product_images' => 'nullable|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'Tên sản phẩm là bắt buộc.',
            'name_product.string' => 'Tên sản phẩm phải là một chuỗi ký tự.',
            'name_product.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.integer' => 'Danh mục sản phẩm phải là một số nguyên.',
            'category_id.exists' => 'Danh mục sản phẩm không tồn tại.',
            'description.required' => 'Mô tả sản phẩm là bắt buộc.',
            'description.string' => 'Mô tả sản phẩm phải là một chuỗi ký tự.',
            'thumbnail.required' => 'Hình ảnh thumbnail là bắt buộc.',
            'thumbnail.image' => 'Thumbnail phải là một hình ảnh.',
            'thumbnail.mimes' => 'Thumbnail phải là một tệp loại: jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Thumbnail không được vượt quá 2048 KB.',
            'productVariant.required' => 'Biến thể sản phẩm là bắt buộc.',
            'productVariant.array' => 'Biến thể sản phẩm phải là một mảng.',
            'productVariant.*.color.required' => 'Màu sắc là bắt buộc cho mỗi biến thể.',
            'productVariant.*.color.integer' => 'Màu sắc phải là một số nguyên.',
            'productVariant.*.color.exists' => 'Màu sắc không tồn tại.',
            'productVariant.*.size.required' => 'Kích thước là bắt buộc cho mỗi biến thể.',
            'productVariant.*.size.integer' => 'Kích thước phải là một số nguyên.',
            'productVariant.*.size.exists' => 'Kích thước không tồn tại.',
            'productVariant.*.quantity.required' => 'Số lượng là bắt buộc cho mỗi biến thể.',
            'productVariant.*.quantity.integer' => 'Số lượng phải là một số nguyên.',
            'productVariant.*.quantity.min' => 'Số lượng không được nhỏ hơn 0.',
            'productVariant.*.price.required' => 'Giá là bắt buộc cho mỗi biến thể.',
            'productVariant.*.price.numeric' => 'Giá phải là một số.',
            'productVariant.*.price.min' => 'Giá không được nhỏ hơn 0.',
            'productVariant.*.price_sale.numeric' => 'Giá khuyến mãi phải là một số.',
            'productVariant.*.price_sale.min' => 'Giá khuyến mãi không được nhỏ hơn 0.',
            'productVariant.*.SKU.required' => 'SKU là bắt buộc cho mỗi biến thể.',
            'productVariant.*.SKU.string' => 'SKU phải là một chuỗi ký tự.',
            'productVariant.*.SKU.max' => 'SKU không được vượt quá 255 ký tự.',
            'productVariant.*.SKU.unique' => 'SKU này đã tồn tại.',
            'product_images.array' => 'Danh sách hình ảnh phải là một mảng.',
            'product_images.*.image' => 'Mỗi mục trong danh sách hình ảnh phải là một hình ảnh.',
            'product_images.*.mimes' => 'Mỗi mục trong danh sách hình ảnh phải là một tệp loại: jpeg, png, jpg, gif.',
            'product_images.*.max' => 'Mỗi hình ảnh trong danh sách không được vượt quá 2048 KB.',
        ];
    }
}
