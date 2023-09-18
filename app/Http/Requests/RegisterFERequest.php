<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFERequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email ' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_comfirm' => 'required_with:password|same:password|min:6',
            'street' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'required_with' => ':attribute sai mật khẩu comfirm',
            'min' => ':attribute mật khẩu không nhỏ hơn 6',
            'image' => ':attribute phải là ảnh',
            'max' => 'dung lượng :attribute quá lớn',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute sai kiểu',
            'mimes' => ':attribute sai kiểu ảnh (jpeg,png,jpg,gif)',
        ];
    }

    public function attributes(){
        return[
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_comfirm' => 'Mật khẩu comfirm',
            'avatar' => 'Avatar',
            'street' => 'Địa chỉ'
        ];
    }
}
