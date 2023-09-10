<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
            'title'=>'required',
            'image'=>'required | image | mimes:jpeg,png,jpg',
            'description'=>'required',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',
            'image' => ':attribute phải là ảnh',
            'mimes' => ':attribute phải có đuôi là :mimes',
        ];
    }

    public function attributes() {
        return [
            'title' => 'Tên blog',
            'image' => 'Hình ảnh',
            'description' => 'Nội dung',
        ];
    }
}
