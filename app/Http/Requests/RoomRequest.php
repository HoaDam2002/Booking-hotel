<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'nameRoom' => 'required|unique:rooms,nameRoom',
            'price' => 'required|integer',
            'Capacity' => 'required',
            'roomTypeId' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => '- :attribute không được để trống',
            'image' => '- :attribute phải là ảnh',
            'mimes' => '- :attribute sai kiểu ảnh (jpeg,png,jpg,gif)',
            'max' => '- dung lượng :attribute quá lớn',
            'integer' => '- :attribute phải là kiểu số',
            'unique' => '- :attribute đã tồn tại',
        ];
    }

    public function attributes(){
        return[
            'nameRoom' => 'Tên phòng',
            'image' => 'Ảnh',
            'description' => 'Mô tả',
            'Capacity' => 'Số người',
            'roomTypeId' => 'Loại phòng',
            'price' => 'Giá phòng',
        ];
    }
}
