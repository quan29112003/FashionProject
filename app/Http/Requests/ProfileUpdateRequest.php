<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'name_user' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ỹ\s]+$/u'],
            'birthday' => 'nullable|date',
            'age' => 'nullable|integer|min:3',
            'number_phone' => ['required', 'string', 'regex:/^\d{10,15}$/', Rule::unique(User::class)->ignore($this->user()->id)],
            'district' => 'required',
            'ward' => 'required',
            'province' => 'required',
            'specific_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'age.min' => 'Bạn phải ít nhất 3 tuổi để mua hàng.',
            'number_phone.required' => 'Số điện thoại là bắt buộc.',
            'number_phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'number_phone.regex' => 'Số điện thoại phải có độ dài từ 10 đến 15 ký tự và chỉ chứa số.',
            'number_phone.unique' => 'Số điện thoại đã tồn tại.',
            'name_user.required' => 'Tên người dùng là bắt buộc.',
            'name_user.string' => 'Tên người dùng phải là chuỗi ký tự.',
            'name_user.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            'name_user.regex' => 'Tên người dùng chỉ được chứa chữ cái và khoảng trắng.',
            'district.required' => 'Vui lòng chọn Quận/Huyện.',
            'ward.required' => 'Vui lòng chọn Phường/Xã.',
            'province.required' => 'Vui lòng chọn Tỉnh/Thành phố.',
            'specific_address.required' => 'Vui lòng ghi địa chỉ.',
        ];
    }
}
